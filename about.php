<?php
    require_once("includes/db_connect.php");
    require_once("includes/functions.php");

    $banner_info = get_banner_info("about");
    $title = $banner_info["title"];
    $caption = $banner_info["caption"];


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

    <title><?php echo($title) ?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/light.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/about.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="img/branding/default_favicon.png">'); ?>
</head>
<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo (get_banner($title, $caption)); ?>

    <h1><?php echo($section_1_title); ?></h1>
    <p><?php echo($section_1_content); ?></p>

    <?php if($show_section_feature === '1') {?>
    <ul class="features">
        <li><span class="fal fa-feather"></span>Lightweight</li>
        <li><span class="fal fa-puzzle-piece"></span>Easy to Use</li>
        <li><span class="fal fa-pencil-alt"></span>Customizable</li>
        <li><span class="fal fa-handshake"></span>Collaborative</li>
    </ul>
    <?php } ?>

    <?php if($show_section_2 === '1') {?>
    <h1><?php echo($section_2_title); ?></h1>
    <p><?php echo($section_2_content); ?></p>
    <?php } ?>

    <?php require_once("includes/footer.php"); ?>

</body>
</html>
