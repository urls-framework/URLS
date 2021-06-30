# Documentation - $ERROR_(HTTP Error Code)
## Description
Sets the template file for the selected HTTP error.
|   Set                  |         Call       |  Value | File | Default Value |
| ---------------------- | ------------------ | ------ | ---- | ------------- |
|   :heavy_check_mark:   | :x:                | String | Settings File | -|
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
$ERROR_404 = 'includes/error404.php';

urls_path('blog/<pid>/', 'posts.php');
urls_404();

?>
```
