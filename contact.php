<?php require_once("includes/db_connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
    $banner_info = get_banner_info("contact");
    $title = $banner_info["title"];
    $caption = $banner_info["caption"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo($title) ?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/light.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/contact.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo (get_banner($title, $caption)); ?>
    
    <form class="contact-form" action="action/contact.php" method="post">
        <p>Full Name</p>
        <input type="text" name="name" required>

        <p>E-mail</p>
        <input type="email" name="email" required>

        <p>Message</p>
        <textarea name="message" cols="30" rows="10" required></textarea>

        <input type="submit" value="Send" name="send">
    </form>

    <?php require_once("includes/footer.php"); ?>

</body>

</html>