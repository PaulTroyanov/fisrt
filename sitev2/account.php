<?php
	session_start();

	echo "<p>You are logged in as <a href=''>".$_SESSION['login']."</a></p>";
	echo " <form method='post'>
        <p><input value='Log off' name='sub' type='submit'>
        <input value='Back to main page' name='sub' type='submit'></p>
        <p><input value='Add wishes' name='sub' type='submit'></p>   
    </form>";
    echo "<center><p style='margin-top:30px'>Hi, you have been logged in ".$_SESSION['counter']." times</p></center>";
    
    if(!file_exists('wishes.txt')) {
            $file = fopen('wishes.txt', 'w');
            fclose($file);
	}

    if(isset($_POST['sub']))
    {
    	switch($_POST['sub']){
    		case 'Log off':
    		$str = file_get_contents('wishes.txt');
        			$data = unserialize($str);
    			 array_push($data[$_SESSION['login']], $_SESSION['wish']);
    			$file = fopen('wishes.txt', 'w');

        		fwrite($file, serialize($data));

        		fclose($file);
    			
    			session_destroy();
    			header('Location: /index.php');
    			exit();
    			break;

    		case 'Back to main page':
    			header('Location: /index.php');
    			exit();
    			break;

    		case 'Add wishes':
    			include('wisher.html');

    			if(!isset($_SESSION['wish']))
    					$_SESSION['wish'] = array();
    			
    			$str = file_get_contents('wishes.txt');
        		$data = unserialize($str);
    			
    			if($data)
    			foreach($data[$_SESSION['login']] as $wish)
    				echo"<center><li>$wish</li></center>";
    			echo"<form method='post'><center><p><input type='submit' value='close' name='sub'></p></center></form>";
    			break;


    		case 'ADD':
    		    include('wisher.html');  				   			
    			if(isset($_POST['wish'])&&(strlen($_POST['wish']) > 1)){	
    				array_push($_SESSION['wish'], $_POST['wish']);
    				
    				//$data[$_SESSION['login']] = $_SESSION['wish'];

    			}
    			foreach($_SESSION['wish'] as $wish)
    				if(strlen($wish) > 1)
    					echo"<center><li>$wish</li></center>";
    			echo"<form method='post'><center><p><input type='submit' value='close' name='sub'></p></center></form>";
    			break;
    	}
    }
?>