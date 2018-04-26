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
    <link rel="stylesheet" href="login.css">
    <title>Login - Nuvion</title>
</head>
<body>
    <div class="bg-white">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white">
            <nav class="my-0 mr-md-auto">
                <a class="navbar-brand" href="index.php" style="font-size: 24pt;"><img src="logo.svg" alt="logo" style="height: 50px;"> Nuvion University</a>
            </nav>
            <nav class="my-2 my-md-0 mr-md-3">
            </nav>
            <a class='btn btn-outline-primary' href='register.php' style='margin-right:5px;'>Sign Up</a>
        </div>
        <div class="d-flex justify-content-center">
            <hr style="margin:0px; background-color: #2196f3; width: 95%">
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="font-weight-normal l-under text-center text-muted">LOG IN</h1>
                <form action="logger.php" method="POST">
                    <div class='form-group'>
                        <label for='email'>Email address</label>
                        <input type='email' class='form-control' id='email' aria-describedby='emailHelp' placeholder='Enter email' name='email' required>
                        <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small>
                    </div>
                    <div class='form-group'>
                        <label for='pass'>Password</label>
                        <input type='password' class='form-control' id='pass' placeholder='Password' name='pass' required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="hidden" name="redirurl" value="login.php" />
                    </div>
                    <button type='submit' class='btn btn-primary btn-lg btn-block'>Log IN</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>