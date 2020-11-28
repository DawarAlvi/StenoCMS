<?php Header("Content-type: text/css; charset: utf-8") ?>
<?php require_once("base.php") ?>

/* --*-- mobile first --*-- */

#banner {
	display: flex;
	align-items: center;
	padding: 4em 0;
}
#banner-strip {
	box-sizing: border-box;
	padding: 1em;
	width: 100%;
	color: white;
	background: #000a;
}
#banner-title {
	font-size: 3em;
	font-family: 'Roboto';
}

#banner-author {
	display: flex;
	flex-direction: column;
	align-items: center;
}

#banner-author-name {
	font-weight: bolder;
	margin: .5em 0;
}
#banner-date {
	font-size: .8em;
}
#banner-author-pic {
	margin-top: 2em;
	border-radius: 50%;
	border: 3px solid white;
}

.content-img{
	max-width: 100vw;
}





/* --*-- Desktop --*-- */

@media(min-width: 980px) {
	#banner {
		padding: 8em 0;
		margin-bottom: 2em;
	}
	#banner-strip {
		display: flex;
		padding: 4em 1em;
	}
	#banner-title {
		max-width: 50%;
	}
	#banner-author {
		display: grid;
		grid-template-rows: auto auto;
		grid-template-columns: auto auto;
		margin-left: auto;
	}
	#banner-author-name {
		grid-row: 1/2;
		grid-column: 1/2;
		margin: 0 1rem 0 0;
		align-self: end;
		text-align: right;
	}
	#banner-date {
		grid-row: 2/3;
		grid-column: 1/2;
		align-self: start;
		margin: 0 1rem 0 0;
		text-align: right;
	}
	#banner-author-pic {
		grid-row: 1/3;
		grid-column: 2/3;
		align-self: center;
		margin: 0;
	}





	.wrapper {
		min-height: 50vh;
		padding: 0 10vw;
		overflow: hidden;
	}
	.content-img {
		max-width: 80vw;
	}
}
