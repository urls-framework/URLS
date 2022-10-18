<?php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php', true);
*/
include 'urls/Urls.php';
Urls::$base = '/';
Urls::$defaultErrors[404] = "errors/404.php";
Urls::$cs = true;

$contributors = new Urls;
$contributors->errors[404] = "errors/contributors_404.php";
$contributors->path('/', 'templates/contributors.php', true);
$contributors->path('Me', 'templates/Me.php', true);
$contributors->path('My-Friend', 'templates/My-Friend.php', true);
$contributors->path('Another-Friend', 'templates/Another-Friend.php', true);

$urls = new Urls;
$urls->path('/', 'templates/home.php', true);
$urls->path('about/', 'templates/about.php', true);
$urls->path('about/authors/', 'authors_settings.php');
$urls->path('about/contributors/', $contributors);
$urls->path('posts/', 'templates/posts.php', true);
$urls->path('posts/<post>/', 'templates/posts.php', true);
$urls->path('home/', 'templates/home.php', true, false);
$urls->redirect('post1/', Urls::$base.'posts/1');
$urls->redirect('URLS/', 'https://github.com/urls-framework/URLS', false, 302);
$urls->path('vars/', 'templates/vars.php', true, true, "This is a variable from the path");

$urls->exe();

?>
