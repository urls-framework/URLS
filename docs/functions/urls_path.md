# Documentation - urls_path($path, $file, $vars=null)
## Description
Creates a new path.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $path   | -       | String | :heavy_check_mark: | The URL path you want to call this function on. |\
|   $file   | -       | String | :heavy_check_mark: | The file path and name you want to use as a template. |
|   $vars   | NULL    | array() | :x:               | An array that you want to pass to the template file. |
## Examples
```PHP
<?php
/*
URLS framework url config file.

Add your paths here:
ex. urls_path('blog/', 'blog-home.php');
*/
include 'urls/urls.php';
$BASE_URL = '/';
$URLS_SETTINGS = settings.php

urls_path('blog/', 'blog-home.php');
urls_404();

?>
```
