# Redirects
Redirects are very similar to paths. The main difference is instead of displaying a page, it redirects the user to the defined URL.
1. Add `$urls->redirect('post1/', Urls::$base.'posts/1');` to `$urls` in `settings.php`. The file should now look like:
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
   $urls->redirect('post1/', Urls::$base.'posts/1');
   
   $urls->exe();
   
   ?>
   ```
2. If you go to [localhost/post1](http://locahlost/post1), you will get redirected to [localhost/posts/1](http://locahlost/posts/1).

## More Redirects
Redirects aren't just limited to project paths. You can redirect to any URL. Just like with paths, there is an option to make it not case sensitive. You can also set the type of redirect (301, 302, 307) with URLS.
1. Add `$urls->redirect('URLS/', 'https://github.com/urls-framework/URLS', false, 302);` to `$urls` in `settings.php`. The file should now look like:
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
   $urls->redirect('post1/', Urls::$base.'posts/1');
   $urls->redirect('URLS/', 'https://github.com/urls-framework/URLS', false, 302);
   
   $urls->exe();
   
   ?>
   ```
2. If you go to a URL like [localhost/UrLs](http://locahlost/UrLs), you will get redirected to [github.com/urls-framework/URLS](https://github.com/urls-framework/URLS).
___
[Previous: Case Sensitivity](cs.md)  
[Next: Passing Variables](vars.md)
