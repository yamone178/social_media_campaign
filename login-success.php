<?php
    session_start();
    include("dbconnect.php") ;  
    $email= $_POST['email'];
    $password= $_POST['password'];
    $admin=1;
    $user=0;

    $sql = "SELECT * FROM member WHERE email='".$email."' AND password='".$password."' AND usertype='".$admin."'";
    $output = $conn->query($sql);

    if ($output->num_rows>0)
    {
        $_SESSION['email'] =$email;
        header ('location:adminhome.php');
    }
    elseif(!isset($_SESSION['email']))
    {
        $sql = "SELECT * FROM member WHERE email='".$email."' AND password='".$password."' AND usertype='".$user."'";
        $output = $conn->query($sql);

        if ($output->num_rows>0)
        {
            $_SESSION['email'] =$email;
            header ('location:home.php');
        }
        else{
            if(!isset($_SESSION['attempt'])){
                $_SESSION['attempt'] = 0;
            }
            
            $_SESSION['attempt'] += 1;
            
            if($_SESSION['attempt'] === 3){
                $_SESSION['msg'] = "You have exceeded the maximum number of login attempts. Please wait for 10 minutes before trying again.";
                $_SESSION['check'] = 1;
                $_SESSION['attempt_again'] = time() + (1*60); //1*60 = 1mins, 10*60 = 10mins
            }
            else{
                $_SESSION['msg'] = "Invalid Username or Password!";
              
            }
         
            header('location:login.php');
        }
    }
?>