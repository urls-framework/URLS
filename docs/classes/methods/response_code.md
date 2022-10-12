# Documentation - Urls::response_code($error, $doc=null, $showNoError=false)
## Description
Triggers the error specified.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $error  | -       | Int    | :heavy_check_mark: | The HTTP error code you want to call. |
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

<?php Urls::$self->response_code(403, "errors/404_error.php"); ?>

<p>Welcome!</p>
</body>
</html>
```
