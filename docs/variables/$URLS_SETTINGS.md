# Documentation - $URLS_SETTINGS
## Description
Holds the current settings file.
|   Set                  |         Call       |  Value | File | Default Value |
| ---------------------- | ------------------ | ------ | ---- | ------------- |
|   :x:   | :heavy_check_mark: | String | Settings File | The current settings file set when installed |
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
