# Documentation - static Urls::rewriteCond($cond, $htaccess=null)
## Description
Adds a rewrite condition to the `.htaccess` file between the `# --URLS ADD_COND BEGIN--` and `# --URLS ADD_COND END--` markers.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $cond   | -       | String | :heavy_check_mark: | The condition to add to the `.htaccess` file. |
| $htaccess | NULL    | String | :x:                | The path to the `.htaccess` file. |
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

Urls::rewriteCond('# This is a .htaccess comment');
Urls::rewriteCond('# This is another .htaccess comment', dirname(__DIR__, 1).'\.htaccess');

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true);

$urls->exe();

?>
```
