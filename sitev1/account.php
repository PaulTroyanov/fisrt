<?php
session_start();

	if (isset($_GET["logOff"]))
    {
        unset($_SESSION['user']);
		header('Location: /index.php');        
		exit();
    }

	echo "LOGGED IN";
    $name = "user";
    include('inc/exit_button.html');

?>