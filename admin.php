<?php

if(isset($_POST["noticebtn"]))
{
  include("dbconnect.php");
$nt=$_POST['notice'];
/*$qry="INSERT INTO `admin`(`notice`) VALUES ('$nt')";
*/  
 $qry = "INSERT INTO `admin`(`notice`, `uploaded_at`) VALUES ('$nt',now())";
 $result=	mysqli_query($connect, $qry);
   if($result)
   {
      echo "notice added!";
   }
  else	
  {
     echo "something went wrong....".mysqli_error($connect);
  }

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
	<h2>Welcome to admin page !</h2>
 <div class="container">	
 	<div class="row">
 		<div class="col-md-6" mx-auto >
 			<form method="post">
 				<div class="form-group">
 				<label>notice</label>
 				<textarea name="notice" placeholder="Enter notice here" class="form-control"></textarea>
 				</div>
 				<div class="form-group">
 					<button class="btn btn-success" name="noticebtn">Add</button>
 			</form>
 		</div>
 </div>		
 	</div>
 	 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
