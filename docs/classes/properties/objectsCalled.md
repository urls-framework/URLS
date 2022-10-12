# Documentation - static $objectsCalled
## Description
The number of instances traversed since `exe()` was called.
|  Type | Default Value |
| ----- | ------------- |
|  Int  |       0       |
## Examples
```PHP
<?php
// settings.php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php', true);
*/
include 'urls/Urls.php';
Urls::$base = '/';

$blog = new Urls;
$blog->path('/', 'blog-home.php', true);

$urls = new Urls;
$urls->path('blog/', $blog, false);

$urls->exe();

?>
```

```PHP
<!-- blog-home.php -->
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>My Blog - Home</title>
</head>
<body>
<h1>This is my blog!</h1>
<p>The number of objects traversed to get here is: <?php echo Urls::$objectsCalled; ?>.</p> <!-- Should be 2 -->
</body>
</html>
```
