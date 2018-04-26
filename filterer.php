<?php 
session_start();
$con = mysqli_connect("localhost","root","");
if(!$con)
{
    die('Connection Failed'.mysql_error());
}
$bba = "";
$bca = "";
$bbllb = "";
$mba = "";
$mhrm = "";
$btech = "";
$msc = "";
$barch = "";
$bdesign = "";
$blad = "";
$bsc = ""; $ba = ""; $bed = "";
$med = ""; $msw = "";
$navstr = "<ul class='nav nav-fill'>";
$filters = array();
if(isset($_POST['BBA']))
{
    array_push($filters,$_POST["BBA"]);
}           
if(isset($_POST['BCA']))
{
    array_push($filters,$_POST["BCA"]);
}           
if(isset($_POST['BBALLB']))
{            
    array_push($filters,$_POST["BBALLB"]);
}           
if(isset($_POST['MBA']))
{
    array_push($filters,$_POST["MBA"]);
}           
if(isset($_POST['MHRM']))
{
    array_push($filters,$_POST["MHRM"]);
}           
if(isset($_POST['BTech']))
{
    array_push($filters,$_POST["BTech"]);
}           
if(isset($_POST['MSc']))
{
    array_push($filters,$_POST["MSc"]);    
}           
if(isset($_POST['BArch']))
{
    array_push($filters,$_POST["BArch"]);
}           
if(isset($_POST['BDesign']))
{
    array_push($filters,$_POST["BDesign"]);
}           
if(isset($_POST['BLAD']))
{
    array_push($filters,$_POST["BLAD"]); 
}           
if(isset($_POST['BSc']))
{
    array_push($filters,$_POST["BSc"]); 
}           
if(isset($_POST['BA']))
{   
    array_push($filters,$_POST["BA"]); 
}           
if(isset($_POST['BEd']))
{
    array_push($filters,$_POST["BEd"]); 
}           
if(isset($_POST['MEd']))
{
    array_push($filters,$_POST["MEd"]); 
}           
if(isset($_POST['MSW']))
{
    array_push($filters,$_POST["MSW"]);
}
mysqli_select_db($con,'ajaxtest');
$str = "";
foreach ($filters as $varx) {
    $result = "SELECT stream, info FROM schooinfo WHERE stream = '$varx';";
    if(!mysqli_query($con,$result))
    {
        echo "ERROR".mysqli_error($con);
    }    
    else
    {
        $row = mysqli_fetch_array(mysqli_query($con,$result));
        # code...
        $navstr .= "<li class='nav-item'>
                        <a class='nav-link' href='#".$row["stream"]."'>".$row["stream"]."</a>
                    </li>";
        $str .= "<div id='".$row["stream"]."'>
        <h4 class='l-under'>".$row["stream"]."</h4>
        <p>".$row["info"]."</p>
        </div>";
    }
}
if(sizeof($filters)==0)
{
    echo "<h1 style='height: 100%; width: 100%;' class='d-flex justify-content-center align-items-center'>Select an option!</h1>";
}
else{ 
    echo $str;
}
?>