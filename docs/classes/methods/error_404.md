# Documentation - Urls::error_404($doc=null, $showNoError=false)
## Description
Creates a new path.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $doc    | NULL    | String | :x:                | The path to the file you want to display. |
| $showNoError | False | Bool  | :x:                | Whether or not you want to show a custom or URLS default error. If true, the browser will handle the error. |
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
<h1>This is my Blog</h1>

<?php Urls::$self->error_404("errors/404_error.php", false); ?>

<p>Welcome!</p>
</body>
</html>
```
