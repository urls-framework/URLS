# Documentation - static $cs
## Description
Sets whether the project should be case sensitive be default.
|  Type | Default Value |
| ----- | ------------- |
| Bool  |     True      |
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
Urls::$cs = false;

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true);

$urls->exe();

?>
```
