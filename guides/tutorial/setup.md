# Project Setup
## Installing
While this guide will work on most servers that support PHP, it is recommended that you use a [localhost](https://en.wikipedia.org/wiki/Localhost) like [XAMPP](https://www.apachefriends.org/). This tutorial will assume you are using a localhost. Because of this, some security settings, mainly in the setup, may be different for a live server. If you are not using a localhost, just change any link opening up the project from `localhost/` to `(your domain)/`.
1. Download and open the `urls_install.php` file in your browser.
2. Enter a base url. The base url is the path from your servers public directory (usally `public_html` or `htdocs`) to where you want the framework to be installed. It should begin and end in a `/`. If the base directory is the root of the public directory, then enter one `/`. For example, if your public directory is `htdocs` and you want to install the framework at `/htdocs/blog/` then you should enter in `/htdocs/blog/`, but if you want to install it in `htdocs`, then you should just enter `/`. This tutorial will assume that you are using the public root as your base directory. If you are not using the base directory, just change any link opening up the project from `localhost/` to `localhost/(base directory)`.
3. Enter the name of the settings file you want to use. This tutorial will refer to the settings file as `settings.php` This file will be auto generated in the directory that you installed the framework in. Do not enter in any path information. Just enter the name of the file. If the file does not exist, then it will be created. **BEWARE: IF THE FILE SELECTED ALREADY EXISTS, IT WILL BE OVERWRITTEN!!!**
4. If you are installing on a live server, it is suggested that you check the checkbox asking if you would like to delete this file after installation and the checkbox asking if you would like to delete the installation files after installation. If you are still in development, you may want to keep this file in case you want a fresh reinstall. **BEWARE: IF YOU KEEP THIS FILE ON A LIVE SERVER ANYONE CAN REINSTALL AND/OR BREAK YOU SITE!!!**
5. At this point, your file structure should look like this:
```
└── (base directory)/
    ├── /urls/
    │   ├── LICENSE
    │   ├── update.php
    │   └── Urls.php
    ├── .htaccess
    └── settings.php
```

## Layout
In the base directory, create three folders, `templates`, `static`, and `includes`. The file structure should now look like this:
```
└── (base directory)/
    ├── includes/
    ├── static/
    ├── templates/
    ├── urls/
    │   ├── LICENSE
    │   ├── update.php
    │   └── Urls.php
    ├── .htaccess
    └── settings.php
```
Now we are finally ready to start building the blog!
___
[Previous: Complete Tutorial](COMPLETE_TUTORIAL.md)  
[Next: Getting Started](getting_started.md)
