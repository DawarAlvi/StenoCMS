<?php require_once("vars.php") ?>

/* fonts */
@font-face {
    font-family: 'Sarina';
    src:url('../../webfonts/custom/Sarina-Regular.ttf') format('truetype');
}
@font-face {
    font-family: 'Raleway';
    src:url('../../webfonts/custom/Raleway-Regular.ttf') format('truetype');
}
@font-face {
    font-family: 'Inter';
    src:url('../../webfonts/custom/Inter-Regular.ttf') format('truetype');
}


/* Resets and Defaults */
html { height:100%; }
body {
    margin:0;
    padding:0;
    position:relative;
    min-height:100%;
    background: #ddd;
    font-family:'Inter',sans-serif;
}
h1 {
    color:<?php echo($dark); ?>;
}
a {
    text-decoration: none;
}
.fa-circle {
    font-size:0.5em;
    margin: 0 1em;
}

/* --*-- mobile first --*-- */
nav {
    background-color: <?php echo($dark_alpha); ?>;
    position: fixed;
    width:100%;
    
    align-items:center;
    z-index:1000;

    /* background-color is changed in js */
    transition:background-color 0.5s ease-in-out;
}
    nav a {
        padding:0 0.4em;
        color: <?php echo($light); ?>;
        line-height:2.5em;
		display: block;
		
        /* line-height is changed in js */
        transition: line-height 0.5s ease-in-out;
    }
    nav a:hover, nav a:focus {
        color: <?php echo($highlight); ?>;
        transition: color 0.2s ease-in-out;
    }

    nav ul {
        padding:0;
		display: none;
    }
        nav ul li {
            list-style: none;
        }
	nav #toggle {
		background-color: #000000aa;
		font-size: 2em;
		padding: 2px 5px;
		border-radius: 4px;
		position: absolute;
		right: .5em;
		top: .5em;
		z-index: 2;
		color: <?php echo($light); ?>;
		cursor: pointer;
	}

/*Banner*/
    .strip {
        position:relative;
        top:4.5em;
        margin:auto auto;
        background:#00000077;
        line-height:3.5em;
        padding:2em;
        text-align:center;
    }
        .strip .logo {
            background: <?php file_exists("../../img/branding/custom_logo.jpg")?print('url("../../img/branding/custom_logo.jpg")'):print('url("../../img/branding/default_logo.png")') ?> center center no-repeat;
            background-size: contain;
            height:100px;
        }
        .strip .title {
            margin:auto auto;
            font-size:2em;
            color:<?php echo($light); ?>;
            font-family: 'Sarina','Raleway','Inter',monospace;
        }
        .strip .caption {
            margin: 1em auto 0 auto;
            font-size:1.2em;
            font-family:'Raleway','Inter',sans-serif;
            color:<?php echo($light); ?>;
            display: none;
        }
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
    nav a{
        padding:0 2em;
    }

		.strip{
			top:5.5em;
			width:40%;
			min-width: 30em;
			border-radius: 4px;
		}
			.strip .logo{
				display: block;
				height:150px;
				width:150px;
				margin: 0 auto 1.5em auto;
			}
			.strip .title {
				font-size:3em;
			}
			.strip .caption{
				font-size:1.2em;
				display: block;
			}
}
/* --*-- Tablet Media Query Ends --*-- */

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px) {

	nav {
		display:flex;
	}
	nav ul {
		margin:auto auto;
		display: block;
	}
    nav a{
        padding:0 4em;
    }
		nav ul li {
			display:inline-block;
		}
	nav #toggle {
		display: none;
	}
	
    .strip .title {
        font-size:4em;
    }

}
/* --*-- Desktop Media Query Ends --*-- */
















/* Footer */
/* --*-- mobile first --*-- */
body::after{ content:''; display:block; height:320px;}

footer{ 
    position:absolute;
    bottom:0; 
    width:100%; 
    height:320px;
    background-color: #272727;
    }
    .footer-branding{
        font-family: Raleway, Inter, sans-serif;
        text-align: center;
        padding:16px 0;

    }
    .footer-branding img{
        max-width:100px;
        max-height:100px;
    }
    .footer-branding p{
        color:#fff;
    }
    .footer-branding p:nth-child(2){
        font-size: .8em;
        margin:0;
    }
    .footer-branding p:nth-child(3){
        font-size: 1.2em;
        margin:0;
    }
    .footer-branding p:nth-child(3) span{
        font-size: .6em;
    }
    .footer-links{

        padding:1em;
        text-align: center;
    }   
    .footer-links a{
        color:#fff;
        background-color: #111111;
        border-radius: 100%;
        display: inline-block;
        width: 50px;
        line-height: 50px;
    }
    .footer-links a:hover{
        background-color: #1d1d1d;
    }
    .footer-nav-links{
        text-align: center;
        font-size: .8em;
    }
    .footer-nav-links li{
        display:inline;
        list-style-type: none;
    }
    .footer-nav-links ul {
        padding: 0;
    }
    .footer-nav-links li a{
        color:#fff;
        padding:5px;
    }
    .footer-nav-links li a:hover{
        color:<?php echo($highlight); ?>;
    }
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
    body::after{height:260px;}

    footer{
        height:260px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .footer-branding{
        margin-left: 3em;
    }
    .footer-links{
        margin:auto auto;

    }
    .footer-nav-links{
        justify-self: flex-end;
        margin-right: 3em;
    }
    .footer-nav-links li a{
        display:block;
        text-align: end;
        font-size: 1.3em;
    }
}
/* --*-- Tablet Media Query Ends --*-- */
