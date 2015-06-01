 <?php
     if($_GET){
      
        if(!file_exists('users.txt')) {
            $file = fopen('users.txt', 'w');
            fclose($file);
        }

        $str = file_get_contents('users.txt');
        $data = unserialize($str);

        $data[$_GET["login"]] = $_GET["password"];
       
        $file = fopen('users.txt', 'w');

        fwrite($file, serialize($data));

        fclose($file);

        echo "REGISTRATION IS SUCCESSFUL!";
    }
    include('inc/registration.html');

?>    

