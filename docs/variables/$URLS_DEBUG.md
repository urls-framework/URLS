# Documentation - $URLS_DEBUG
## Description
Sets whether the current project is in debug mode or not.
|   Set                  |         Call       |  Value | File | Default Value |
| ---------------------- | ------------------ | ------ | ---- | ------------- |
|   :heavy_check_mark:   | :x:                | Boolean | Settings File | FALSE |
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
$URLS_DEBUG = true;

urls_path('blog/<pid>/', 'posts.php');
urls_404();

?>
```
