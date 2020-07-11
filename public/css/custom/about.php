<?php Header("Content-type: text/css; charset: utf-8") ?>

<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */
h1 {
    margin:1em;
}
p, .features{
    margin:4em;
    padding: 0;
}
.features li {
    list-style: none;
    color:whitesmoke;
    background-color: <?php echo($dark); ?>;
    line-height: 4em;
    padding:1em;
    margin:10px 0;
    border-radius: 4px;
}
.features span {
    background-color: whitesmoke;
    color: <?php echo($dark); ?>;
    padding:1em;
    margin-right: 1em;
    border-radius: 100px;
}
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
    .features {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:10px;
    }
    .features li {
        margin:0;
    }
}
/* --*-- Tablet Media Query Ends --*-- */

