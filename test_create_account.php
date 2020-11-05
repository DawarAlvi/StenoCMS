<?php require_once("includes/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--STYLES-->
    <link rel="stylesheet" type="text/css" href="css/custom/form.css">
    <link rel="stylesheet" type="text/css" href="css/custom/create_account.css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">

    <title>Steno | Create Account</title>
</head>
<body>
    <div id="container">
        <form id="create_account_form" action="action/create_account_submit.php" method="post">
            <?php echo validation_errors(); ?>
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" class="btn" value="Create Account"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
