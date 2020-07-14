<script>
    function toggleIcon() {
        var menuIcon = document.getElementById("menu-icon");
        menuIcon.classList.toggle('fa-bars');
        menuIcon.classList.toggle('fa-times');
    }
</script>
<nav>
    <div class="userinfo">
        <h1>Dawar Alvi</h1>
        <span>Admin</span>
    </div>

    <input type="checkbox" onclick="toggleIcon();">
    <span class="fa fa-bars" id="menu-icon"></span>

    <ul class="menu">
        <li><a href="#"><span class="fa fa-home"></span>Home</a></li>
        <li><a href="#"><span class="fa fa-tag"></span>Categories</a></li>
        <li><a href="#"><span class="fa fa-info"></span>About</a></li>
        <li><a href="#"><span class="fa fa-phone-alt"></span>Contact</a></li>
        <hr>
        <li><a href="#"><span class="fa fa-location-arrow"></span>Navbar</a></li>
        <li><a href="#"><span class="fa fa-link"></span>Links</a></li>
        <hr>
        <li><a href="#"><span class="fa fa-eye"></span>View Posts</a></li>
        <li><a href="#"><span class="fa fa-pen"></span>Create Post</a></li>
        <hr>
        <li><a href="#"><span class="fa fa-user"></span>View Authors</a></li>
        <li><a href="#"><span class="fa fa-plus"></span>Add Author</a></li>
    </ul>
</nav>
