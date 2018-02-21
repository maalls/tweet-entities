# Installation

```console
composer require maalls/tweet-entities
```

# Example

```php
$entities = Maalls\TweetEntities:create("@someone this is a #tweet with url http://someurl.com");
var_dump($entities);
/* Expected results:
array(3) {
  'urls' =>
  array(1) {
    [0] =>
    string(18) "http://someurl.com"
  }
  'hashtags' =>
  array(2) {
    [0] =>
    string(6) "#tweet"
    [1] =>
    string(4) "#url"
  }
  'mentions' =>
  array(2) {
    [0] =>
    string(8) "@someone"
    [1] =>
    string(11) "@someonelse"
  }
}
*/
```

# Test

run:
```console
./vendor/bin/phpunit tests/
```