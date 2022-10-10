# Documentation - public __construct(...$pathArrays)
## Description
Sets a default set of paths.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter      | Default |  Type  |      Required      | Description |
| ---------      | ------- | ------ | ------------------ | ----------- |
| ...$pathArrays | NULL    |  Array | :x:                | A list of path arrays in the format of `[(The URL path you want to call this function on), (The file path and name you want to use as a template), (true/false whether the path is case sensitive), (true/false Whether there are no more sub-paths to compare after this), (Variables to pass on to the included file)]` |
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

$urls = new Urls('blog/', 'blog-home.php', false, true, null);

$urls->exe();

?>
```
