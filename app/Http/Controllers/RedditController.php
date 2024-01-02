<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class RedditController extends Controller
{
    public function getHotPosts()
    {
        $client = new Client();
        $redditEndpoint = 'https://www.reddit.com/r/FlutterDev/hot.json?limit=2'; // Adjust limit as needed

        try {
            $response = $client->get($redditEndpoint);
            $data = json_decode($response->getBody(), true);

            // Extract relevant information from the response
            $posts = $data['data']['children'];

            //return response()->json(['posts' => $posts]);
            return view('reddit',compact('posts'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
