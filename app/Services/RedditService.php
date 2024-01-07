<?php

namespace App\Services;

use GuzzleHttp\Client;

class RedditService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPosts($type = 'hot', $limit = 2)
    {
        $redditEndpoint = "https://www.reddit.com/r/FlutterDev/{$type}.json?limit={$limit}";

        try {
            $response = $this->client->get($redditEndpoint);
            $data = json_decode($response->getBody(), true);

                if(isset( $data[0]['data']['children'])){
                    $posts =$data[0]['data']['children'];
                }
                else{
                    $posts =$data['data']['children'];

                }

            return $posts;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
