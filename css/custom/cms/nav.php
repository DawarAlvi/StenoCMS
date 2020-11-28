<?php Header("Content-type: text/css; charset: utf-8") ?>

@font-face {
    font-family: 'MulishLight';
    src:url('../../../webfonts/custom/Muli-Light.ttf') format('truetype');
}

body {
    margin:0;
    padding:0;
    background: #eee;
    font-family: 'MulishLight', sans-serif;
    font-size: 14px;
}
a {
    text-decoration: none;
    color:white;
}
ul {
    padding:0;
    margin:0;
}
li {
    list-style: none;
}
hr {
    background:grey;
    height:1px;
    border:none;
    margin:0;
}


nav {
    background: <?php echo($dark) ?>;
    color:white;
}
    .userinfo {
        background-color: <?php echo($highlight) ?>;
        padding:1em;
    }
    .userinfo h1 {
        margin:0;
		transition: 0.2s all;
    }
	.userinfo h1:hover {
		letter-spacing: 1px;
    }


    nav > input {
        position:absolute;
        right:20px;
        top:25px;
        z-index:5;
        opacity: 0;
        cursor:pointer;
        width:30px;
        height:30px;
    }
    nav #menu-icon {
        text-align: center;
        position:absolute;
        right:23px;
        top:27px;
        font-size:32px;
    }

        nav li a {
            display:block;
            background: <?php echo($dark) ?>;
            line-height:3em;
            padding:0 6px;
            color: #ccc;
        }
        nav li a:hover {
            background: #444;
        }
            nav li a span {
                text-align: center;
                margin:0 1em;
            }

.menu {
    max-height:0;
    overflow:hidden;
    transition: .2s max-height ease-in;
}
.menu li {
	transition: 0.2s all;
}
.menu li:hover {
	letter-spacing: 1px;
}
nav > input:checked ~ .menu {
    max-height: 500px;
}
.current {
	border-left:4px solid <?php echo($highlight) ?>;
    background: #444;
    color: white;
}



/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
    body {
        display: grid;
        grid-template-columns: 1fr 5fr;
    }
    nav {
		position: fixed;
		min-width: 15vw;
        min-height:100vh;
    }
    nav > input, nav #menu-icon {
        display:none;
    }
    .menu{
        max-height:1000px;
    }

}