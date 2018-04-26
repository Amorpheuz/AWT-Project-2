<?php 
session_start();
$con = mysqli_connect("localhost","root","");
if(!$con)
{
    die('Connection Failed'.mysql_error());
}


$name = $_POST["Name"];
$dob = $_POST["dob"];
$pass = $_POST["Password"];
$email = $_POST["email"];
$addr = $_POST["addr"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];

mysqli_select_db($con,'ajaxtest');
$result = mysqli_query($con,"SELECT email FROM studentsreg WHERE email = '$email';");
if(mysqli_affected_rows($con)==0)
{
    
    $result = "INSERT INTO studentsreg(sname,pass,email,addr,city,statee,zip,dob) VALUES('$name',SHA1('$pass'),'$email', '$addr','$city','$state',$zip,'$dob')";
    
    if(!mysqli_query($con,$result))
    {
        echo "ERROR".mysqli_error($con);
    }    
    else
    {
        echo "<a role='button' class='btn btn-primary btn-block btn-lg text-light' href='#' id='logindiv'>Log IN</a>";
    }
}
else
{
    header("location:register.php");
}

?>