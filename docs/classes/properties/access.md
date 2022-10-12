# Documentation - static $access
## Description
Similar to `$_GET` and `$_POST`, `$access` sets variables in variable urls and sets each one in an array element with the key being the variable name.
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
$urls->path('post/<postId>/', 'blog-post.php', true);

$urls->exe();

?>
```

```PHP
<!-- blog-post.php -->
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>My Blog - Home</title>
</head>
<body>
<h1>This is post number <?php echo htmlspecialchars(Urls::$access['postId']); ?></h1>
<p>Welcome!</p>
</body>
</html>
```
