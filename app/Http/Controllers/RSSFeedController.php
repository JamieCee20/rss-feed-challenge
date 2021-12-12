<?php

namespace App\Http\Controllers;

use App\Models\RSSFeed;

class RSSFeedController extends Controller
{
    /**
     * Read data from xml url and insert into db if it doesn't already exist. Display view with the data
     */
    public function index(RSSFeed $rss) {

        $feed = $this->store();

        if($feed) {

            if(request()->sort == 'old_new') {
                $feedList = $rss->orderBy('pubDate')->get();
            } elseif(request()->sort == 'new_old') {
                $feedList = $rss->orderBy('pubDate', 'DESC')->get();
            } else {
                $feedList = $rss::inRandomOrder()->get();
            }

            return view('feeds.show', compact('feedList'));
        }
    }

    /* Function to read contents from xml url and store into json array */
    private function store() {
        $xmlFeed = file_get_contents('http://xkcd.com/rss.xml'); // Retrieve xml data from feed url
        $xmlObject = simplexml_load_string($xmlFeed); // read xml data

        $jsonData = json_encode($xmlObject); // Convert xml to json
        $phpDataArray = json_decode($jsonData, true); // decode json to access objects

        /* Foreach item add to database if it doesn't already exist */
        foreach($phpDataArray['channel']['item'] as $data) {
            RSSFeed::firstOrCreate([
                'title' => $data['title'],
                'description' => $data['description'],
                'link' => $data['link'],
                'guid' => $data['guid'],
                'pubDate' => date('Y-m-d H:i:s', strtotime($data['pubDate']))
            ]);
        }

        return $phpDataArray; //Return the items only from xml url.
    }

}
