# Documentation - $BASE_URL
## Description
Sets the base URL for the project.
|   Set                  |  Call |  Value | File | Default Value |
| ---------------------- | ----- | ------ | ---- | ------------- |
|   :heavy_check_mark:   |  :x:  | String | Settings File| - |
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

urls_path('blog/<pid>/', 'posts.php');
urls_404();

?>
```
