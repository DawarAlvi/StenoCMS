<?php Header("Content-type: text/css; charset: utf-8") ?>

@font-face {
    font-family: 'Inter';
    src:url('../../../webfonts/custom/Inter-Regular.ttf') format('truetype');
}

body {
    margin:0;
    padding:0;
    background: #eee;
    font-family: 'Inter', sans-serif;
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
        }
        nav li a:hover {
            background: #444;
        }
            nav li a span {
                min-width:2em;
                text-align: center;
            }
.menu {
    max-height:0;
    overflow:hidden;
    transition: .2s max-height ease-in;
}
nav > input:checked ~ .menu {
    max-height: 500px;
}



/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
    body {
        display: grid;
        grid-template-columns: 1fr 5fr;
    }
    nav {
        min-height:100vh;
    }
    nav > input, nav #menu-icon {
        display:none;
    }
    .menu{
        max-height:1000px;
    }

}