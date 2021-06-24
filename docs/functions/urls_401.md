# Documentation - urls_401($doc=null, $showNoError=false)
## Description
Sets a 401 error.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   $doc    | NULL    | String | :x:                | The path and file to the document you want to use. |
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
    urls_401();
}
?>
```
