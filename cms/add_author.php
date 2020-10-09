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
	<?php $nav_current = "add_author"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form>
			<div class="section">
				<h2>Create New Author</h2>
				<label>Username *</label> <input type="text" required>
				<label>Display Name *</label> <input type="text" required>
				<label>Email *</label> <input type="text" required>
				<label>Password *</label> <input type="password" required>
				<label>Retype Password *</label> <input type="password" required>
				<label>Make Admin</label> <input type="checkbox">
			</div>			
			
			<div class="section-last">
				<input type="submit" value="Create" class="btn btn-confirm"title="Create New Author">
			</div>
		</form>
	</div>
	
</body>
</html>