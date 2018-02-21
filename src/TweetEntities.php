<?php

namespace Maalls;


class TweetEntities 
{

    public static function create($tweet)
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

    public static function match($regex, $text) {

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