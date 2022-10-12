# Documentation - static $successPaths
## Description
An array containing all the paths successfuly called.
|  Type | Default Value |
| ----- | ------------- |
| Array |    array()    |
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
<p>
Paths to get here:</br>
<?php
foreach (Urls::$successPaths as $path) {
    echo htmlspecialchars($path)."</br>";
}
?>
</p>

</body>
</html>
```
