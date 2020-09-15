<?php Header("Content-type: text/css; charset: utf-8") ?>

<?php require_once("../vars.php") ?>
<?php require_once("nav.php") ?>

.main form {
	padding-bottom: 8em;
}
	.main .section {
		background-color: #fff;
		margin:1em;
		padding:1em;
		border-radius:4px;
		box-shadow:2px 2px 4px #ccc;
		display: flex;
		flex-direction: column;
	}
	.main .section-last {
		display: inherit;
		box-shadow: none;
		position: fixed;
		bottom: 0;
		padding: 0;
		margin: 1em;
	}

.btn {
	color: #fff;
	width:5em;
	line-height: 3em;
	border:none;
	border-radius:4px;
	cursor: pointer;
}
.btn-cancel {
	background:red;
}
.btn-confirm {
	background:green;
}

label, input, button{
	margin: .5em 0;
	line-height: 3em;
}
select {
	height: 3em;
	border-radius:4px;
}





/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  margin-bottom: 10em;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #555;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
}
.modal-header a {
	color:black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
}




	
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
		.main .section {
			display: grid;
			grid-template-columns: repeat(3,1fr);
			grid-gap: 1em;
		}
			.section h2 {
				grid-column: 1/4;
			}
			.section label {
				grid-column: 1/2;
			}
	
		.main .section-last {
			display: inherit;
		}
		
	label, input, button {
		margin: 0;
	}
}

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
		.main {
		margin-left: 15vw;
		width: 83.2vw;
	}
}