<?php
	include('library/db.php');
	$user = getUser($_GET['email'], getConnect());

	if(!empty($_POST) && strlen($_POST['login']) > 1){
		updateUser($_POST['login'], $_POST['email'], $_POST['password'], $_GET['email'], getConnect());
		header('Location: createUser.php');
		exit();
	}
?>
	<center>
	<form method='POST'>

	<?="<p>Login:<input name='login' placeholder=".$user['name']."></p>"?>
	<?="<p>Email:<input name='email' placeholder=".$user['email']."></p>"?>
	<?="<p>Password:<input type='password' name='password' placeholder=".$user['password']."></p>"?>
	<p><input type='submit' value='Edit'></p>

	</form>
	</center>