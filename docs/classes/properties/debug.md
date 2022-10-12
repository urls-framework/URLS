# Documentation - static $debug
## Description
Sets whether the current project is in debug mode or not.
|  Type | Default Value |
| ----- | ------------- |
| Bool  |     False     |
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
Urls::$debug = true;

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true);

$urls->exe();

?>
```
