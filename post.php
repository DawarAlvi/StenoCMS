<?php
    if(!isset($_GET['q'])) {
        header("Location: index");
        die();
    }
?>
<?php require_once("includes/db_connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
    $post_id = sanitize_input($_GET['q']);
    $post = get_post_by_id($post_id);

    if(is_null($post)) {
        header("Location: index");
        die();
    }

    $post_title = $post['title'];

    $banner_info = get_banner_info("home");
    $title = $banner_info["title"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo($title) ?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/light.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/post.php?q=<?php print($post_id) ?>" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>

	<div class="wrapper">
		<div class="img-main"></div>
		<h1 class="title"><?php echo($post_title) ?></h1>
		<p class="author-name">John Doe</p>
		
		
		<p class="date">5 Aug 2019</p>
		
		<h2 class="heading">An Introduction to Contrast</h2>
		<p class="content">Obvious examples of contrast are black and white, big and small, fast and slow, thick and thin. Opposites are the easiest way to grasp what contrast is, but when applying contrast to design work it’s never quite as black and white. If you were wondering, that’s where the saying about a situation being “black and white” comes from, which also leads to the saying of something being a “gray area”. In design we are often comparing things which are different but not opposite, for example an H1 and an h1, or an “add to cart” button and a “check out” button. This is where greater levels of contrast come into play.</p>
		
	</div>

    <?php require_once("includes/footer.php"); ?>

</body>

</html>
