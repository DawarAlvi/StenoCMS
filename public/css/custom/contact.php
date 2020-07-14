<?php Header("Content-type: text/css; charset: utf-8") ?>

<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */
.contact-form {
    display: flex;
    flex-direction: column;
    padding: 1em;
}
    .contact-form input, .contact-form textarea {
        border-radius: 0;
        border:5px solid #ffffffff;
        line-height: 3em;
    }
    .contact-form input[type=submit] {
        width: 8em;
        height: 4em;
        align-self: center;
        margin:1em;
        
        border:none;
        background-color: <?php echo($highlight); ?>;
        color:white;
    }
    .contact-form input[type=submit]:hover {
        background-color: <?php echo($dark); ?>;
        color:white;
    }
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
    .contact-form {
        padding: 3em;
    }

}
/* --*-- Tablet Media Query Ends --*-- */


/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
    .contact-form {
        padding: 3em 10em;
    }

}
/* --*-- Desktop Media Query Ends --*-- */