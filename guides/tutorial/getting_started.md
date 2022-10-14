# Getting Started
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
   
## Explanation
### The `settings.php` File
The `settings.php` file is the entry-point into the program. This is where you configure all the paths for your site and set other general site settings.

### The Include
The line `include 'urls/Urls.php';` includes the URLS library in your code. It allows you to use all the URLS functions.

### The Base
The line `Urls::$base = '/';` sets the base directory. for the whole site. In this case it is the public root. If you are not using the public root as your base, it may look different.

### The `$urls` Declaration
The line `$urls = new Urls;` declares a new instance of the Urls class. This instance also happens to be the main entry point into the program. It is comparable to the main function in Java or C++.

### The Path Function
The line `$urls->path('/', Urls::echo('Hello, World!'), true);` has four parts:
1. `$urls->path()`
   * This method sets a new path to look for.
   * This path will be added to the list of paths that URLS compares to the requested path.
2. `'/'`
   * This is the specific path to look for. If a user types this path into the address bar, the specified page will be displayed.
3. `Urls::echo('Hello, World!')`
   * This is the content to be displayed.
   * Normally, a string containing the location of a PHP file is included here, but if you use the `Urls::echo()` function the included text will be outputed directly.
4. `true`
   * This argument is used to tell if this is the last path to look for. URLS allows you to define multiple instances of the `Urls` class. Instead of including a file in the second argument, you can include an instance of `Urls` or even another file with another instance of `Urls`. This will be covered more later, but for now, just put `true`.

## The EXE Function
The line `$urls->exe();` lets URLS know that you are done setting paths and are ready to start comparing them with the requested path.
  
If everything looks good, then you are ready to move on.
___
[Previous: Complete Tutorial](COMPLETE_TUTORIAL.md)  
[Next: Getting Started](getting_started.md)
