<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | CMS</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/custom/cms/base.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">
</head>

<body>
    <?php require_once("../includes/functions.php"); ?>
	<?php $nav_current = "categories"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Categories Background</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">default</button>
				
				<label>Banner Categories Title</label> <input type="text">
				
				<label>Banner Categories Caption</label> <input type="text">
			</div>
			
			<div class="section">
				<h2>Categories <button class="btn btn-confirm" title="Add New Category">Add</button></h2>
				
				<label>Technology</label>
				<button class="btn btn-confirm" onclick="" title="Edit Category">Edit</button>
				<button class="btn btn-cancel" onclick="" title="Delete Category">Delete</button>
				
				<label>Wallpapers</label>
				<button class="btn btn-confirm" onclick="" title="Edit Category">Edit</button>
				<button class="btn btn-cancel" onclick="" title="Delete Category">Delete</button>
				
				<label>Laptops</label>
				<button class="btn btn-confirm" onclick="" title="Edit Category">Edit</button>
				<button class="btn btn-cancel" onclick="" title="Delete Category">Delete</button>
				
				<label>Nature</label>
				<button class="btn btn-confirm" onclick="" title="Edit Category">Edit</button>
				<button class="btn btn-cancel" onclick="" title="Delete Category">Delete</button>

			</div>
			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard Changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save Changes">
			</div>
			
			
		</form>
    </div>

</body>

</html>