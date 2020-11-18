<?php
    require_once("../includes/session.php");
    user_auth("author", ".");
    require_once("../includes/db_connect.php");
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
    
    <link rel="stylesheet" href="../css/custom/cms/index.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">
</head>

<body>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
       	<h1>Hi, <?php echo($_SESSION["author_name"]) ?></h1>
		<p>Select an option from the menu to start editing.</p>
		<a href="../logout">Logout</a>
    </div>

</body>

</html>
