<?php
session_start();
if (isset( $_SESSION['name'] )) {
    header("Location:index.php");
    exit();
}
if(isset($_SESSION["ERROR"])){
    echo "<script>alert('Error: ".$_SESSION["ERROR"]."');</script>";
    $_SESSION["ERROR"]=NULL;
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
    <link rel="stylesheet" href="registerpage.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <title>Sign Up - Nuvion University</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mainholders">
            <div class="col-lg-6 picsection d-flex justify-content-center align-items-center text-white text-justify">
                <div>
                    <table>
                        <tr>
                            <td>
                                <h3>
                                    <i class="fas fa-book" style="margin-right: 10px;"></i>
                                </h3>
                            </td>
                            <td>
                                <h3>Get the best resources</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>
                                    <i class="fas fa-graduation-cap" style="margin-right: 10px;"></i>
                                </h3>
                            </td>
                            <td>
                                <h3>Be an expert</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>
                                    <i class="fas fa-trophy" style="margin-right: 10px;"></i>
                                </h3>
                            </td>
                            <td>
                                <h3>Win the world</h3>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-row-reverse" style="padding-top: 15px;" id="logger">
                        <form class="form-inline" action="logger.php" method="POST">
                            <div class="form-group mb-2">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <input type="text" class="form-control" id="staticEmail2" placeholder="email" required name="email">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="inputPassword2" placeholder="pass" required name="pass">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="hidden" name="redirurl" value="register.php" />
                            </div>
                            <button type="submit" class="btn btn-outline-primary mb-2">Log IN</button>
                        </form>
                    </div>
                </div>
                <div class="row" style="height: 80%;">
                    <div class="col-lg-12 d-flex justify-content-center align-items-center" style="height: 100%; padding-top: 100px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row l-under">
                                    <div class="col-lg-12">
                                        <h1 class="text-center" style="font-size:40pt;">
                                            <a href="index.php" style="color:inherit; text-decoration:none;"><img src="logo.svg" alt="logo" height="90px"> Nuvion University</a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="col-lg-12" id="hder">
                                        <h2 class="font-weight-normal text-center">Sign Up</h2>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:25px;">
                                    <div class="col-lg-12" id="contenter">
                                        <form method="POST" onsubmit="return submitform()" action="#">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputName">Name</label>
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="Name" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDOB">Date of Birth</label>
                                                    <input type="date" class="form-control" id="inputDOB" placeholder="Date of Birth" name="dob" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="Password" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCPassword">Confirm Password</label>
                                                    <input type="password" class="form-control" id="inputCPassword" placeholder="Confirm Password" name="CPassword" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="Apartment, studio, or floor" name="addr" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" class="form-control" id="inputCity" name="city" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState">State</label>
                                                    <select id="inputState" class="form-control" name="state" required>
                                                        <option selected>Choose...</option>
                                                        <option value="AndhraPradesh">Andhra Pradesh</option>
                                                        <option value="ArunachalPradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="HimachalPradesh">Himachal Pradesh</option>
                                                        <option value="jk">Jammu & Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="MadhyaPradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="TamilNadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="UttarPradesh">Uttar Pradesh</option>
                                                        <option value="WestBengal">West Bengal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip" name="zip" required pattern="^[1-9][0-9]{5}$" title="Please enter a valid ZIP Code">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="agreetc" required>
                                                    <label class="form-check-label" for="gridCheck">
                                                        I agree to <a href="#">Terms & Conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign UP</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
        function submitform() {
            event.preventDefault();            
            var name=$('#inputName').val();            
            var dob=$('#inputDOB').val();            
            var pass=$('#inputPassword').val();
            var cpass=$('#inputCPassword').val();
            var email=$('#inputEmail').val();
            var addr=$('#inputAddress').val();
            var city=$('#inputCity').val();    
            var state=$('#inputState').val();
            var zip=$('#inputZip').val();
            var tnc=$('#gridCheck').val();                        
            if(pass.length<8)            
            {                 
                alert("Password must be at least 8 characters long.");                 
            }             
            else if(pass!=cpass)        
            {                
                alert("Passwords do not match");                
            }            
            else{               
                var http = new XMLHttpRequest();                
                var url = "reg.php";                
                var data = new FormData();                
                data.append('Name',name);                
                data.append('dob', dob);                
                data.append('Password', pass);                
                data.append('email',email);                
                data.append('addr', addr);                
                data.append('city',city);                
                data.append('state', state);                
                data.append('zip', zip);                                
                http.open("POST", url, true);
                //Send the proper header information along with the request
                //http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                                            
                http.onreadystatechange = function() {//Call a function when the state changes.
                    if(http.readyState == 4 && http.status == 200 && http.responseText.includes("<!doctype html>")==false) {
                        document.getElementById("hder").innerHTML = "<h1 class='display-3 text-center'>Registration Succesful</h1>";
                        document.getElementById("contenter").innerHTML= http.responseText;
                        $("#logger").replaceWith("");
                    } 
                    else if(http.responseText.includes("<!doctype html>")) {
                        alert("Email Already Exists!");
                    }
                }
                
                http.send(data);   
            }            
        }
        $(document).ready(function(){
            $(document).on("click","#logindiv",function(){
                $("#logindiv").replaceWith("<form action='logger.php' method='POST'> <div class='form-group'> <label for='email'>Email address</label> <input type='email' required class='form-control' id='email' aria-describedby='emailHelp' placeholder='Enter email' name='email'> <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small> </div><div class='form-group'> <label for='pass'>Password</label> <input type='password' required class='form-control' id='pass' placeholder='Password' name='pass'> </div><div class='form-group mx-sm-3 mb-2'> <input type='hidden' name='redirurl' value='login.php'/> </div><button type='submit' class='btn btn-primary btn-lg btn-block'>Log IN</button></form>");
                $("#contenter").addClass("d-flex justify-content-center");
                $("#logger").replaceWith("");
                $("#hder").replaceWith("");
            });
        });
    </script>
</body>
</html>

