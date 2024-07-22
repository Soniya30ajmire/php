
    
 
<?php

if (isset($_POST["registerbtn"])) {
    include("dbconnect.php");


    $fn = $_POST["fullname"];
    $eid = $_POST["email"];
   $pwd =  md5($_POST["password"]);
    $mob =$_POST["mobile"];
    
    $qry = "INSERT INTO `register` (`id`, `Full Name`, `Email`, `Password`, `Mobile No.`) VALUES (NULL, '$fn', '$eid', '$pwd', '$mob')";

    $result = mysqli_query($connect, $qry);
    if ($result) {
        echo "Successfully Registered";
    } else {
        echo "Failed to Register!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mx-auto">
                <div class="card mt-5">
                    <div class="card-header text-center bg-info text-light">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerForm" method="POST" action="">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input type="tel" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit" name="registerbtn">Register</button>
                            </div>
                            <p>Already have an Account? <a href="login.php">Sign In</a><p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
