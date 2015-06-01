<?php
	include('library/db.php');

	if(!empty($_POST) && strlen($_POST['login']) > 1){
		createUser($_POST['login'], $_POST['email'], $_POST['password'], getConnect());
	}
?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<center style='margin-top:100px'>
	<form method='POST'>

	<p>Login:<input name='login'></p>
	<p>Email:<input name='email'></p>
	<p>Password:<input type='password' name='password'></p>
	<p><input type='submit' value='Create user' class="btn btn-primary"></p>
	</form>
	<?php include('userList.php'); ?>
	</center>

