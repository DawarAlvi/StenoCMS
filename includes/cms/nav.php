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
    <span class="fas fa-bars" id="menu-icon"></span>

    <ul class="menu">
        <li><a href="#"><span class="fas fa-home"></span>Home</a></li>
        <li><a href="#"><span class="fas fa-tag"></span>Categories</a></li>
        <li><a href="#"><span class="fas fa-info"></span>About</a></li>
        <li><a href="#"><span class="fas fa-phone-alt"></span>Contact</a></li>
        <hr>
        <li><a href="#"><span class="fas fa-location-arrow"></span>Navbar</a></li>
        <li><a href="#"><span class="fas fa-link"></span>Links</a></li>
        <hr>
        <li><a href="#"><span class="fas fa-eye"></span>View Posts</a></li>
        <li><a href="#"><span class="fas fa-pen"></span>Create Post</a></li>
        <hr>
        <li><a href="#"><span class="fas fa-user"></span>View Authors</a></li>
        <li><a href="#"><span class="fas fa-plus"></span>Add Author</a></li>
    </ul>
</nav>
