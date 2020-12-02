<?php
	require_once("../includes/session.php");
	auth_user("admin", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$categories = get_categories();
	$nav_info 	= get_main_pages_nav_info();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | CMS</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/light.min.css" type="text/css">
	
    <link rel="stylesheet" href="../css/custom/cms/base.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("../img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="../img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="../img/branding/default_favicon.png">'); ?>
</head>

<body>
	<?php $nav_current = "navbar"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
		<?php echo validation_errors();?>
		<?php echo messages();?>
        <form method="post" action="../action/cms/navbar_submit.php">
			<div class="section">
				<h2>Main pages to show on navbar</h2>
				<label>HOME</label> 		<input type="checkbox" name="home" 			<?php echo(mysqli_fetch_assoc($nav_info)['show_on_nav'] ? 'checked' : '') ?>>
				<label>CATEGORIES</label> 	<input type="checkbox" name="categories" 	<?php echo(mysqli_fetch_assoc($nav_info)['show_on_nav'] ? 'checked' : '') ?>>
				<label>ABOUT</label> 		<input type="checkbox" name="about" 		<?php echo(mysqli_fetch_assoc($nav_info)['show_on_nav'] ? 'checked' : '') ?>>
				<label>CONTACT</label> 		<input type="checkbox" name="contact" 		<?php echo(mysqli_fetch_assoc($nav_info)['show_on_nav'] ? 'checked' : '') ?>>
			</div>			
			
			<div class="section">
				<h2>Categories to show on navbar</h2>
				<?php 
					while ($category = mysqli_fetch_assoc($categories)) {
						$entry = '<label>' . ucwords($category['name']) . '</label> <input type="checkbox" name="show_category_';
						$entry .= $category['id'] . '" ';
						$entry .= $category['show_on_navbar'] ? 'checked' : '';
						$entry .= ' >';
						echo($entry);
					}
				?>
			</div>
			
			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
		</form>
	</div>
	
</body>
</html>