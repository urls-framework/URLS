# Documentation - Urls::$errors
## Description
An array containing the paths to the default error documents for this instance.
|  Type | Default Value |
| ----- | ------------- |
| Array |    array()    |
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
$urls->errors[404] = "errors/404_error.php";

$urls->exe();

?>
```
