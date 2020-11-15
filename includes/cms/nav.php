<script>
    function toggleIcon() {
        var menuIcon = document.getElementById("menu-icon");
        menuIcon.classList.toggle('fa-bars');
        menuIcon.classList.toggle('fa-times');
    }
</script>
<nav>
    <div class="userinfo">
        <h1><a href="../cms">John Doe</a></h1>
        <span>Admin</span>
    </div>

    <input type="checkbox" onclick="toggleIcon();">
    <span class="fal fa-bars" id="menu-icon"></span>

    <?php 
        if(!isset($nav_current)) $nav_current = "";
    
        function is_current($value) {
            global $nav_current;
            if($nav_current === $value) print("current");
        }
    ?>

    <ul class="menu">
        <li><a href="homepage"     class="<?php is_current("homepage") ?>">     <span class="fal fa-home fa-sm"></span>Homepage</a></li>
        <li><a href="categories"   class="<?php is_current("categories") ?>">   <span class="fal fa-tag fa-sm"></span>Categories</a></li>
        <li><a href="about"        class="<?php is_current("about") ?>">        <span class="fal fa-info fa-sm"></span>About</a></li>
        <li><a href="contact"      class="<?php is_current("contact") ?>">      <span class="fal fa-phone-alt fa-sm"></span>Contact</a></li>
        <hr>
        <li><a href="navbar"       class="<?php is_current("navbar") ?>">       <span class="fal fa-location-arrow fa-sm"></span>Navbar</a></li>
        <li><a href="links"        class="<?php is_current("links") ?>">        <span class="fal fa-link fa-sm"></span>Links</a></li>
        <hr>
        <li><a href="view_posts"   class="<?php is_current("view_posts") ?>">   <span class="fal fa-eye fa-sm"></span>View Posts</a></li>
        <li><a href="create_post"  class="<?php is_current("create_post") ?>">  <span class="fal fa-pen fa-sm"></span>Create Post</a></li>
        <hr>
        <li><a href="view_authors" class="<?php is_current("view_authors") ?>"> <span class="fal fa-user fa-sm"></span>View Authors</a></li>
        <li><a href="add_author"   class="<?php is_current("add_author") ?>">   <span class="fal fa-plus fa-sm"></span>Add Author</a></li>
        <hr>
        <li><a href="../" target="_blank"><span class="fal fa-globe fa-sm"></span>View Site</a></li>
    </ul>

</nav>
