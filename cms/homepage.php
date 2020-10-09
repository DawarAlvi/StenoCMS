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
    <?php require_once("../includes/functions.php"); ?>
	<?php $nav_current = "homepage"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
		<form>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Homepage Background</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">default</button>
				
				<label>Banner Homepage Title</label> <input type="text">
				
				<label>Banner Homepage Caption</label> <input type="text">
			</div>
			
			<div class="section">
				<h2>Branding</h2>
				<label>Logo Image</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">default</button>
				<br>
				<label>Favicon Image</label> <input type="file">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Deletes your uploaded image from the server">default</button>
			</div>
			
			<div class="section">
				<h2>Section</h2>
				<label>Show Popular</label> <input type="checkbox">
				<label>Show Categories</label> <input type="checkbox">
				<label>Show Latest</label> <input type="checkbox">
			</div>
			
			<div class="section">
				<h2>Categories</h2>
				<label>Tech</label> <input type="checkbox">
				<label>Art</label> <input type="checkbox">
				<label>Humour</label> <input type="checkbox">
			</div>
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
			
			
		</form>
	
    </div>

</body>

</html>