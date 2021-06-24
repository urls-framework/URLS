# Documentation - $URLS_VERSION
## Description
Holds the current version of URLS in a string.
|   Set                  |         Call       |  Value | File | Default Value |
| ---------------------- | ------------------ | ------ | ---- | ------------- |
|   :x:                  | :heavy_check_mark: | String | Template Files | The current Version when installed |
## Examples
```PHP
<?php
if ($URLS_VERSION == '1.0') { ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>My Blog - Home</title>
    </head>
    <body>
        <h1>This is my Blog</h1>
        <p>Welcome!</p>
        <p>Made with the URLS Framework version: <?php echo $URLS_VERSION; ?></p>
    </body>
    </html>
<?php } ?>
```
