# Guides - Deploy your Site
Deploying your site is not very different than deploying any other PHP site. However, it is very important to change a few settings or else the performance and security will be significantly effected.
1. Disable `Urls::$debug` and `Urls::$autoUpdate` by adding `Urls::$debug = false;` and `Urls::$autoUpdate = false;` to your settings file:
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
2. Deploy your site as you would any other PHP site. Each host is a little different. See your hosting provider's documentation for instructions.
