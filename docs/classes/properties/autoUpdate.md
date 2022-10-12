# Documentation - static Urls::$autoUpdate
## Description
Sets whether the current project should auto update or not. Should be set to false for production use.
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

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true);

$urls->exe();

?>
```
