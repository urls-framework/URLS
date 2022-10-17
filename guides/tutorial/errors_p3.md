# HTTP Errors (part 3)
While URLS allows you to set and call HTTP errors, if they are called outside of the scope of URLS (like the server triggering a 500 error), the custom settings will appear in the error. To customize errors at the server level, you need to edit the `.htaccess` file. To do this, we will be using the URLS method `Urls::Urls::rewriteCond()`.
1. Create a new file in templates called `errors.php` and fill it with:
   ```PHP
   <?php
   
   Urls::rewriteCond('ErrorDocument 404 '.Urls::$base.'errors/404.php');
   Urls::rewriteCond('ErrorDocument 500 '.Urls::$base.'errors/500.php');
   Urls::rewriteCondRemove('ErrorDocument 404 '.Urls::$base.'errors/404.php');
   
   echo "Done";
   ?>
   ```
2. Next create a new file in errors called `500.php` and fill it with:
   ```PHP
   <?php
   $pageTitle = 'Error 500';
   include './includes/header.inc.php';
   ?>
   
   <h1>Error</h1>
   <p>Server error.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
3. Now add 
3. Now if there is a 500 error that was not triggered by or within URLS, the same error page as URLS will be displayed.

## Explanation
This section uses two functions, `Urls::rewriteCond()` and `Urls::rewriteCondRemove()`. `Urls::rewriteCond()` adds a new directive to the project `.htaccess` file and `Urls::rewriteCondRemove()` removes a directive set by `Urls::rewriteCond()`. What this code does is it edits the `.htaccess` file and sets the 404 error document to `/(base directory)/errors/404.php`, it does the same for 500 errors, and finally, it removes the directive telling the server to set the 404 error document to `/(base directory)/errors/404.php`.

## More About Errors
There are a lot of different error configurations for URLS.
