# Documentation - Urls::error($doc=null, $str=null, $template="other", $code=null)
## Description
Triggers an error specified.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $doc    | NULL    | String | :x:                | The path to the file you want to display. |
|   $str    | NULL    | String | :x:                | The string you want to output. |
| $template | "other" | String/Int | :x:                | The URLS error template you want to use. If NULL, then it will be set to `"other"` |
|   $code   |   NULL  |  Int   | :x:                | The HTTP error code for the error. If NULL, then there will be no error code set. |
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

<?php
Urls::$self->error("errors/custom_error.php", null, "other", 500);
Urls::$self->error(null, "There is an error!", null, null);
Urls::$self->error(null, null, 500, 500);
?>

<p>Welcome!</p>
</body>
</html>
```
