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
    <span class="fas fa-bars" id="menu-icon"></span>

	<?php if(!isset($nav_current)) $nav_current = "" ?>

    <ul class="menu">
        <li><a href="homepage.php"><span class="fas fa-home <?php is_current("homepage") ?>"></span>Homepage</a></li>
        <li><a href="categories.php"><span class="fas fa-tag <?php is_current("categories") ?>"></span>Categories</a></li>
        <li><a href="about.php"><span class="fas fa-info <?php is_current("about") ?>"></span>About</a></li>
        <li><a href="contact.php"><span class="fas fa-phone-alt <?php is_current("contact") ?>"></span>Contact</a></li>
        <hr>
        <li><a href="navbar.php"><span class="fas fa-location-arrow <?php is_current("navbar") ?>"></span>Navbar</a></li>
        <li><a href="links.php"><span class="fas fa-link <?php is_current("links") ?>"></span>Links</a></li>
        <hr>
        <li><a href="view_posts.php"><span class="fas fa-eye <?php is_current("view_posts") ?>"></span>View Posts</a></li>
        <li><a href="create_post.php"><span class="fas fa-pen <?php is_current("create_post") ?>"></span>Create Post</a></li>
        <hr>
        <li><a href="view_authors.php"><span class="fas fa-user <?php is_current("view_authors") ?>"></span>View Authors</a></li>
        <li><a href="add_author.php"><span class="fas fa-plus <?php is_current("add_author") ?>"></span>Add Author</a></li>
    </ul>
</nav>
