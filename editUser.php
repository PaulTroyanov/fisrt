<?php
	include('library/db.php');
	$user = getUser($_GET['email'], getConnect());

	if(isset($_POST['sub']) && strlen($_POST['email']) == 0)
		$_POST['email'] = $user['email'];

	if(isset($_POST['sub']) && strlen($_POST['password']) == 0)
		$_POST['password'] = $user['password'];

	if(!empty($_POST) && strlen($_POST['email']) > 0){
		updateUser($_POST['email'], $_POST['password'], $_GET['email'], getConnect());
		header('Location: createUser.php');
		exit();
	}
?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<center style='margin-top:100px'>

	<form method='POST'>

	<?="<p>Email:<input name='email' placeholder=".$user['email']."></p>"?>
	<?="<p>Password:<input type='password' name='password' placeholder=".$user['password']."></p>"?>
	<p><input name='sub' type='submit' value='Save' class="btn btn-primary"></p>

	</form>
	</center>