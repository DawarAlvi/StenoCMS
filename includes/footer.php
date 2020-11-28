<?php $links = get_media_links() ?>
<footer>
    <div class="footer-branding">
        <img src="img/branding/default_logo.png" alt="Steno cms logo">
        <p>powered by</p>
        <p>Steno <span>CMS</span></p>
    </div>

    <div class="footer-links">
        <a href="<?php print(mysqli_fetch_assoc($links)["url"]) ?>" title="follow us on facebook" target="_blank"> <span class="fab fa-facebook-f"></span></a>
        <a href="<?php print(mysqli_fetch_assoc($links)["url"]) ?>" title="follow us on instagram" target="_blank"><span class="fab fa-instagram"> </span></a>
        <a href="<?php print(mysqli_fetch_assoc($links)["url"]) ?>" title="follow us on twitter" target="_blank">  <span class="fab fa-twitter">   </span></a>
    </div>

    <div class="footer-nav-links">
        <ul>
            <li><a href="index">Home</a></li>
            <li><a href="categories">Categories</a></li>
            <li><a href="about">About</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="login">Login</a></li>
        </ul>
    </div>
</footer>
