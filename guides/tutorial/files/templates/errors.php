<?php

Urls::rewriteCond('ErrorDocument 404 '.Urls::$base.'errors/404.php');
Urls::rewriteCond('ErrorDocument 500 '.Urls::$base.'errors/500.php');
Urls::rewriteCondRemove('ErrorDocument 404 '.Urls::$base.'errors/404.php');

echo "Done";
?>