![Output](https://github.com/urls-framework/URLS/blob/main/examples/static/logo.png?raw=true)
# URLS Framework - Take control of the address bar!

## Why do you need it?
It is nearly imposible to make URLs look nice in pure PHP. URLS is a micro framework that takes ugly URLs and allows you to rewrite it any way you want. That means you can turn this URL, `https://examplesite.com/blog/home.php?post=1` into, `https://examplesite.com/blog/post/1/` with no `.htaccess` at all!

## Features
* Automatic Updates - URLS automatically checks for updates everytime it is called so you never need to worry about updates! However, you will have to manualy install any major updates or updates that change how the ui works.
* Easy to Use - URLS UI is similar to the URL routing system of Django!
* Simple Setup - Just open the `urls_welcome.php` page in your browser and follow the simple instructions.
* Custom HTTP Error Pages

## Requirements
* Latest Version of PHP. Although URLS has only been tested on PHP 8, but it should still work on PHP 7 and possibly 5.
* Server running Apache with mod_rewrite. URLS uses `.htaccess` so it will not work on a Nginx server. However, we are working on a Nginx version.

## Installation
1. Open the `urls_welcome.php` file in your browser.
2. Fill out the required fields.
3. Start making your urls!  
  
For a more complete example, see [guides/INSTALL.md](https://github.com/urls-framework/URLS/blob/main/guides/INSTALL.md).

## Simple example
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
   ex. urls_path('blog/', 'blog-home.php');
   */
   include 'urls/urls.php';
   $BASE_URL = '/';
   
   
   urls_404();
   
   ?>
   ```
4. Add `path('blog/', 'blog-home.php');` to your settings file under `include 'urls/urls.php';`. Here is the file now:
   ```PHP
   <?php
   /*
   URLS framework url config file.
   
   Add your paths here:
   ex. urls_path('blog/', 'blog-home.php');
   */
   include 'urls/urls.php';
   $BASE_URL = '/';
   
   urls_path('blog/', 'blog-home.php');
   urls_404();
   
   ?>
   ```
5. If you did not specify a base url, go to `http://yourdomain.com/blog/`. If you did specify a base url, go to `http://yourdomain.com/<your base url>/blog/`. You should see the contents of the the `blog-home.php` file.
![Output](https://github.com/urls-framework/URLS/blob/main/examples/Simple%20Example/example1.png?raw=true)

For more examples see [GUIDES](https://github.com/urls-framework/URLS/blob/main/GUIDES.md)

## Wiki
The wiki for URLS can be found at [https://github.com/urls-framework/URLS/wiki](https://github.com/urls-framework/URLS/wiki)

## Documentation
The documentation for the URLS Framework can be found at the [DOCS.md](https://github.com/urls-framework/URLS/blob/main/DOCS.md) file.

## License
This software is distributed under the Apache 2.0 license. For more information, read the [LICENSE](https://github.com/urls-framework/urls/blob/main/LICENSE) file.

## Contributing
Currently, the URLS framework is a privately maintained project. If you find any bugs or have any suggestions, please submit them to the [issue tracker](https://github.com/urls-framework/URLS/issues). If you would like to edit the wiki, feel free to. However, we do ask that you follow our guidelines on how to post. See the [Contributing](https://github.com/urls-framework/URLS/wiki/Contributing) page in the wiki for more information

## Issues
If you find any bugs, please report them to the [issue tracker](https://github.com/urls-framework/URLS/issues). If you find a major security vulnerability, please **DO NOT** use the issue tracker to report them. See the [SECURITY](https://github.com/urls-framework/URLS/blob/main/SECURITY.md) file for more information.
