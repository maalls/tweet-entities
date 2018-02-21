<?php

include __dir__ . "/vendor/autoload.php";


$entities = \Maalls\TweetEntities::create("@someone and @someonelse this is a #tweet with #url http://someurl.com");
var_dump($entities);