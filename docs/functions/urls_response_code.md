# Documentation - urls_response_code($error, $doc=null, $showNoError=false)
## Description
Sets an HTTP error.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $error  | -       | Int | :heavy_check_mark: | The HTTP error code. |
|   $doc    | NULL    | String | :x:                | The path and file to the document you want to use |
|$showNoError| FALSE  | Boolean | :x:              | Whether or not to show the default browser error page or the URLS default error page.  |
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
    urls_response_code(404);
}
?>
```
