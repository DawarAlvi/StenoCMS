<?php
    require_once("includes/session.php");

    if(isset($_SESSION['author_id'])) {
		header("Location: cms");
    }
    
    require_once("includes/db_connect.php");
    require_once("includes/functions.php");

    $email = "";

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        /*--Initialization--*/
        $email  = strtolower(sanitize_input($_POST["email"]));
        $password  = sanitize_input($_POST["password"]);
        $errors = array();


        $author = attempt_login($email, $password);

        if($author) {
            $_SESSION["author_id"] = $author["id"];
            $_SESSION["author_name"] = $author["name"];
            $_SESSION["is_admin"] = $author["is_admin"];
            header("Location: cms");
        }
        else {
            array_push($errors, "Email/Password incorrect.");
            $_SESSION["errors"] = $errors;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | Home</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/light.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/login.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo(validation_errors()); ?>

    <div class="login">
        <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email" value="<?php echo(htmlentities($email)) ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        </form>
    </div>

    <?php require_once("includes/footer.php"); ?>
</body>

</html>