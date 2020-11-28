<?php
    require_once("../includes/session.php");
    auth_user("admin", ".");
    require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");
    
    $links = get_media_links();
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
	<?php $nav_current = "links"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <?php echo validation_errors();?>
        <?php echo messages();?>
        <form method="post" action="../action/cms/links_submit.php">
			<div class="section">
				<h2>Media URL links</h2>
				<label>Facebook</label>  <input type="text" name="facebook" value="<?php print(mysqli_fetch_assoc($links)["url"]) ?>">
				<label>Instagram</label> <input type="text" name="instagram" value="<?php print(mysqli_fetch_assoc($links)["url"]) ?>">
				<label>Twitter</label>   <input type="text" name="twitter" value="<?php print(mysqli_fetch_assoc($links)["url"]) ?>">
			</div>			
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
		</form>
	</div>
	
	
	
</body>
</html>