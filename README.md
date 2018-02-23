# Installation

```console
composer require maalls/tweet-entities
```

# Example

Parse tweet message and include URL informations (title, description, image) from OG Tags.
```php
$tweetEntities = new Maalls\TweetEntities();
$entities = $this->create("@someone this is a #tweet with url http://someurl.com");
```

Only parse tweet.
```php

$entities = $tweetEntities->parse("@someone this is a #tweet with url http://someurl.com", true);

```

# Test

run:
```console
./vendor/bin/phpunit tests/
```