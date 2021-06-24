# Guides - Manual Installation
***Note:** We suggest that you install using the `urls_welcome.php` file as it is easy to configure the URLS Framework incorrectly with manual installation.
1. Download the following files: [URLS/scr/update.php](https://github.com/urls-framework/URLS/blob/main/scr/update.php) and [URLS/scr/urls.php](https://github.com/urls-framework/URLS/blob/main/scr/urls.php).
2. Create a file you would like to use as your settings file and fill it with a minimum of the following (fill in the blanks):
   ```PHP
   <?php
   include '(the urls.php file)';
   $BASE_URL = '(the directory this is installed in)';
   $URLS_SETTINGS = '(the name of this file)';
   
   urls_404();
    ?>
   ```
3. Start building your URLs!
