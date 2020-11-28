<?php
	require_once("../includes/session.php");
	auth_user("admin", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info 	 = get_banner_info("contact");
	$title 			 = $banner_info["title"];
	$caption 		 = $banner_info["caption"];
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
    <?php file_exists('../img/branding/custom_favicon.jpg')?print('<link rel="icon" type="image/x-icon" href="../img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="../img/branding/default_favicon.png">'); ?>
</head>

<body>
	<?php $nav_current = 'contact'; ?>
    <?php require_once('../includes/cms/nav.php'); ?>

    <div class="main">
		<?php echo validation_errors();?>
		<?php echo messages();?>
        <form method="post" action="../action/cms/contact_submit.php" enctype="multipart/form-data">
			<div class="section">
				<h2>Banner</h2>
				<label for="bc_bg">Banner Contact Background</label> <input type="file" name="banner_contact_bg" id="bc_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bc_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('bannercontact')">Default</button>
				</span>
				
				<label>Banner Contact Title</label> <input type="text" name="banner_contact_title" value="<?php echo($title) ?>">
				
				<label>Banner Contact Caption</label> <input type="text" name="banner_contact_caption" value="<?php echo($caption) ?>">
			</div>
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
		</form>
			
			<div class="section">
				<h2>Messages</h2>
				<?php
				
				?>
				<label>Dawar Alvi</label> 8 Aug 2020 
				<button type="button" class="btn btn-confirm" id="view_message" onclick="showModal();" title="Edit Category">View</button>
			</div>
	</div>
	<!-- Main End -->

	<script src="../js/custom.js"></script>
</body>
</html>