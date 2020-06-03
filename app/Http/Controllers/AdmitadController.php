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

        foreach ($admitadShops->results as $shop) {
            if (Shop::firstWhere('adm_id', $shop->id)) {
                //TODO if modified_date ....
                echo 'in db: ' . Shop::firstWhere('adm_id', $shop->id)->id . "<br />";
                continue;
            }

            $newShop = new Shop();


            $newShop->adm_id = $shop->id;

            $pattern = [
                '/\[.*\]/i',
                '/\+.*/i',
                '/Many GEO.*/i',
                '/WW/'
            ];

            $newShop->name = $shop->name;

            $newShop->name = preg_replace($pattern, '', $newShop->name);
            $newShop->name = trim($newShop->name);
            $newShop->name = preg_replace('/\s+/', ' ', $newShop->name);

            $newShop->slug = Str::slug($newShop->name, '-');
            $exist = Shop::where('slug', '=', $newShop->slug)->count();
            if ($exist > 0) {
                $newShop->slug = $newShop->slug . '-' . ($exist + 1);
                $newShop->name = $newShop->name . '-' . ($exist + 1);
            }


            $newShop->adm_image = $shop->image;
            $newShop->adm_status = $shop->status;
            $newShop->adm_gotolink = $shop->gotolink;
            $newShop->adm_modified_date = $shop->modified_date;
            $newShop->adm_connection_status = $shop->connection_status;
            $newShop->popular = 0;


            $newShop->save();


            foreach ($shop->categories as $admCategory) {
                if ($admCategory->parent !== null) {
                    $myCat = SubCategory::firstWhere('admitad_id', '=', $admCategory->id);
                    if (!$myCat) {
                        continue;
                    }
                    $newShop->subCategories()->attach($myCat->id);
                } else {
                    $myCat = Category::firstWhere('admitad_id', '=', $admCategory->id);
                    if (!$myCat) {
                        continue;
                    }
                    $newShop->categories()->attach($myCat->id);
                }
            }

            echo 'added to db: ' . $newShop->id . '<br />';
        }
        return 'All imported';
    }
}
