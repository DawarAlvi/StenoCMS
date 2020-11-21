<?php
	require_once("../includes/session.php");
	auth_user("admin", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info 	 = get_banner_info("home");
	$title 			 = $banner_info["title"];
	$caption 		 = $banner_info["caption"];

	$homepage_info 	 = get_homepage_info();
    $show_popular 	 = mysqli_fetch_assoc($homepage_info)["show"];
    $show_categories = mysqli_fetch_assoc($homepage_info)["show"];
	$show_latest 	 = mysqli_fetch_assoc($homepage_info)["show"];

	$categories 	 = get_categories();
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
	<?php
		$nav_current = "homepage";
		require_once("../includes/cms/nav.php");
	?>

    <div class="main">
		<?php echo validation_errors();?>
		<?php echo messages();?>

		<form method="post" action="../action/cms/homepage_submit.php" enctype="multipart/form-data">
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Homepage Background</label> <input type="file" name="banner_homepage_bg" id="bhp_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bhp_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('bannerhomepage')">Default</button>
				</span>

				<label>Banner Homepage Title</label> <input type="text" name="banner_homepage_title" value="<?php echo($title) ?>">
				
				<label>Banner Homepage Caption</label> <input type="text" name="banner_homepage_caption" value="<?php echo($caption) ?>">
			</div>

			<div class="section">
				<h2>Branding</h2>
				<label>Logo Image</label> <input type="file" name="logo_image" id="bli">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bli').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('logo')">Default</button>
				</span>

				<br>

				<label>Favicon Image</label> <input type="file" name="favicon_image" id="bfi">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bfi').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('favicon')">Default</button>
				</span>
			</div>
			
			<div class="section">
				<h2>Sections to show on homepage</h2>
				<label>Show Popular</label> <input type="checkbox" name="show_popular" <?php $show_popular?print('checked'):print('') ?>>
				<label>Show Categories</label> <input type="checkbox" name="show_categories" <?php $show_categories?print('checked'):print('') ?>>
				<label>Show Latest</label> <input type="checkbox" name="show_latest" <?php $show_latest?print('checked'):print('') ?>>
			</div>
			
			<div class="section">
				<h2>Categories to show on homepage</h2>
				<?php 
					while ($category = mysqli_fetch_assoc($categories)) {
						$entry = '<label>' . ucwords($category['name']) . '</label> <input type="checkbox" name="show_category_';
						$entry .= $category['id'] . '" ';
						$entry .= $category['show_on_homepage'] ? 'checked' : '';
						$entry .= ' >';
						echo($entry);
					}
				?>
			</div>
			
			<div class="section-last">
				<button type="reset" class="btn btn-cancel" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
			
			
		</form>
	
    </div>

	<script src="../js/custom.js"></script>

</body>

</html>