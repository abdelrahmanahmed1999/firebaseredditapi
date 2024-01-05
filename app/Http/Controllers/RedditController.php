<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RedditService;
use Kreait\Firebase\Contract\Database;



class RedditController extends Controller
{
    protected $redditService;


    public function __construct(RedditService $redditService,Database $database)
    {
        $this->redditService = $redditService;
        $this->database=$database;
        $this->tablename="contacts";
    }

    public function getHotPosts()
    {
        try {
            /*start get data from rdditeservice*/
            $hotposts = $this->redditService->getPosts('hot',3);
            $newposts = $this->redditService->getPosts('new',3);
            $raiseposts = $this->redditService->getPosts('raise',3);
            /*end get data from rdditeservice*/

            /*start store data into firebase*/
            $this->database->getReference($this->tablename)->push($hotposts);
            $this->database->getReference($this->tablename)->push($newposts);
            $this->database->getReference($this->tablename)->push($raiseposts);
            /*end store data into firebase*/


            return view('reddit', compact('hotposts','newposts','raiseposts'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
