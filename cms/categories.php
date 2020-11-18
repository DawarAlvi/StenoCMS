<?php
	require_once("../includes/session.php");
	auth_user("author", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info = get_banner_info("categories");
	$title 		 = $banner_info["title"];
	$caption 	 = $banner_info["caption"];

	$categories  = get_categories();
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
	<?php
		$nav_current = "categories";
		require_once("../includes/cms/nav.php");
	?>

    <div class="main">
        <form>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Categories Background</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">Default</button>
				
				<label>Banner Categories Title</label> <input type="text" value="<?php echo($title) ?>">
				
				<label>Banner Categories Caption</label> <input type="text" value="<?php echo($caption) ?>">
			</div>
			
			<div class="section">
				<h2>Categories <button class="btn btn-confirm" title="Add new category"><span class="fal fa-plus"></span></button></h2>
				<?php 
					while ($category = mysqli_fetch_assoc($categories)) {
						$entry = '<span>' . ucwords($category['name']) . '</span>';
						$entry .= '<button type="button" class="btn btn-confirm" onclick="" title="Edit category">Edit</button>';
						$entry .= '<button type="button" class="btn" onclick="" title="Delete category"><span class="fal fa-times"></span></button>';

						echo($entry);
					}
				?>
			</div>
			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard Changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save Changes">
			</div>
		</form>
    </div>
</body>

</html>