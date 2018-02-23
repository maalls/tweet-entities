<?php 
declare(strict_types=1);

namespace Maalls\Test;


use PHPUnit\Framework\TestCase;
use Maalls\TweetEntities;

final class TweetEntitiesTest extends TestCase
{

    public function testParse(): void
    {
        $t = new TweetEntities();
        $entities = $t->parse("@maalls @usn @hello_word hello world http://ultrasupernew.com #hello #hello_world #てすち・はしー");
        
        $results = [
            "urls" => ["http://ultrasupernew.com"],
            "hashtags" => ["#hello", "#hello_world", "#てすち・はしー"],
            "mentions" => ["@maalls", "@usn", "@hello_word"],

        ];
        $this->assertEquals($results, $entities);

        
    }

    public function testCreate()
    {

        $t = new TweetEntities();

        $entities = $t->create("@maalls @usn @hello_word hello world http://ultrasupernew.com #hello #hello_world #てすち・はしー");


        $this->assertTrue(isset($entities["urls"][0]));

        $info = $entities["urls"][0];

        $this->assertEquals("UltraSuperNew", $info["og:title"]);

    }

}


