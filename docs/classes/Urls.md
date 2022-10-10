# Documentation - class Urls
## Description
The class that contains most of URLS' functionality.

## Examples
```PHP
<?php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php');
*/
include 'urls/Urls.php';
Urls::$base = '/';

$urls = new Urls;


$urls->exe();

?>
```
