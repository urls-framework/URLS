# Complete Tutorial
This guide will walk you through a complete implementaion of URLS. You will be making a very basic blog. Since this the goal of the tutorial is to demonstrate how URLS works, some features (such as a database) will not be included. Nevertheless, you should still get a good understanding of the framework.

## Prerequisites
* You should be familiar with the PHP.
* Some knowledge of HTML, CSS, and JavaScript.
* Some knowledge of Bootstrap.
* Some knowledge of how the `.htaccess` file works.

## Contents
1. [Project Setup](setup.md)
2. [Getting Started with URLS](getting_started.md)
3. [Templates](templates.md)
4. [Static Files](static_files.md)
5. [More Pages](pages.md)
6. [Nesting Pages (part 1)](nesting_p1.md)
7. [Nesting Pages (part 2)](nesting_p2.md)
8. [Nesting Pages (part 3)](nesting_p3.md)
9. [Variable Paths](variable.md)
10. [HTTP Errors (part 1)](errors_p1.md)
11. [HTTP Errors (part 2)](errors_p2.md)
12. [HTTP Errors (part 3)](errors_p3.md)
13. [Case Sensitivity](cs.md)
14. [Redirects](redirects.md)
15. [Passing Variables](vars.md)
16. [Deploying](deploy.md)
17. [Conclusion](conclusion.md)

## Project Structure
```
└── (base directory)/
    ├── errors/
    │   ├── 404.php
    │   ├── 500.php
    │   └── contributors_500.php
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
    │   ├── errors.php
    │   ├── home.php
    │   ├── Me.php
    │   ├── My-Friend.php
    │   ├── posts.php
    │   └── vars.php
    ├── urls/
    │   ├── LICENSE
    │   ├── update.php
    │   └── Urls.php
    ├── .htaccess
    ├── author_settings.php
    └── settings.php
```
___
[Next: Project Setup](setup.md)
