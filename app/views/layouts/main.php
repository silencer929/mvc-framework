<?php use app\core\Application; ?>
<?php //print_r(Application::$app->user); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" sizes="76x76" href="<?php echo URL;?>./public/img/apple-icon.png">
	   <link rel="icon" type="image/png" href="<?php echo UR;L?>/public/img/favicon.png">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/public/css/cc.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/public/css/bootstrap.css">
</head>
<body>
	<nav id="nav-bar">
		<div class="logo">
			<img  class="image" src="<?php echo URL;?>/public/img/view.jpg">
		</div>
		<div class="menu">
			<ul><?php if(Application::isGuest()) :?>
					<li><a href="<?php echo URL?>/home">Home</a></li>
					<li><a href="<?php echo URL?>/contact">contact</a></li>
					<li><a href="<?php echo URL?>/about">about</a></li>
				<?php else :?>
					<li><a href="<?php echo URL?>/home">Home</a></li>
					<li><a href="<?php echo URL?>/project">projects </a></li>
					<li><a href="<?php echo URL?>/profile">profile</a></li>
			<?php endif ?>
			</ul>
			<?php if(Application::isGuest()) : ?>
			<div class="login-register">
				<button id="login-out" class="btn"><a href="<?php echo URL?>/user/login">login</a></button>
				<button id="register" class="btn"><a href="<?php echo URL?>/user/register">register</a></button>	
			</div>
			<?php else :?>
			<div class="profile">
				<span class="btn">welcome  <?php echo Application::$app->user->userName ?? "";  ?></span>
				<button id="register" class="btn"><a href="<?php echo URL ?>/user/logout">logout</a></button>	
			</div>
		<?php endif ?>
		</div>
	</nav>
	<section class="banner" align="center">
		{{content}}
	</section>


	<script type="text/javascript" src="<?php echo URL;?>/public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>/public/js/bootstrap.js"></script>
	<script type="text/javascript" src=""></script>
</body>
</html>