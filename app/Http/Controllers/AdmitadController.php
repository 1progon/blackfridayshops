<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;
use App\SubCategory;
use Cache;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Str;

class AdmitadController extends Controller
{
    private $baseUri = 'https://api.admitad.com/';

    private $client_id = 'aa96e03da354d06ed37e45f27eead3';
    private $client_secret = '03a438bfad2212767063d2e45d9c6e';

    private $authKey;
    private $websiteId = 1170267; //blackfridayshops

    private Client $client;

    private object $token;


    public function __construct(Client $client)
    {
        $authKey = $this->client_id . ':' . $this->client_secret;
        $this->authKey = base64_encode($authKey);

        $this->client = $client;

        $this->token = $this->getToken();
    }

    public function index()
    {
        return view('user.admitad.admitad-api');
    }

    public function getToken(): object
    {
        $apiUri = 'token/';
        $seconds = 604800;

        $token = Cache::remember(
            'admitad_access_token',
            $seconds,
            function () use ($apiUri) {
                return $this->client->post(
                    $this->baseUri . $apiUri,
                    [
                        'headers' => [
                            'Authorization' => 'Basic ' . $this->authKey
                        ],
                        'form_params' => [
                            'client_id' => $this->client_id,
                            'scope' => 'private_data advcampaigns_for_website public_data',
                            'grant_type' => 'client_credentials'
                        ]
                    ]
                )->getBody()->getContents();
            }
        );


        return json_decode($token);
    }


    public function getAdvCampaignsForWebsite($limit = 20, $offset = 0, $connectionStatus = ''): object
    {
        $apiUri = 'advcampaigns/website/' . $this->websiteId . '/';
        $apiUri .= '?limit=' . $limit;
        $apiUri .= '&offset=' . $offset;
        $apiUri .= '&connection_status =' . $connectionStatus; //active, pending, declined

        $campaigns = $this->client->get(
            $this->baseUri . $apiUri,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token->access_token
                ],

            ]
        )->getBody()->getContents();

        return json_decode($campaigns);
    }

    public function getCategories($asArray = false, $limit = 20, $offset = 0): object
    {
        $apiUri = 'categories/';
        $apiUri .= '?limit=' . $limit;
        $apiUri .= '&offset=' . $offset;

        $categories = $this->client->get(
            $this->baseUri . $apiUri,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token->access_token
                ],

            ]
        )->getBody()->getContents();


        return json_decode($categories, $asArray);
    }


    public function saveCategoriesToDb()
    {
        $cats = $this->getCategories(false, 500);

        var_dump($cats);

        foreach ($cats->results as $category) {
            if ($category->parent !== null) {
                if (SubCategory::firstWhere('admitad_id', '=', $category->id)) {
                    continue;
                }


                $cat = new SubCategory();
                $cat->category_id = Category::firstWhere('admitad_id', '=', $category->parent->id)->id;
            } else {
                if (Category::firstWhere('admitad_id', '=', $category->id)) {
                    continue;
                }

                $cat = new Category();
            }

            $cat->name = $category->name;
            $cat->admitad_id = $category->id;
            $cat->slug = Str::slug($category->name, '-');


            $cat->save();
        }
    }


    public function saveCampaigns($limit = 20, $offset = 0)
    {
        $admitadShops = Cache::remember(
            'advCamps-' . $limit . '-' . $offset,
            86400,
            function () use ($limit, $offset) {
                return $this->getAdvCampaignsForWebsite($limit, $offset);
            }
        );

        if (empty($admitadShops->results)) {
            return 'Results empty';
        }

        foreach ($admitadShops->results as $admShop) {
            $shop = Shop::firstWhere('adm_id', $admShop->id);


            if ($shop) {
                if (strtotime($shop->adm_modified_date) == strtotime($admShop->modified_date)) {
                    echo 'in db: ' . $shop->id . "<br />";
                    continue;
                } else {
                    echo 'updated in db: ' . $shop->id . "<br />";
                }
            } else {
                $shop = new Shop();
                $shop->adm_id = $admShop->id;
            }


            $pattern = [
                '/\[.*\]/i',
                '/\+.*/i',
                '/Many GEO.*/i',
                '/WW/'
            ];

            $shop->name = $admShop->name;

            $shop->name = preg_replace($pattern, '', $shop->name);
            $shop->name = trim($shop->name);
            $shop->name = preg_replace('/\s+/', ' ', $shop->name);

            $shop->slug = Str::slug($shop->name, '-');
            $exist = Shop::where('slug', '=', $shop->slug)->count();
            if ($exist > 0) {
                $shop->slug = $shop->slug . '-' . ($exist + 1);
                $shop->name = $shop->name . '-' . ($exist + 1);
            }


            $shop->website = $admShop->site_url;
            $shop->adm_image = $admShop->image;
            $shop->adm_status = $admShop->status;
            $shop->adm_gotolink = $admShop->gotolink;
            $shop->adm_modified_date = $admShop->modified_date;
            $shop->adm_connection_status = $admShop->connection_status;
            $shop->popular = 0;


            $shop->save();


            foreach ($admShop->categories as $admCategory) {
                if ($admCategory->parent !== null) {
                    $myCat = SubCategory::firstWhere('admitad_id', '=', $admCategory->id);
                    if (!$myCat) {
                        continue;
                    }
                    $shop->subCategories()->attach($myCat->id);
                } else {
                    $myCat = Category::firstWhere('admitad_id', '=', $admCategory->id);
                    if (!$myCat) {
                        continue;
                    }
                    $shop->categories()->attach($myCat->id);
                }
            }

            echo 'added to db: ' . $shop->id . '<br />';
        }
        return 'All imported';
    }
}
