<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */
.login {
    background: #4b4b4b url("../../img/index/1.jpg") center center no-repeat;
}
    .login form {
        display: flex;
        flex-direction:column;
        padding:10em 0 4em 0;
    }
    .login input {
        border-radius: 0;
        border:5px solid #ffffff00;
        line-height: 3em;
        margin:1em;
    }

    .login input[type=text], .login input[type=password] {
        background-color: #ffffff88;
    }

    .login form input[type=submit] {
        width: 8em;
        height: 4em;
        align-self: center;
        margin:1em;
        
        border:none;
        background-color: <?php echo($highlight); ?>;
        color:white;
    }
    .login form input[type=submit]:hover {
        background-color: <?php echo($dark); ?>;
        color:white;
    }
/* --*-- Mobile Ends --*-- */


/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
    .login form {
        padding:20em 0 16em 0;
    }
    .login input[type=text], .login input[type=password] {
        align-self:center;
        min-width: 40em;
        max-width: 50em;
    }
}
/* --*-- Tablet Media Query Ends --*-- */

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
    .login form {
        padding:10em 0 10em 0;
    }

}
/* --*-- Desktop Media Query Ends --*-- */