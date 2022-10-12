# Documentation - static $self
## Description
The current instance of the `Urls` object.
|  Type | Default Value |
| ----- | ------------- |
| Object: `Urls` |   Current `Urls` object.   |
## Examples
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
<p>Welcome!</p>
<?php Urls::$self->error_403(); ?>
</body>
</html>
```
