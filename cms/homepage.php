<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$banner_info = get_banner_info("home");
	$title = $banner_info["title"];
	$caption = $banner_info["caption"];

	$homepage_info = get_homepage_info();
    $show_popular = mysqli_fetch_assoc($homepage_info)["show"];
    $show_categories = mysqli_fetch_assoc($homepage_info)["show"];
	$show_latest = mysqli_fetch_assoc($homepage_info)["show"];

	$categories = get_categories();
	
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
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">
</head>

<body>
	<?php $nav_current = "homepage"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
		<form>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Homepage Background</label> <input type="file" id="bhp_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bhp_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="">Default</button>
				</span>

				<label>Banner Homepage Title</label> <input type="text" value="<?php echo($title) ?>">
				
				<label>Banner Homepage Caption</label> <input type="text" value="<?php echo($caption) ?>">
			</div>

			<div class="section">
				<h2>Branding</h2>
				<label>Logo Image</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Use the default image">Default</button>
				<br>
				<label>Favicon Image</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Use the default image">Default</button>
			</div>
			
			<div class="section">
				<h2>Section</h2>
				<label>Show Popular</label> <input type="checkbox" <?php $show_popular?print('checked'):print('') ?>>
				<label>Show Categories</label> <input type="checkbox" <?php $show_categories?print('checked'):print('') ?>>
				<label>Show Latest</label> <input type="checkbox" <?php $show_latest?print('checked'):print('') ?>>
			</div>
			
			<div class="section">
				<h2>Categories</h2>
				<?php 
					while ($category = mysqli_fetch_assoc($categories)) {
						$entry = '<label>' . $category['name'] . '</label> <input type="checkbox" ';
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

</body>

</html>