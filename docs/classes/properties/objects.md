# Documentation - static $objects
## Description
An array containing each `Urls` instance called since the `exe()` was called in the order they were called.
|  Type | Default Value |
| ----- | ------------- |
| Array |   `array()`   |
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
$blog->$errors[403] = "obj2/403_error.php";

$urls = new Urls;
$urls->path('blog/', $blog, false);
$urls->$errors[403] = "obj1/403_error.php";

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
<?php
Urls::$objects[0]->error_403();
Urls::$objects[1]->error_403();
?>
</body>
</html>
```
