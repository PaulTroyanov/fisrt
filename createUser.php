<?php
	include('library/db.php');

	if(!empty($_POST) && strlen($_POST['login']) > 1){
		createUser($_POST['login'], $_POST['email'], $_POST['password'], getConnect());
	}
?>
	<center>
	<form method='POST'>

	<p>Login:<input name='login'></p>
	<p>Email:<input name='email'></p>
	<p>Password:<input type='password' name='password'></p>
	<p><input type='submit' value='Create user'></p>
	</form>
	<?php include('userList.php'); ?>
	</center>

