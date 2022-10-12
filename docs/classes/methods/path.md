# Documentation - Urls::path($path, $file, $end=false, $cs=null, $vars=null)
## Description
Creates a new path.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $path   | -       | String | :heavy_check_mark: | The URL path you want to call this function on. |
|   $file   | -       | String/Array/Object: Urls | :heavy_check_mark: | The file path and name you want to use as a template or an array containing one string element you want to directly output or a Urls object to compare a sub-path. |
|   $end    | False   | Bool   | :x:                | True if this is the end of the path. If there is more after this point, it will be seen as not matching and will result in a 404 error. |
|   $cs     | NULL    | Bool   | :x:                | Whether this path is case sensitive or not. If NULL, the default defined in `URLS::$cs` will be assumed. |
|   $vars   | NULL    | Array  | :x:                | An array of variables to pass on to the included page. |
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

$blog = new Urls;
$urls->path('posts/', 'posts.php', true, false);

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true, false, array("Hello, ", "World!"));
$urls->path('blog/', ["This is my blog!"], true, false);
$urls->path('blog/', Urls::echo("This is my blog!"), true, false);
$urls->path('blog/', $blog, false, false); // Note: $end should always be false if $file is type object or else, $blog will not be called

$urls->exe();

?>
```
