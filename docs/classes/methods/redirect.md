# Documentation - Urls::redirect($path, $to, $cs=true, $type=null)
## Description
Creates a new redirect.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $path   | -       | String | :heavy_check_mark: | The URL path you want to call this function on. |
|   $to     | -       | String | :heavy_check_mark: | The URL you want to redirect to. |
|   $cs     | NULL    | Bool   | :x:                | Whether this path is case sensitive or not. If NULL, the default defined in `URLS::$cs` will be assumed. |
|   $type   | NULL    | Int    | :x:                | The response to send with the redirect. |
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
$urls->redirect('Github/', 'https://github.com/urls-framework/URLS', true, 301);

$urls->exe();

?>
```
