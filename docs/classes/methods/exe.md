# Documentation - Urls::exe()
## Description
The entry-point into the URLS. Checks the URI and redirects the user.
| Returns |
| ------- |
|  void   |

### Parameters
| Parameter | Default |  Type  |      Required      | Description |
| --------- | ------- | ------ | ------------------ | ----------- |
|   -   | -       | - | - | - |
## Examples
```PHP
<?php
/*
URLS framework url config file.

Add your paths here:
ex. $urls->path('blog/', 'blog-home.php', true);
*/
include 'urls/Urls.php';
Urls::$base = '/';

$urls = new Urls;
$urls->path('blog/', 'blog-home.php', true)

$urls->exe();

?>
```
