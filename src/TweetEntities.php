<?php

namespace Maalls;
use Maalls\OGTagScraper\OGTagScraper;

class TweetEntities 
{

    public $scraper;

    public function __construct($scraper = null)
    {

        if($scraper) {
        
            $this->scraper = $scraper;

        }
        else {

            $this->scraper = new OGTagScraper();

        }

    }

    public function create($tweet)
    {

        $entities = $this->parse($tweet);

        $urls = [];

        foreach($entities["urls"] as $url) {

            $og = $this->scraper->scrap($url);
            $og["url"] = $url;

            $urls[] = $og;

        }

        $entities["urls"] = $urls;

        return $entities;

    }

    public function parse($tweet)
    {

        $entities = [

            "urls" => [],
            "hashtags" => [],
            "mentions" => []

        ];

        preg_match_all("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/ius", $tweet, $matches);

        $urls = [];

        foreach ($matches as $match) {

            if ($match) {
                $url = $match[0];

                if (!in_array($url, $urls)) {

                    $urls[] = $url;

                }

            }

        }
        $entities["urls"] = $urls;
        $entities["hashtags"] = self::match("#[\w_・]+", $tweet);
        $entities["mentions"] = self::match("@[0-9a-z_]+", $tweet);

        return $entities;


    }

    public function match($regex, $text) {

        preg_match_all("/" . $regex . "/ius", $text, $matches);

        $results = [];
        if ($matches[0]) {
            foreach ($matches[0] as $match) {

                $value = $match;

                if (!in_array($value, $results)) {

                    $results[] = $value;

                }

            }
        }

        return $results;

    }

}