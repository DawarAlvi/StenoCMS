<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */
.banner {
	height:16.6em;
	background: <?php file_exists("../../img/banner/categories.jpg")?print("url(\"../../img/banner/categories.jpg\")"):print("url(\"../../img/banner/default.jpg\")") ?> center center no-repeat;
	background-size: cover;
}

.categories {
    display:flex;
    flex-direction: column;
    gap: 10px;
    padding:10px;
}
    .category {
            text-align: center;
            background: url(../../img/index/05.jpg) center center no-repeat;
            background-size: cover;
            line-height:200px;
            color:black;
        }
            .category span {
                background-color: #ffffff55;
                padding:2px;
                transition: 0.5s all;
            }
            .category:hover span, .category:focus span {
                letter-spacing: .2em;
            }
/* --*-- Mobile Ends --*-- */



/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
	.banner{
        height:32em;
    }
    .categories {
        display:grid;
        grid-template-columns: repeat(2,1fr);
        gap:15px;
        padding:15px;
    }
}
/* --*-- Tablet Media Query Ends --*-- */


/* --*-- Desktop Media Query --*-- */
@media (min-width:980px) {
    .categories {
        display:grid;
        grid-template-columns: repeat(3,1fr);
        gap:20px;
        padding:20px;
    }
}
