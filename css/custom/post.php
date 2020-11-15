<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */

img {
	width: 100%;
}
.img-main {
	background: url(../../img/posts/<?php print($_GET['q'] .'/0') ?>.jpg) center center no-repeat;
	background-size: cover;
	margin: 0 auto;
	overflow: hidden;
	height: 60vw;
	width: 100%;
}

.title {
	margin: 10px;
}

.author-pic {
	width: 80px;
	height: 80px;
	background: grey url(../../img/authors/default.png) center center no-repeat;
	background-size: cover;
	border-radius: 50%;
	box-shadow: 2px 2px 10px black;
	margin: 2em 2em 0 10px;
	float: left;
}

.author-name {
	font-size: 1.2em;
	font-weight: bold;
	margin-top: 2em;
	margin-left: 10px;
}
.date {
	margin: 10px;
}
.heading {
	margin: 10px;
}
.content {
	width: cal(100vw-20px);
	margin: 10px;
	font-family: 'Inter';
}

/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
	
	
	
}
/* --*-- Tablet Media Query Ends --*-- */

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
	.wrapper {
		width:70%;
		padding: 1em;
		margin: 0;
	}
	.img-main {
		height: 40vw;
		margin:0;
	}
	.title {
		font-size: 3em;
		align-self: center;
	}
	.date {
	}
	.heading {
	}	
	.content {
	}
	
}
/* --*-- Desktop Media Query Ends --*-- */