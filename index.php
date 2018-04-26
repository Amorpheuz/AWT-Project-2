<?php 
session_start();
$_SESSION["results"]="\"\"";
if(isset($_SESSION["ERROR"])){
    echo "<script>alert('Error: ".$_SESSION["ERROR"]."');</script>";        
    $_SESSION["ERROR"]=NULL;
}
if(!isset($_SESSION["name"])){
    $_SESSION["name"] = NULL;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <title>Home - Nuvion University</title>
</head>
<body>
    <div class="bg-white">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white">
            <nav class="my-0 mr-md-auto">
                <a class="navbar-brand" href="index.php" style="font-size: 24pt;"><img src="logo.svg" alt="logo" style="height: 50px;"> Nuvion University</a>
            </nav>
            <nav class="my-2 my-md-0 mr-md-3">
            </nav>
            <?php 
            if ($_SESSION["name"]==NULL) {
                # code...
                echo "<a class='btn btn-outline-primary' href='login.php' style='margin-right:5px;'>Sign In</a>
                <a class='btn btn-outline-primary' href='register.php' style='margin-right:5px;'>Sign Up</a>";
            }
            else {
                # code...
                echo "<p style='padding-top:10px; padding-right:10px; font-size:14pt;'>Welcome ". $_SESSION["name"]."</p>";
                echo "<a class='btn btn-outline-primary' href='logout.php' style='margin-right:5px;'>Log Out</a>";
            }
            ?>
        </div>
        <div class="d-flex justify-content-center">
            <hr style="margin:0px; background-color: #2196f3; width: 95%">
        </div>
    </div>
    <div class="container-fluid" style="padding-top: 25px;">
        <div class="row">
            <div class="col-lg-2 l-right">
                <h3 class="font-weight-normal l-under">Filters</h3>
                <form method="POST" action="#" onsubmit="return filtercontent()">
                    <?php 
                    $con = mysqli_connect("localhost","root","");
                    $i=0;
                    if(!$con)
                    {
                        die('Connection Failed'.mysql_error());
                    }
                    mysqli_select_db($con,'ajaxtest');
                    $result = mysqli_query($con,"SELECT school, stream FROM schooinfo;");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row["school"]=="SBL" && $i==0) {
                                echo "<div class='form-check'>
                                    <label class='form-check-label' for='defaultCheck1'>
                                        <b>SBL</b>
                                    </label>
                                </div>";
                                $i++;
                            }
                            elseif ($row["school"]=="SET" && $i==1) {
                                echo "<div class='form-check'>
                                    <label class='form-check-label' for='defaultCheck1'>
                                        <b>SET</b>
                                    </label>
                                </div>";
                                $i++;
                            }
                            elseif ($row["school"]=="SEDA" && $i==2) {
                                echo "<div class='form-check'>
                                    <label class='form-check-label' for='defaultCheck1'>
                                        <b>SEDA</b>
                                    </label>
                                </div>";
                                $i++;
                            }
                            elseif ($row["school"]=="SLSE" && $i==3) {
                                echo "<div class='form-check'>
                                    <label class='form-check-label' for='defaultCheck1'>
                                        <b>SLSE</b>
                                    </label>
                                </div>";
                                $i++;
                            }
                            {
                                $str = "<div class='form-check'><input class='form-check-input' type='checkbox' value='".$row["stream"]."' id='".$row["stream"]."' name='".$row["stream"]."'";
                                    if($_SESSION["name"]==NULL){
                                        $str.="disabled";
                                    }
                                    $str .= "><label class='form-check-label' for='".$row["stream"]."'>
                                        ".$row["stream"]."
                                    </label>
                                </div>";
                                echo $str;
                            }
                        }
                    } 
                    else {
                        echo "0 results";
                    }
                    ?>
                    <br>
                    <?php 
                        if($_SESSION["name"]==NULL){
                            echo "<button type='submit' class='btn btn-primary' disabled>Search</button>";
                        }
                        else{
                            echo "<button type='submit' class='btn btn-primary'>Search</button>";
                        }
                    ?>
                </form>
            </div>
            <div class="col-lg-10">
                <?php 
                if ($_SESSION["name"]==NULL) {
                    # code...
                    echo "<div style='width: 100%; height: 100%' class='d-flex justify-content-center align-items-center'><h1 style='display-1'>Please Log IN to view Data  </h1></div>";
                }
                else{
                    echo "<div id='chlder' style='height:100%;'></div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
        function filtercontent() {
            event.preventDefault();                           
            var data = new FormData(); 
            if(document.getElementById("BBA").checked){
                var bba=$('#BBA').val(); 
                data.append('BBA',bba);
            }   
            if(document.getElementById("BCA").checked){                   
                var bca=$('#BCA').val();     
                data.append('BCA',bca);       
            }   
            if(document.getElementById("BBALLB").checked){
                var bbllb=$('#BBALLB').val();
                data.append('BBALLB',bbllb);
            }   
            if(document.getElementById("MBA").checked){
                var mba=$('#MBA').val();
                data.append('MBA',mba);
            }   
            if(document.getElementById("MHRM").checked){
                var mhrm=$('#MHRM').val();
                data.append('MHRM',mhrm);
            }   
            if(document.getElementById("BTech").checked){
                var btech=$('#BTech').val();
                data.append('BTech',btech);
            }   
            if(document.getElementById("MSc").checked){
                var msc=$('#MSc').val();   
                data.append('MSc',msc); 
            }   
            if(document.getElementById("BArch").checked){
                var barch=$('#BArch').val();
                data.append('BArch',barch);
            }   
            if(document.getElementById("BDesign").checked){
                var bdes=$('#BDesign').val();
                data.append('BDesign',bdes);
            }   
            if(document.getElementById("BLAD").checked){
                var blad=$('#BLAD').val(); 
                data.append('BLAD',blad);
            }   
            if(document.getElementById("BSc").checked){
                var bsc=$('#BSc').val(); 
                data.append('BSc',bsc);   
            }   
            if(document.getElementById("BA").checked){
                var ba=$('#BA').val(); 
                data.append('BA',ba);
            }   
            if(document.getElementById("BEd").checked){
                var bed=$('#BEd').val(); 
                data.append('BEd',bed);
            }   
            if(document.getElementById("MEd").checked){
                var med=$('#MEd').val(); 
                data.append('MEd',med);
            }   
            if(document.getElementById("MSW").checked){
                var msw=$('#MSW').val(); 
                data.append('MSW',msw);        
            }       
            var http = new XMLHttpRequest();                
            var url = "filterer.php";
            http.open("POST", url, true);
            //Send the proper header information along with the request
            //http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                                            
            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    document.getElementById("chlder").innerHTML= http.responseText;
                }
            }
            http.send(data); 
        }
        $(document).ready(function(){
            if ( $('.emptyDiv').text().length == 0 ) {
                $("#chlder").html("<h1 style='height: 100%; width: 100%;' class='d-flex justify-content-center align-items-center'>Select an option!</h1>");
            }
        });
    </script>
</body>
</html>