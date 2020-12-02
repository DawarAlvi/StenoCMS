<?php
	require_once("../includes/session.php");
	auth_user("admin", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info = get_banner_info("about");
	$title 		 = $banner_info["title"];
	$caption 	 = $banner_info["caption"];

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
	
	<!-- SCRIPTS -->
	<script src="../js/ckeditor/ckeditor.js"></script>
</head>

<body>
	<?php $nav_current = "about"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form method="post">
			<div class="section">
				<h2>Banner</h2>
				<label>Banner About Background</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">Default</button>
				
				<label>Banner About Title</label> <input type="text" value="<?php echo($title) ?>">
				
				<label>Banner About Caption</label> <input type="text" value="<?php echo($caption) ?>">
			</div>
			
			<div class="section">
				<h2>Section Top</h2>				
				<label>Section Title</label> <input type="text">
				<label>Section Content</label> <textarea name="section-top-content">Default Text</textarea>
			</div>
			
			<div class="section">
				<h2>Section Feature</h2>	
				<label>Show This Section</label> <input type="checkbox">
				<label>Item 1</label> <input type="text">
				<label>Item 2</label> <input type="text">
				<label>Item 3</label> <input type="text">
				<label>Item 4</label> <input type="text">
			</div>
			
			<div class="section">
				<h2>Section Bottom</h2>
				<label>Show This Section</label> <input type="checkbox">				
				<label>Section Title</label> <input type="text">
				<label>Section Content</label> <textarea name="section-bottom-content">Default Text</textarea>
			</div>
			
			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
			
			
		</form>
    </div>


	<script>
		CKEDITOR.replace("section-top-content");
		CKEDITOR.replace("section-bottom-content");
	</script>
</body>

</html>