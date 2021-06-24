# Documentation - $URLS_AUTO_UPDATE
## Description
Sets whether the current project should auto update or not. URLS will only update for small bug fixes and security updates.
|   Set                  |         Call       |  Value | File | Default Value |
| ---------------------- | ------------------ | ------ | ---- | ------------- |
|   :heavy_check_mark:   | :x:                | Boolean | Settings File | TRUE |
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
$URLS_AUTO_UPDATE = false;

urls_path('blog/<pid>/', 'posts.php');
urls_404();

?>
```
