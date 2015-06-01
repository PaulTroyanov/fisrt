<?php
	include('library/db.php');
	include('log.html');

	if(isset($_POST['sub'])){
		switch($_POST['sub']){
			
			case 'Log in':
				if(!empty($_POST['email']) && !empty($_POST['password'])){
					$user = getUser($_POST['email'], getConnect());
					if($user){
						header('Location: /userList.php');
						exit();
					}
		
					break;

				}

			case 'Registrate':
				include('reg.html');
				break;

			case 'Create user':

				if(!empty($_POST['password']) && !empty($_POST['email']))
					createUser($_POST['email'], $_POST['password'], getConnect());
				break;
		}
	}
?>