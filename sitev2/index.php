<?php

    function show_header(){
        ?>
        <html>
            <body>
        <?php
    }
    
    function show_footer(){
        ?>
            </body>
        </html>
        <?php
    }

    function check_data(){
        if(!file_exists('users.txt')) {
            $file = fopen('users.txt', 'w');
            fclose($file);
        }
    }

    function check_user($login, $password){
        check_data();
       
        $str = file_get_contents('users.txt');
        $data = unserialize($str);

        if(($data) && ((array_key_exists($login, $data)) && ($password == $data[$login][0]))){
            $data[$login][1] += 1;
            $file = fopen('users.txt', 'w');

            fwrite($file, serialize($data));
    
            fclose($file);

            return true;
        }
        else{
            echo'Fail';
            return false;
        }
    }
    
    function add_user($login, $password){
        check_data();

        $str = file_get_contents('users.txt');
        $data = unserialize($str);
        $counter = 0;

        $data[$login] = array($password, $counter);
       
        $file = fopen('users.txt', 'w');

        fwrite($file, serialize($data));

        fclose($file);

        echo "<center><p style='margin-top:200px'>REGISTRATION IS SUCCESSFUL!</p></center>";
    }
    
    function page_index(){
        show_header();
        
        include('sub.html');
        
        show_footer();
    }
    
    function page_stat(){

    }
    
    function page_reg(){
        show_header();
        
        include('registration.html');
        
        show_footer();
    }
    
    function page_greet(){

    }

//------------------------------------------------------
    
    session_start();

    if(!isset($_SESSION['user'])){
        page_index();

        if(isset($_POST['sub'])){
            switch($_POST['sub']){
               
               case 'Submit':
                    if((isset($_POST['login']) && isset($_POST['pass'])) && strlen($_POST['login'])>1)
                        if(check_user($_POST['login'], $_POST['pass'])){
                            $_SESSION['user'] = true;
                            $_SESSION['login'] = $_POST['login'];
                            $_SESSION['pass'] = $_POST['pass'];
                            
                            $str = file_get_contents('users.txt');
                            $data = unserialize($str);

                            $_SESSION['counter'] = $data[$_POST['login']][1];
                            header('Location: /account.php');

                        }
                    break;
                
                case 'Registration':
                    page_reg();
                    break;

                case 'Create':
                    if((isset($_POST['login_new']) && isset($_POST['pass_new'])) && strlen($_POST['login_new'])>1)
                        add_user($_POST['login_new'], $_POST['pass_new']);
                    break;
            }

        }
    }
    else{

        echo "<p>Login: <a href='account.php'>".$_SESSION['login']."</a></p>";
        echo "<p>Password: ".$_SESSION['pass']."</p>";
        
        echo "<center><p style='margin-top:200px'>Hi, ".$_SESSION['login']."</p></center>";
    }


?>