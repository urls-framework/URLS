# Documentation - static Urls::echo($echo='')
## Description
Returns an array containing one string element to be used to directly output in a path method. It can be used instead of an array to directly output text.
| Returns |
| ------- |
|  Array  |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $echo   | An empty string | String | :x: | A string to directly output in a path. |
## Examples
```PHP
<?php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php', true);
*/
include 'urls/Urls.php';
Urls::$base = '/';

$urls = new Urls;
$urls->path('blog/', Urls::echo('This is my blog!'), true);

$urls->exe();
?>
```
