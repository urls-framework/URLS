<?php
/*
URLS framework url config file.

Add your paths here:
ex. path('blog/', 'blog-home.php');
*/
include 'urls/urls.php';
$BASE_URL = '/';

path('blog/', 'blog-home.php');
urls_404();

?>
