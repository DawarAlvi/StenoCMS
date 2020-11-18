<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("../../includes/db_connect.php"); ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */
.banner {
	height:16.6em;
	background: <?php file_exists("../../img/banner/index.jpg")?print('url("../../img/banner/index.jpg")'):print('url("../../img/banner/default.jpg")') ?> center center no-repeat;
	background-size: cover;
}

h1 {
    text-align: center;
}
h1 a {
    color: <?php echo($dark); ?>;
}
h1 a:hover, h1 a:focus {
    color: <?php echo($highlight); ?>;
}
.popularposts, .latestposts {
    padding:1em;
    display: grid;
}
    .post {
        text-decoration: none;
        color:black;
        height: 400px;
        border-radius: 4px;
        overflow: hidden;
        margin:10px 0;
    }
        .postbg {
            height: 100%;
            display: flex;
            align-items: flex-end;
            transition: transform .3s ease-in-out;
        }
        <?php 
            $result = mysqli_query($connection, "SELECT `id` FROM `posts` WHERE `online` = 1");
            while($post = mysqli_fetch_assoc($result)) {
                echo("
                .postbg-" . $post["id"] . " {
                    background: #4b4b4b url(\"../../img/posts/" . $post["id"] . "/0.jpg\") center center no-repeat;
                    background-size: cover;
                }");
            }
        ?>
        .post:hover .postbg,
        .post:focus .postbg {
            transform: scale(1.1);
        }
            .postbanner {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 2fr 1fr;
                height: 40%;
                width: 100%;
                padding: 1rem;
                background-color: #ffffff77;
                transition: transform .3s ease-in-out;
            }
            .post:hover .postbanner,
            .post:focus .postbanner {
                background-color: #ffffff99;
                transform: scale(.91);
            }

            .post .title {
                font-size: 1.2em;
                font-weight: bolder;
                grid-column: 1/3;
            }
            .post .tags,
            .post .date {
                font-size: .8em;
            }
            .post .date {
                justify-self: end;
            }
            .post .tags span {
                background: #111;
                color: #ddd;
                border-radius: 2px;
                padding: 2px;
                z-index: 10;
            }

.categories {
    display:grid;
    grid-template-columns: repeat(2,1fr);
    gap: 10px;
    padding:10px;
}
    .category {
        text-align: center;
        background: url(../../img/categories/default.jpg) center center no-repeat;
        background-size: cover;
        line-height:150px;
        color:black;
    }
    <?php 
        $result = mysqli_query($connection, "SELECT `id` FROM `categories` WHERE `show_on_homepage` = 0");
        while($category = mysqli_fetch_assoc($result)) {
            echo("
            .category-" . $category["id"] . " {
                background: #4b4b4b url(\"../../img/categories/" . $category["id"] . ".jpg\") center center no-repeat;
                background-size: cover;
            }");
        }
    ?>
        .category span {
            background-color: #ffffff88;
            padding:2px;
            transition: 0.5s all;
        }
        .category:hover span, .category:focus span {
            letter-spacing: .2em;
            
        }

/* --*-- Mobile Ends --*-- */



/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
	.banner{
        height:32em;
    }
    .popularposts, .latestposts {
        display: grid;
    }

    .categories {
        gap:15px;
        padding:15px;
    }
}
/* --*-- Tablet Media Query Ends --*-- */



/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
    .popularposts, .latestposts {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap: 2em;
    }
    .post {
        margin:0;
    }
    .post-1 {
        grid-column: 1/3;
    }
    .post-2 {
        grid-column: 3/4;
    }
    .post-3 {
        grid-column: 1/2;
    }
    .post-4 {
        grid-column: 2/4;
    }

    
    .categories {
        grid-template-columns: repeat(4,1fr);
        gap:20px;
        padding:20px;
    }
    .category {
        height:200px;
    }
    .category span {
        line-height: 200px;
    }


}
/* --*-- Desktop Media Query Ends --*-- */