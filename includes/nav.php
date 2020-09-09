<script type="text/javascript">
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

<nav>
	<span id="toggle" class="fas fa-bars" onclick="toggleMenu();"></span>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="categories.php">CATEGORIES</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</nav>
