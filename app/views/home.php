<?php use app\core\Application;?>
		<div class="container">
			 <?php if(Application::$app->session->getFlash("success")) :?>
        <div class="alert alert-success">
        <strong><?php echo Application::$app->session->getFlash("success")?></strong>
      </div>
        <?php endif;?>
			<h1><?php echo "code-holic"; ?></h1>
			<h3> another mans crappy software is another man's passion</h3>
		</div>