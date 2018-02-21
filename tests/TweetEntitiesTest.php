<?php 
declare(strict_types=1);

namespace Maalls\Test;


use PHPUnit\Framework\TestCase;
use Maalls\TweetEntities;

final class TweetEntitiesTest extends TestCase
{

    public function testCreate(): void
    {

        $entities = TweetEntities::create("@maalls @usn @hello_word hello world http://ultrasupernew.com #hello #hello_world #てすち・はしー");
        
        $results = [
            "urls" => ["http://ultrasupernew.com"],
            "hashtags" => ["#hello", "#hello_world", "#てすち・はしー"],
            "mentions" => ["@maalls", "@usn", "@hello_word"],

        ];
        $this->assertEquals($results, $entities);

        
    }

}


