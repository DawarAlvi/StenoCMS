<?php 
    require_once("../includes/session.php");
    auth_user("admin", ".");
    require_once("../includes/functions.php");
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
        $nav_current = "add_author";
        require_once("../includes/cms/nav.php");
    ?>

    <div class="main">
        <?php echo validation_errors();?>
        <?php echo messages();?>
        <form action="../action/cms/add_author_submit.php" method="post">
			<div class="section">
				<h2>Create New Author</h2>
				<label>Name *</label> <input type="text" name="name" required>
				<label>Email *</label> <input type="text" name="email" required>
				<label>Password *</label> <input type="password" name="password" required>
				<label>Retype Password *</label> <input type="password" name="password2" required>
				<label>Make Admin</label> <input type="checkbox" name="admin">
				<label>About *</label> <textarea name="about" required></textarea>
			</div>
			
			<div class="section-last">
				<input type="submit" value="Create" class="btn btn-confirm"title="Create New Author">
			</div>
		</form>
	</div>
	
</body>
</html>