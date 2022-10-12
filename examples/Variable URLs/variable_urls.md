# Examples - Variable URLs Example
Variables URLs are similar to query strings except the query part is part of the url.
**Note:** This example assumes that you already have URLS installed.
1. Create a new file named `posts.php` and fill it with:
   ```PHP
   <?php
   $posts = array(
       array('title'=>'Post One', 'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in scelerisque nibh, et mattis nunc. Aliquam cursus placerat ex in varius. Phasellus urna elit, aliquam nec nulla ac, fringilla blandit justo. Nulla facilisi. Pellentesque non orci non urna venenatis egestas. Quisque gravida mi sed dui fermentum, eu tincidunt elit cursus. Sed lobortis ut turpis quis pretium. Phasellus accumsan tempus commodo. Proin nisi justo, mollis in faucibus ut, mattis a dolor. Ut congue mi tortor, nec pharetra tellus pretium non. Maecenas finibus, sapien in eleifend efficitur, risus magna volutpat sem, nec iaculis risus enim non tellus. Fusce lacinia odio a nibh molestie tincidunt. Aenean nec dui leo.'),
       array('title'=>'Post Two', 'content'=>'Nam mattis lacus id sem vulputate, vel congue nulla consectetur. Sed euismod justo eu urna molestie efficitur. Suspendisse egestas mattis feugiat. Fusce viverra varius sem. Fusce sed sollicitudin ipsum. Sed pulvinar vulputate eros, eget lobortis mi lacinia eget. Nunc egestas id velit id pellentesque. Nam aliquam vestibulum nunc at varius. Donec mauris nisl, pretium ac tempus eget, pulvinar non elit.'),
       array('title'=>'Post Three', 'content'=>'Praesent gravida suscipit hendrerit. Donec in purus hendrerit, mattis quam vel, fermentum odio. Nulla non elit molestie, tincidunt odio at, lacinia magna. Donec id elementum elit. Morbi consectetur urna arcu, dignissim dictum velit vulputate vitae. Integer sed varius lorem, a vestibulum felis. Ut tempor tortor vitae lorem posuere volutpat. Morbi consectetur neque viverra est laoreet, et faucibus turpis sagittis. In sit amet est quis enim euismod euismod. Integer sed nisi malesuada, iaculis ante vel, tempus nisl. Nulla ex risus, facilisis et ullamcorper eget, accumsan at erat. Ut vitae mollis augue, nec bibendum libero. Integer non leo eget risus euismod ornare vitae nec purus. Nam tincidunt aliquet elit.')
   );
   if (!isset($posts[Urls::$access['pid']-1])) {
   	Urls::$self->error_404();
   }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
       <meta charset="utf-8">
       <title>My Blog - <?php echo $posts[Urls::$access['pid']-1]['title']; ?></title>
       <style>
		   body {
			   background-color: #ccc;
		   }
	   </style>
   </head>
   <body>
       <h1><?php echo $posts[Urls::$access['pid']-1]['title']; ?></h1>
       <p><?php echo $posts[Urls::$access['pid']-1]['content']; ?></p>
   </body>
   </html>
   ```
2. Add `$urls->path('blog/<pid>/', 'posts.php', true);` to your settings file under `include 'urls/Urls.php';`. Here is the file now:
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
   $urls->path('blog/<pid>/', 'posts.php', true);
   
   $urls->exe();
   
   ?>
   ```
5. If you did not specify a base url, go to `http://yourdomain.com/blog/1/`. If you did specify a base url, go to `http://yourdomain.com/<your base url>/blog/1/`. You should see the contents of the the `posts.php` file with the post title and content of the specified post filled in.
![Output](https://github.com/urls-framework/URLS/blob/main/examples/Variable%20URLs/example2.png?raw=true)

## Explaination
```PHP
<?php
   $posts = array(
       array('title'=>'Post One', 'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in scelerisque nibh, et mattis nunc. Aliquam cursus placerat ex in varius. Phasellus urna elit, aliquam nec nulla ac, fringilla blandit justo. Nulla facilisi. Pellentesque non orci non urna venenatis egestas. Quisque gravida mi sed dui fermentum, eu tincidunt elit cursus. Sed lobortis ut turpis quis pretium. Phasellus accumsan tempus commodo. Proin nisi justo, mollis in faucibus ut, mattis a dolor. Ut congue mi tortor, nec pharetra tellus pretium non. Maecenas finibus, sapien in eleifend efficitur, risus magna volutpat sem, nec iaculis risus enim non tellus. Fusce lacinia odio a nibh molestie tincidunt. Aenean nec dui leo.'),
       array('title'=>'Post Two', 'content'=>'Nam mattis lacus id sem vulputate, vel congue nulla consectetur. Sed euismod justo eu urna molestie efficitur. Suspendisse egestas mattis feugiat. Fusce viverra varius sem. Fusce sed sollicitudin ipsum. Sed pulvinar vulputate eros, eget lobortis mi lacinia eget. Nunc egestas id velit id pellentesque. Nam aliquam vestibulum nunc at varius. Donec mauris nisl, pretium ac tempus eget, pulvinar non elit.'),
       array('title'=>'Post Three', 'content'=>'Praesent gravida suscipit hendrerit. Donec in purus hendrerit, mattis quam vel, fermentum odio. Nulla non elit molestie, tincidunt odio at, lacinia magna. Donec id elementum elit. Morbi consectetur urna arcu, dignissim dictum velit vulputate vitae. Integer sed varius lorem, a vestibulum felis. Ut tempor tortor vitae lorem posuere volutpat. Morbi consectetur neque viverra est laoreet, et faucibus turpis sagittis. In sit amet est quis enim euismod euismod. Integer sed nisi malesuada, iaculis ante vel, tempus nisl. Nulla ex risus, facilisis et ullamcorper eget, accumsan at erat. Ut vitae mollis augue, nec bibendum libero. Integer non leo eget risus euismod ornare vitae nec purus. Nam tincidunt aliquet elit.')
);
if (!isset($posts[Urls::$access['pid']-1])) {
	Urls::$self->error_404();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Blog - <?php echo $posts[Urls::$access['pid']-1]['title']; ?></title>
    <style>
	   body {
		   background-color: #ccc;
	   }
   </style>
</head>
<body>
    <h1><?php echo $posts[Urls::$access['pid']-1]['title']; ?></h1>
    <p><?php echo $posts[Urls::$access['pid']-1]['content']; ?></p>
</body>
</html>
```
You should already know PHP so I am not going to go into too much detail about this file, but basically, what it does is create an array of posts, if the post id requested does not match any post, call a 404 error, and finally, print out the title and content of the post requested.
___
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
$urls->path('blog/<pid>/', 'posts.php', true);

$urls->exe();

?>
```
You should recognize this file. The main difference from paths with regular urls is the `<pid>` section in `$urls->path('blog/<pid>/', 'posts.php', true);`. The `<>` means that this is a variable and the string inside of it is the key to the `Urls::$access` element you want to place the request in.
### The `Urls::$access` Variable
The access variable is similar to the `$_POST` and `$_GET` variables. It is an array that holds all variables from a variable url.

For more examples see [GUIDES](https://github.com/urls-framework/URLS/blob/main/GUIDES.md).  
The source code for this example is at [https://github.com/urls-framework/URLS/tree/main/examples/Variable%20URLs/src](https://github.com/urls-framework/URLS/tree/main/examples/Variable%20URLs/src).
