# Documentation - static Urls::$vars
## Description
An array containing variables passed on in the `path` method.
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

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true, true, ["Hello,", " World!"]);

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
<h1>This is my Blog</h1>
<p><?php echo Urls::$vars[0].Urls::$vars[1]; ?></p>
</body>
</html>
```
