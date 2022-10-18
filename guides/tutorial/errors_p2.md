# HTTP Errors (part 2)
As mentioned in the [previous section](errors_p1.md), URLS allows you to trigger HTTP errors. In this section we will look at how to customize them.
## Custom Error Pages
1. Create a new folder in the base folder called `errors` then create a new file in errors called `404.php` and fill it with:
   ```PHP
   <?php
   $pageTitle = 'Error 404';
   include './includes/header.inc.php';
   ?>
   
   <h1>Error</h1>
   <p>Page not found.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
   The file structure should now look like:
   ```
   └── (base directory)/
       ├── errors/
       │   └── 404.php
       ├── includes/
       │   ├── footer.inc.php
       │   └── header.inc.php
       ├── static/
       │   └── style.css
       ├── templates/
       │   ├── about.php
       │   ├── Another-Friend.php
       │   ├── authors.php
       │   ├── contributors.php
       │   ├── home.php
       │   ├── Me.php
       │   ├── My-Friend.php
       │   └── posts.php
       ├── urls/
       │   ├── LICENSE
       │   ├── update.php
       │   └── Urls.php
       ├── .htaccess
       ├── author_settings.php
       └── settings.php
   ```
2. Go to `settings.php` and under `Urls::$base` put `Urls::$defaultErrors[404] = "errors/404.php";`:
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
   
   $contributors = new Urls;
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
   The variable `Urls::$defaultErrors` is an array containing the path to all the error documents for all the HTTP errors.
3. If you try to go to any page that does not exist like [localhost/posts/5](http://localhost/posts/5), you will get:
   <picture>
       <img alt="Output" src="assets/404.png">
   </picture>

## Instance Errors
The static variable `Urls::$defaultErrors` works for the entire project, but what if you want to set a different error page for a specific instance of `Urls`? You can to that with the `$error` member variable.
1. Create a new file in errors called `contributors_404.php` and fill it with:
   ```PHP
   <?php
   $pageTitle = 'Error 404';
   include './includes/header.inc.php';
   ?>
   
   <h1>Error</h1>
   <p>Contributor not found.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
2. In `settings.php` after `$contributors = new Urls;` put `$contributors->errors[404] = "errors/contributors_404.php";`. The file should now look like:
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
   Like `Urls::$defaultErrors`, `$errors` is an array containing the path to all the error documents for all the HTTP errors. The only difference is that `$errors` is only for the current instance of `Urls` instead of the entire project.
3. If you try to go to any contributor that does not exist like [localhost/about/contributors/Someone](http://localhost/about/contributors/Someone), you will get:
   <picture>
       <img alt="Output" src="assets/contributors_404.png">
   </picture>
___
[Previous: HTTP Errors (part 1)](errors_p1.md)  
[Next: HTTP Errors (part 3)](errors_p3.md)
