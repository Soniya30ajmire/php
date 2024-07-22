 <?php



if(isset($_SESSION['uid']))
{
    header("location:user.php");
}



if (isset($_POST["loginbtn"]))
 {
    include("dbconnect.php");

    $eid = $_POST["email"];
   $pwd = $_POST["password"];

   if($eid == "admin" && $pwd== "admin")
   {
    header("location:admin.php");
    
   }
   
   $pwd = md5($_POST["password"]);
   $qry ="SELECT * FROM `register` WHERE email ='$eid' AND password = '$pwd'";

   $result = mysqli_query($connect, $qry);

   $row = mysqli_num_rows($result);
   if($row > 0)
   {
        $data= mysqli_fetch_assoc($result);
         session_start();
         $_SESSION['uid']=$data["id"];
         
        header("location:user.php");

   }
    else {
        echo "Invalid email or password";
        }    
}
    ?> 

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>`</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mx-auto">
                <div class="card mt-5">
                    <div class="card-header text-center bg-primary text-light">
                        <h3 >login</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerForm" method="POST" action="">
                        
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="loginbtn">login</button>
                            </div>
                            <p>Don't have an account! <a href="register.php">Sign Up</a></p>
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
