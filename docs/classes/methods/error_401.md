# Documentation - Urls::error_401($doc=null, $showNoError=false)
## Description
Triggers a 401 HTTP error.
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

<?php Urls::$self->error_401("errors/401_error.php", false); ?>

<p>Welcome!</p>
</body>
</html>
```
