# Nesting Pages (part 2)
Now lets add a few more pages.
# Multi-Page Nesting
This is a harder way to nest, however it can help you organize your files better.
1. In the `templates` folder, create two new files, `Me.php` and `My-Friend.php`.
2. Fill `Me.php` with:
   ```PHP
   <?php
   $pageTitle = 'About Me';
   include './includes/header.inc.php';
   ?>
   
   <h1>Me</h1>
   <p>This is information about me.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
3. Fill `My-Friend.php` with:
   ```PHP
   <?php
   $pageTitle = 'About My Friend';
   include './includes/header.inc.php';
   ?>
   
   <h1>My Friend</h1>
   <p>This is information about my friend.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
4. Next, create another file called `authors_settings.php` in the project directory and fill it with:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   
   $authors = new Urls;
   $authors->path('/', 'templates/authors.php', true);
   $authors->path('Me', 'templates/Me.php', true);
   $authors->path('My-Friend', 'templates/My-Friend.php', true);
   
   $authors->exe();
   
   ?>
   ```
5. Finally, change `$urls->path('about/authors/', 'templates/authors.php', true);` path to `$urls->path('about/authors/', 'authors_settings.php');`:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/urlsblog/';
   
   $urls = new Urls;
   $urls->path('/', 'templates/home.php', true);
   $urls->path('about/', 'templates/about.php', true);
   $urls->path('about/authors/', 'authors_settings.php');
   
   $urls->exe();
   
   ?>
   ```
6. You should now be able to go to [localhost/about/authors](http://localhost/about/authors), [localhost/about/authors/Me](http://localhost/about/authors/Me), and [localhost/about/authors/My-Friend](http://localhost/about/authors/My-Friend) and be able to see the correct page.

## Explanation
Notice how `$urls->path('about/authors/', 'authors_settings.php');` does not have the third `true` argument at the end. This is because what's going on here is that first, the `$urls` object has determined that you are trying to access `'about/authors/'`. After that, it displays the file, `authors_settings.php` which has another instance of `Urls` named `$authors`. From there, `$authors` determines if you want to access [localhost/about/authors](http://localhost/about/authors), [localhost/about/authors/Me](http://localhost/about/authors/Me), or [localhost/about/authors/My-Friend](http://localhost/about/authors/My-Friend). What the `true` argument does it is tells URLS that there are no more comparisons happening in another `Urls` instance. Since we are letting another instance do more comparisons, we either put `false` as the third argument, or we just leave it blank (`false` is the default).
___
[Previous: Nesting Pages (part 1)](nesting_p1.md)  
[Next: Nesting Pages (part 3)](nesting_p3.md)
