<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */

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
	font-family: inter;
}

/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px){
	
	
	
}
/* --*-- Tablet Media Query Ends --*-- */

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
	.wrapper {
		display: grid;
		gap: 1em;
		padding: 1em;
		grid-template-columns:2fr 1fr;
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
		grid-column: 1/2;
	}
	.heading {
		grid-column: 1/2;
	}	
	.content {
		grid-column: 1/2;
	}
	
}
/* --*-- Desktop Media Query Ends --*-- */