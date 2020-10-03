<?php require_once("includes/db_connect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | About</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/about.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo (get_banner("About", "Know The Project & The People")); ?>

    <h1>What is Steno CMS?</h1>
    <p>Steno CMS is a lightweight content management system for online blog publication. Steno CMS assumes no technical knowledge on the part of the user and takes care of the headaches of creating and maintaining a blog site. Apart from basic operations such as creating, retrieving, updating, and deleting posts (CRUD), it also supports multiple authors to help run the blog site in a collaborative manner. Steno CMS employs a novel tagging system to categorize blog posts for easy and fast navigation.</p>

    <ul class="features">
        <li><span class="fas fa-feather"></span>Lightweight</li>
        <li><span class="fas fa-puzzle-piece"></span>Easy to Use</li>
        <li><span class="fas fa-pencil-alt"></span>Customizable</li>
        <li><span class="fas fa-handshake"></span>Collaborative</li>
    </ul>

    <h1>Meet the Team.</h1>
    <p>The team behind the Steno CMS project is made up of four hardworking individuals from Kashmir. They started Steno CMS as a college project. Their love for technology and aim for making it accessible to more people is what motivated this project.</p>

    <?php require_once("includes/footer.php"); ?>

</body>

</html>
