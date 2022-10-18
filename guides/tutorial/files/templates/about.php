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