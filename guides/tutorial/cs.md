# Case Sensitivity
By default, URLS is case sensitive. However, there may be times where you don't want a path or even the project to be case sensitive. This section will cover how to make something not case sensitive.
## Project Level Case Sensitivity
Project level case sensitivity is the easiest to implement. Typically, you want to make the entire project case sensitive so we are going to keep it case sensitive.
1. Set `Urls::$cs = true` under `Urls::$defaultErrors` in `settings.php`. The file should now look like:
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
   
   $urls->exe();
   
   ?>
   ```
2. That's it! If you want to make the project not case sensitive, simpily set `Urls::$cs` to `false`.

## Path Level Case Sensitivity
Path level Case Sensitivity can be set on all paths and redirects (to be covered later). So far, we have only used three arguments in a path. The fourth argument is a boolean variable that sets the case sensitivity.
1. Add the path `$urls->path('home/', 'templates/home.php', true, false);` to `$urls` in `settings.php`. The file should now look like:
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
   
   $urls->exe();
   
   ?>
   ```
2. Now if you go to a URL like [localhost/HoMe](http://locahlost/HoMe) you should see the home page.
___
[Previous: HTTP Errors (part 3)](errors_p3.md)  
[Next: Redirects](redirects.md)
