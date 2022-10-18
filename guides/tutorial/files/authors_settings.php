<?php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php', true);
*/

$authors = new Urls;
$authors->path('/', 'templates/authors.php', true);
$authors->path('Me', 'templates/Me.php', true);
$authors->path('My-Friend', 'templates/My-Friend.php', true);

$authors->exe();

?>