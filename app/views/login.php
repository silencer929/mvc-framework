<?php use app\core\Application;?>
		<div class="container">
      <form action="<?php echo URL?>/user/login" method="POST" class="login" onsubmit="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" >
    <h6 id="err1" class="form-text" style="color: red;"> <?php echo $email ?? ''; ?> </h6>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    <h6 id="err2" class="form-text" style="color: red;"> <?php echo $password ?? ''; ?> </h6>
  </div>
 <div>
    <button class="login-btn" type="submit" class="btn btn-primary">Submit</button>
    <h6 id="err3" class="form-text" style="color: red;"> <?php echo $invalid ?? ''; ?> </h6>
 </div>
</form>
    </div>