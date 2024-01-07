<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RedditService;
use Kreait\Firebase\Contract\Database;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class RedditController extends Controller
{
    protected $redditService;


    public function __construct(RedditService $redditService,Database $database)
    {
        $this->redditService = $redditService;
        $this->database=$database;
        $this->tablename="reddits";
    }

    public function getPostsController()
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

            // $hotposts = $this->paginatePosts($hotposts);
            // $newposts = $this->paginatePosts($newposts);
            // $raiseposts = $this->paginatePosts($raiseposts);

            return view('reddit', compact('hotposts','newposts','raiseposts'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    protected function paginatePosts($posts, $perPage = 5)
    {
        // Get the current page from the request
        $currentPage = Paginator::resolveCurrentPage('page');

        // Slice the array for the current page
        $currentPageItems = array_slice($posts, ($currentPage - 1) * $perPage, $perPage);

        // Create a new paginator instance only for the current page items
        $paginatedPosts = new LengthAwarePaginator(
            $currentPageItems,
            count($posts),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return $paginatedPosts;
    }
}
