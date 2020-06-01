<?php

namespace App\Http\Controllers;

use Cache;
use GuzzleHttp\Client;

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
        return view('admitad.admitad-api');
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


    public function getAdvCampaignsForWebsite($limit = 20, $offset = 0, $connectionStatus = 'active'): object
    {
        $apiUri = 'advcampaigns/website/' . $this->websiteId . '/';
        $apiUri .= '?limit=' . $limit;
        $apiUri .= '&offset=' . $offset;
        $apiUri .= '&connection_status =' . $connectionStatus;

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

    public function getCategories()
    {
        $apiUri = 'categories/';

        $categories = $this->client->get(
            $this->baseUri . $apiUri,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token->access_token
                ],

            ]
        )->getBody()->getContents();


        return ($categories);
    }
}
