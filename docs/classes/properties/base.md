# Documentation - static $base
## Description
Sets the base URL for the project.
|  Type  | Default Value |
| ------ | ------------- |
| String |     `""`     |
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
$urls->path('blog/', 'blog-home.php', true);

$urls->exe();

?>
```
