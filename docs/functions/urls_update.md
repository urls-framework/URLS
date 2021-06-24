# Documentation - urls_update()
## Description
Updates the URLS framework.
| Returns |
| ------- |
| Boolean |

### Parameters
| Parameter | Default |  Type   |      Required      | Description |
| --------- | ------- | ------- | ------------------ | ----------- |
|     -     | -       | -       | -                  | -           |

## Examples
```PHP
<?php
if ($_ACCESS['page'] > 2) { 
    urls_update();
    ?>
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
