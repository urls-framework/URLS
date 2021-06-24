# Documentation - urls_error($doc=null, $str=null, $error=array(), $template="other", $code=500)
## Description
Sets a custom error.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type   |      Required      | Description |
| --------- | ------- | ------- | ------------------ | ----------- |
|   $doc    | NULL    | String  | :x:                | The path and file to the document you want to use. |
|   $str    | NULL    | Boolean | :x:                | The HTML you want to display when the error is called. |
|   $error  | array() |  Array  | :x:                | An array to pass variables to the error. |
| $template | "other" | String  | :x:                | The URLS error template to use. |
|   $code   | 500     |   Int   | :x:                | The HTTP status code to set. |
## Examples
```PHP
<?php
if ($_ACCESS['page'] > 2) { ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>My Blog - Home</title>
    </head>
    <body>
        <h1>This is my Blog</h1>
        <p>Welcome!</p>
    </body>
    </html>
<?php } else {
    urls_error();
}
?>
```
