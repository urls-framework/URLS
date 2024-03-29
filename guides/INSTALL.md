# Guides - Install
1. Download and open the `urls_install.php` file in your browser.
2. Enter a base url. The base url is the path from your servers public directory (usally `public_html` or `htdocs`) to where you want the framework to be installed. It should begin and end in a `/`. If the base directory is the root of the public directory, then enter one `/`. For example, if your public directory is `htdocs` and you want to install the framework at `/htdocs/blog/` then you should enter in `/htdocs/blog/`, but if you want to install it in `htdocs`, then you should just enter `/`.
3. Enter the name of the settings file you want to use. This file will be auto generated in the directory that you installed the framework in. Do not enter in any path information. Just enter the name of the file. If the file does not exist, then it will be created. **BEWARE: IF THE FILE SELECTED ALREADY EXISTS, IT WILL BE OVERWRITTEN!!!**
4. If you are deploying for production, it is suggested that you check the checkbox asking if you would like to delete this file after installation and the checkbox asking if you would like to delete the installation files after installation. If you are still in development, you may want to keep this file in case you want a fresh reinstall. **BEWARE: IF YOU KEEP THIS FILE ON A LIVE SERVER ANYONE CAN REINSTALL AND/OR BREAK YOU SITE!!!**
5. If you are deploying for production, add `Urls::$debug = false;` and `Urls::$autoUpdate = false;` to your settings file:
   ```PHP
   <?php
   /*
   URLS framework url config file.

   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/';
   Urls::$debug = false;
   Urls::$autoUpdate = false;

   $urls = new Urls;
   $urls->path('blog/', 'blog-home.php', true);

   $urls->exe();

   ?>
   ```
6. Done. Open up your settings file and start building your URLs!
