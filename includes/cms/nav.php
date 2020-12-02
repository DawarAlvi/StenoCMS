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
        <?php if($_SESSION["is_admin"]) { ?>
            <li><a href="homepage" class="<?php echo(curr("homepage")) ?>"> <span class="fal fa-home fa-sm"></span>Homepage</a></li>
        <?php } ?>

            <li><a href="categories" class="<?php echo(curr("categories")) ?>"> <span class="fal fa-tag fa-sm"></span>Categories</a></li>

        <?php if($_SESSION["is_admin"]) { ?>
            <li><a href="about"    class="<?php echo(curr("about")) ?>"> <span class="fal fa-info fa-sm"></span>About</a></li>
        <?php } ?>

            <li><a href="contact"  class="<?php echo(curr("contact")) ?>"> <span class="fal fa-phone-alt fa-sm"></span>Contact</a></li>
            <hr>
            
        <?php if($_SESSION["is_admin"]) { ?>
            <li><a href="navbar"   class="<?php echo(curr("navbar")) ?>"> <span class="fal fa-location-arrow fa-sm"></span>Navbar</a></li>
            <li><a href="links"    class="<?php echo(curr("links")) ?>">  <span class="fal fa-link fa-sm"></span>Links</a></li>
            <hr>
        <?php } ?>

            <li><a href="view_posts"   class="<?php echo(curr("view_posts")) ?>">   <span class="fal fa-eye fa-sm"></span>View Posts</a></li>
            <li><a href="create_post"  class="<?php echo(curr("create_post")) ?>">  <span class="fal fa-pen fa-sm"></span>Create Post</a></li>
            <hr>
            <li><a href="view_authors" class="<?php echo(curr("view_authors")) ?>"> <span class="fal fa-user fa-sm"></span>View Authors</a></li>
        
        <?php if($_SESSION["is_admin"]) { ?>
            <li><a href="add_author"   class="<?php echo(curr("add_author")) ?>">   <span class="fal fa-plus fa-sm"></span>Add Author</a></li>
        <?php } ?>

        <hr>
        <li><a href="../" target="_blank"><span class="fal fa-globe fa-sm"></span>View Site</a></li>
    </ul>
</nav>
