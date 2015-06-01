 <?php
    session_start();
    if(!isset($_SESSION['user']))
    {

        if(!file_exists('users.txt')) {
            $file = fopen('users.txt', 'w');
            fclose($file);
        }

        $str = file_get_contents('users.txt');
        $data = unserialize($str);
   
        if(($_GET) && (isset($_GET["login"])))
        {
   
            if(($data) && ((array_key_exists($_GET["login"], $data)) && ($_GET["pass"] == $data[$_GET["login"]])))
            {              
                $_SESSION['user'] = true;
                header('Location: /account.php');

            }
            else
            	echo "FAIL!!!";
        }
        if(($_GET) && ($_GET["registration"])){
        	
        	include('registrate.php');
        }
     	
     	include('inc/sub.html');

    }
?>     