<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="<?php  echo URL;?>/public/css/login.css">
	<script type="text/javascript" src="<?php echo URL?>/public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL?>/public/js/20.js"></script>
</head>
<body>

	<section class="container">
		<form id="loginForm" onsubmit="return false" method="POST" action=""style="width: 250px; height: 500px;">
			<h3>user login<h4>
		<div class="fields">
		<label> username: </label>
		<input type="text" name="userName" placeholder="enter username">
	</div>
	<div class="fields">
		<label>password: </label>
		<input type="password" name="password" placeholder="enter password">
	</div>
	<button  id="login" type="submit">LOGIN</button>
	<div> create an account here?<a href="<?php echo URL;?>/user/registerForm">register</a></div>
	</form>
	</section>
</body>
</html>