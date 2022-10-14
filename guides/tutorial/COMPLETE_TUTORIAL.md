# Complete Tutorial
This guide will walk you through a complete implementaion of URLS. You will be making a very basic blog. Since this the goal of the tutorial is to demonstrate how URLS works, some features (such as a database) will not be included. Nevertheless, you should still get a good understanding of the framework.

## Prerequisites
* You should be familiar with the PHP.
* Some knowledge of HTML, CSS, and JavaScript.
* Some knowledge of Bootstrap.
* Some knowledge of how the `.htaccess` file works.

## Setup
1. Open the `settings.php` file. It should look something like this:
   ```PHP
   <?php
   /*
   URLS framework url config file.

   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/';

   $urls = new Urls;


   $urls->exe();

   ?>
   ```
2. Under `$urls = new Urls;` add `$urls->path('/', Urls::echo('Hello, World!'), true);`. Now it should look like this\:
   ```PHP
   <?php
   /*
   URLS framework url config file.

   Add your paths here:
   ex. $urls->path('blog/', 'blog-home.php', true);
   */
   include 'urls/Urls.php';
   Urls::$base = '/';

   $urls = new Urls;
   $urls->path('/', Urls::echo('Hello, World!'), true);

   $urls->exe();

   ?>
   ```
3. Now open [localhost](http://localhost/). This should be the result\:  
   <picture>
       <img alt="Output" src="/examples/static/hello_world_tutorial.png">
   </picture>
___
[Next: Project Setup](setup.md)
