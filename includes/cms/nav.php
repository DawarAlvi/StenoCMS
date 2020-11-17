<script>
    function toggleIcon() {
        var menuIcon = document.getElementById("menu-icon");
        menuIcon.classList.toggle('fa-bars');
        menuIcon.classList.toggle('fa-times');
    }
</script>
<?php 
    if(!isset($nav_current)) $nav_current = "";

    function curr($value) {
        global $nav_current;
        if($nav_current === $value) return("current");
    }
?>
<nav>
    <div class="userinfo">
        <h1><a href="../cms"><?php echo($_SESSION["author_name"]) ?></a></h1>
        <span><?php $_SESSION["is_admin"]?print('Admin'):print('Author') ?></span>
    </div>

    <input type="checkbox" onclick="toggleIcon();">
    <span class="fal fa-bars" id="menu-icon"></span>

    <ul class="menu">
        <?php
            if($_SESSION["is_admin"]) {
                echo('
                    <li><a href="homepage" class="' . curr("homepage") . '"> <span class="fal fa-home fa-sm"></span>Homepage</a></li>
                ');
            }
        ?>

        <li><a href="categories" class="<?php echo(curr("categories")) ?>"> <span class="fal fa-tag fa-sm"></span>Categories</a></li>

        <?php
            if($_SESSION["is_admin"]) {
                echo('
                    <li><a href="about"    class="' . curr("about")   . '"> <span class="fal fa-info fa-sm"></span>About</a></li>
                    <li><a href="contact"  class="' . curr("contact") . '"> <span class="fal fa-phone-alt fa-sm"></span>Contact</a></li>
                    <hr>
                    <li><a href="navbar"   class="' . curr("navbar")  . '"> <span class="fal fa-location-arrow fa-sm"></span>Navbar</a></li>
                    <li><a href="links"    class="' . curr("links")   . '">  <span class="fal fa-link fa-sm"></span>Links</a></li>
                    <hr>
                ');
            }
        ?>

        <li><a href="view_posts"   class="<?php echo(curr("view_posts")) ?>">   <span class="fal fa-eye fa-sm"></span>View Posts</a></li>
        <li><a href="create_post"  class="<?php echo(curr("create_post")) ?>">  <span class="fal fa-pen fa-sm"></span>Create Post</a></li>
        <hr>
        <li><a href="view_authors" class="<?php echo(curr("view_authors")) ?>"> <span class="fal fa-user fa-sm"></span>View Authors</a></li>
        
        <?php
            if($_SESSION["is_admin"])
                echo('<li><a href="add_author"   class="' . curr("add_author") . '">   <span class="fal fa-plus fa-sm"></span>Add Author</a></li>');
        ?>

        <hr>
        <li><a href="../" target="_blank"><span class="fal fa-globe fa-sm"></span>View Site</a></li>
    </ul>
</nav>
