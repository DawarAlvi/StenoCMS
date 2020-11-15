<script>
    //Navbar scroll effect

    window.onload = function(){document.querySelector("nav a").style.lineHeight = "3em"};
    window.onscroll = function(){scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementsByTagName("nav")[0].style.backgroundColor = "#111111";
            document.querySelector("nav li a").style.lineHeight = "2.5em";
        }
        else{
            document.getElementsByTagName("nav")[0].style.backgroundColor = "#111111cc";
            document.querySelector("nav li a").style.lineHeight = "3em";
        }
    }

    function toggleMenu() {
        var toggle = document.getElementById("toggle");
        var menu = document.getElementsByTagName("ul")[0];
        
        
        if(menu.style.display == "none" || menu.style.display == "") {
            menu.style.display = "block";
            toggle.style.backgroundColor = "#00000000";
        }
        else {
            menu.style.display = "";
            toggle.style.backgroundColor = "#000000aa";
        }
        toggle.classList.toggle('fa-bars');
        toggle.classList.toggle('fa-times');
    }
</script>

<?php 
    function get_pages_nav_info() {
        global $connection;
        $query = "SELECT `show_on_nav` FROM `main_pages`"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_categories_nav_info() {
        global $connection;
        $query = "SELECT `id`, `name`, `show_on_navbar` FROM `categories` WHERE 1"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
    
    $main_pages = get_pages_nav_info();
    $nav_categories = get_categories_nav_info()
?>

<nav>
	<span id="toggle" class="fal fa-bars" onclick="toggleMenu();"></span>
    <ul>
        <!-- main pages-->
        <?php  mysqli_fetch_assoc($main_pages)["show_on_nav"] ? print("<li><a href=\"index\">HOME</a></li>"):print("");?>
        <?php  mysqli_fetch_assoc($main_pages)["show_on_nav"] ? print("<li><a href=\"categories\">CATEGORIES</a></li>"):print("");?>
        <?php  mysqli_fetch_assoc($main_pages)["show_on_nav"] ? print("<li><a href=\"about\">ABOUT</a></li>"):print("");?>
        <?php  mysqli_fetch_assoc($main_pages)["show_on_nav"] ? print("<li><a href=\"contact\">CONTACT</a></li>"):print("");?>
    
        <!-- categories -->
        <?php
            while($current = mysqli_fetch_assoc($nav_categories)){
                $current["show_on_navbar"] ? print("<li><a href=\"categories?q=" . $current["id"] . "\">" . strtoupper($current["name"]) . "</a></li>"):print("");   
            }
        ?>
    </ul>
</nav>
