<?php
	require_once("../includes/session.php");
	auth_user("admin", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info = get_banner_info("about");
	$title 		 = $banner_info["title"];
	$caption 	 = $banner_info["caption"];


	$about = mysqli_query($connection, "SELECT * FROM `about`");

    $section_1_title = mysqli_fetch_assoc($about)['value'];
    $section_1_content = mysqli_fetch_assoc($about)['value'];
    
    $show_section_feature = mysqli_fetch_assoc($about)['value'];

    $show_section_2 = mysqli_fetch_assoc($about)['value'];
    $section_2_title = mysqli_fetch_assoc($about)['value'];
    $section_2_content = mysqli_fetch_assoc($about)['value'];
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
		<?php echo validation_errors() ?>
		<?php echo messages() ?>
        <form method="post" action="../action/cms/about_submit.php" enctype="multipart/form-data">
			<div class="section">
				<h2>Banner</h2>
				<label>Banner About Background</label> <input type="file" name="banner_about_bg" id="bap_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bap_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('bannerabout')">Default</button>
				</span>
				
				<label>Banner About Title</label> <input type="text" name="banner_about_title" value="<?php echo($title) ?>">
				
				<label>Banner About Caption</label> <input type="text" name="banner_about_caption" value="<?php echo($caption) ?>">
			</div>
			
			<div class="section">
				<h2>Section Top</h2>				
				<label>Section Title</label> <input type="text" name="section_1_title" value="<?php echo($section_1_title); ?>">
				<label>Section Content</label> <textarea name="section_1_content"><?php echo($section_1_content); ?></textarea>
			</div>
			
			<div class="section">
				<h2>Section Feature</h2>	
				<label>Show This Section</label> <input type="checkbox" name="show_section_feature" <?php $show_section_feature==='1'?print('checked'):print('') ?>>
			</div>
			
			<div class="section">
				<h2>Section Bottom</h2>
				<label>Show This Section</label> <input type="checkbox" name="show_section_2" <?php $show_section_2==='1'?print('checked'):print('') ?>>				
				<label>Section Title</label> <input type="text" name="section_2_title" value="<?php echo($section_2_title); ?>">
				<label>Section Content</label> <textarea name="section_2_content"><?php echo($section_2_content); ?></textarea>
			</div>
			
			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
			
			
		</form>
    </div>

	<script src="../js/custom.js"></script>
	<script>
		CKEDITOR.replace("section_1_content");
		CKEDITOR.replace("section_2_content");
	</script>
</body>

</html>