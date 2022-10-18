# Deploying
The final step to building our blog is deploying it on a web server. URLS makes it really easy to deploy your site however, there are a few things that need to be changed in order for it to work on a live server.
1. Make sure that your site is not in debug mode. Debug mode is off by default, however it is a good idea to manually turn it off. To do this, add `Urls::$debug = false` under `Urls::$cs` in `settings.php`. The final file should look like:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/';
   Urls::$defaultErrors[404] = "errors/404.php";
   Urls::$cs = true;
   Urls::$debug = false;
   
   $contributors = new Urls;
   $contributors->errors[404] = "errors/contributors_404.php";
   $contributors->path('/', 'templates/contributors.php', true);
   $contributors->path('Me', 'templates/Me.php', true);
   $contributors->path('My-Friend', 'templates/My-Friend.php', true);
   $contributors->path('Another-Friend', 'templates/Another-Friend.php', true);
   
   $urls = new Urls;
   $urls->path('/', 'templates/home.php', true);
   $urls->path('about/', 'templates/about.php', true);
   $urls->path('about/authors/', 'authors_settings.php');
   $urls->path('about/contributors/', $contributors);
   $urls->path('posts/', 'templates/posts.php', true);
   $urls->path('posts/<post>/', 'templates/posts.php', true);
   $urls->path('home/', 'templates/home.php', true, false);
   $urls->redirect('post1/', Urls::$base.'posts/1');
   $urls->redirect('URLS/', 'https://github.com/urls-framework/URLS', false, 302);
   $urls->path('vars/', 'templates/vars.php', true, true, "This is a variable from the path");
   
   $urls->exe();
   
   ?>
   ```
2. Next, set `Urls::$base` to the project directory you will be deploying to. If you used the public root as your base directory in development and you are deploying to the root directory on your server, then you do not need to change this.
3. In `.htaccess`, change the `RewriteBase` to your new directory. Then change the path before "settings.php" in `RewriteRule . /urlsblog/settings.php [L]` and `RewriteRule ^$ /urlsblog/settings.php [L]` to your new directory. For example, if your development `.htaccess` is:
   ```ApacheConf
   # --URLS BEGIN--
   # The following lines between "--URLS BEGIN--" and "--URLS END--" are
   # automatically generated by the URLS framework. These lines should
   # not be edited as it may result in unwanted behavior of the site. Any
   # edits made may be overwritten automatically.
   Options +FollowSymLinks
   RewriteEngine On
   RewriteBase /urlsblog/
   RewriteRule ^settings\.php$ - [L]
   # --URLS ADD_COND BEGIN--
   # --URLS ADD_COND END--
   RewriteCond %{REQUEST_FILENAME} !-d [OR]
   RewriteCond %{REQUEST_FILENAME} !-f [OR]
   RewriteCond %{REQUEST_FILENAME} \.php$
   RewriteRule . /urlsblog/settings.php [L]
   RewriteRule ^$ /urlsblog/settings.php [L]
   # --URLS END--
   ```
   then your production `.htaccess` would be:
   ```ApacheConf
   # --URLS BEGIN--
   # The following lines between "--URLS BEGIN--" and "--URLS END--" are
   # automatically generated by the URLS framework. These lines should
   # not be edited as it may result in unwanted behavior of the site. Any
   # edits made may be overwritten automatically.
   Options +FollowSymLinks
   RewriteEngine On
   RewriteBase /
   RewriteRule ^settings\.php$ - [L]
   # --URLS ADD_COND BEGIN--
   # --URLS ADD_COND END--
   RewriteCond %{REQUEST_FILENAME} !-d [OR]
   RewriteCond %{REQUEST_FILENAME} !-f [OR]
   RewriteCond %{REQUEST_FILENAME} \.php$
   RewriteRule . /settings.php [L]
   RewriteRule ^$ /settings.php [L]
   # --URLS END--
   ```
   if your development directory was `/urlsblog/` and your production directory was the public root. Again, if you used the public root as your base directory in development and you are deploying to the root directory on your server, then you do not need to change this.
4. Finally, upload your project files to your server. Since each host is different, I cannot show you how to do it. Contact your host to find out how to upload files.
___
[Previous: Passing Variables](vars.md)  
[Next: Conclusion](conclusion.md)