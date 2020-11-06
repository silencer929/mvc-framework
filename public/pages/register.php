<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/public/css/register.css">
</head>
<body>
<form id="registerForm" method="POST" action="<?php echo URL?>/user/register">
	<h2> register here</h2>
	<div class="inputs">
	<input type="text" name="userName" placeholder="enter username">
	<input type="text" name="email" placeholder="enter email">
	<input type="text" name="password" placeholder="enter password">
	</div>
	
	<button id="register-btn" type="submit"> register</button>
</form>
</body>
</html>