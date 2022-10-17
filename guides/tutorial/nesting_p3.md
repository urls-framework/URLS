# Nesting Pages (part 3)
## Object Nesting
This is the final type of nesting URLS supports.
1. Create a two new files in templates called `Another-Friend.php` and `contributors.php`
2. Fill `Another-Friend.php` with:
   ```PHP
   <?php
   $pageTitle = 'About Another Friend';
   include './includes/header.inc.php';
   ?>
   
   <h1>Another Friend</h1>
   <p>This is information about another friend.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
3. Fill `contributors.php` with:
   ```PHP
   <?php
   $pageTitle = 'Contributors';
   include './includes/header.inc.php';
   ?>
   
   <h1><a href="<?php echo Urls::$base; ?>about/contributors/Me">Me</a></h1>
   <p>This is information about me.</p>
   
   <h1><a href="<?php echo Urls::$base; ?>about/contributors/My-Friend">My Friend</a></h1>
   <p>This is information about my friend.</p>
   
   <h1><a href="<?php echo Urls::$base; ?>about/contributors/Another-Friend">Another Friend</a></h1>
   <p>This is information about another friend.</p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
4. Next, add the following to `about.php` under the about authors link:
   ```HTML
   <h1>Contributors</h1>
   <p><a href="<?php echo Urls::$base; ?>about/contributors">Learn more about the contributors!<a></p>
   ```
   The final code should look like:
   ```PHP
   <?php
   $pageTitle = 'About';
   include './includes/header.inc.php';
   ?>
   
   <h1>My Blog</h1>
   <p>This is information about my blog!</p>
   <h1>Authors</h1>
   <p><a href="<?php echo Urls::$base; ?>about/authors">Learn more about the authors!<a></p>
   <h1>Contributors</h1>
   <p><a href="<?php echo Urls::$base; ?>about/contributors">Learn more about the contributors!<a></p>
   
   <?php include './includes/footer.inc.php'; ?>
   ```
5. Now it's time to create a new object. Add the following code before the `$urls` declaration in `settings.php`:
   ```PHP
   $contributors = new Urls;
   $contributors->path('/', 'templates/contributors.php', true);
   $contributors->path('Me', 'templates/Me.php', true);
   $contributors->path('My-Friend', 'templates/My-Friend.php', true);
   $contributors->path('Another-Friend', 'templates/Another-Friend.php', true);
   ```
   The final file should now look like:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/urlsblog/';
   
   $contributors = new Urls;
   $contributors->path('/', 'templates/contributors.php', true);
   $contributors->path('Me', 'templates/Me.php', true);
   $contributors->path('My-Friend', 'templates/My-Friend.php', true);
   $contributors->path('Another-Friend', 'templates/Another-Friend.php', true);
   
   $urls = new Urls;
   $urls->path('/', 'templates/home.php', true);
   $urls->path('about/', 'templates/about.php', true);
   $urls->path('about/authors/', 'authors_settings.php');
   
   $urls->exe();
   
   ?>
   ```
6. Finaly, add `$urls->path('about/contributors/', $contributors);` to the `$urls` instance. The final code should look like:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/urlsblog/';
   
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
   
   $urls->exe();
   
   ?>
   ```
   Like in [Part 2](nesting_p2.md), there is no third argument in `$urls->path('about/contributors/', $contributors);`.
7.  You should now be able to go to [localhost/about/contributors](http://localhost/about/contributors), [localhost/about/contributors/Me](http://localhost/about/contributors/Me), [localhost/about/contributors/My-Friend](http://localhost/about/contributors/My-Friend), and [localhost/about/contributors/Another-Friend](http://localhost/about/contributors/Another-Friend) and be able to see the correct page.
___
[Previous: Nesting Pages (part 2)](nesting_p2.md)  
[Next: Variable Paths](variable.md)
