<?php 
    session_start();
    $con = mysqli_connect("localhost","root","");
    if(!$con)
    {
        die('Connection Failed'.mysql_error());
    } 
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $page = $_POST['redirurl'];
    mysqli_select_db($con,'ajaxtest');

    $result = mysqli_query($con,"SELECT sname, pass, email FROM studentsreg WHERE email = '$email' AND pass= sha1('$pass');");
    if (!$result) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $row = mysqli_fetch_array($result);

    if($row["email"]==$email)
    {
        $_SESSION["id"]=session_id();
        $_SESSION["email"]=$email;
        $_SESSION["ERROR"]=NULL;
        $_SESSION["name"] = $row["sname"];
        
        header("location:index.php");
    }
    else
    {
        $_SESSION["ERROR"]="Wrong Email/Password, Please try again!";
        header("location:".$page);
    }
?>