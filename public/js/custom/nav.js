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
