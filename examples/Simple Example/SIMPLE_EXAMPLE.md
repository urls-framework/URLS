# Examples - Simple Example
1. Install the URLS framework (see [this guide](https://github.com/urls-framework/URLS/blob/main/guides/INSTALL.md)).
2. Create a new file named `blog-home.php` and fill it with:
   ```HTML
   <!DOCTYPE html>
   <html>
   <head>
      <meta charset="utf-8">
      <title>My Blog - Home</title>
   </head>
   <body>
   <h1>This is my Blog</h1>
   <p>Welcome!</p>
   </body>
   </html>
   ```
3. Open the file you chose as your settings in your editor. It should look something like this:
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
4. Add `$urls->path('blog/', 'blog-home.php');` to your settings file under `include 'urls/Urls.php';`. Here is the file now:
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
   $urls->path('blog/', 'blog-home.php', true);
   
   $urls->exe();
   
   ?>
   ```
5. If you did not specify a base url, go to `http://yourdomain.com/blog/`. If you did specify a base url, go to `http://yourdomain.com/<your base url>/blog/`. You should see the contents of the the `blog-home.php` file.
![Output](https://github.com/urls-framework/URLS/blob/main/examples/Simple%20Example/example1.png?raw=true)

For more examples see [GUIDES](https://github.com/urls-framework/URLS/blob/main/GUIDES.md).  
The source code for this example is at [https://github.com/urls-framework/URLS/tree/main/examples/Simple%20Example/src](https://github.com/urls-framework/URLS/tree/main/examples/Simple%20Example/src).
