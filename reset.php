<?php

$pwd='';

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$#@&^*';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}



if(isset($_POST["resetbtn"]))

{
	$connect= mysqli_connect("localhost","root", "", "project4");
	$uname =$_POST["username"];
	$mob=$_POST["mobile"];

	$qry="SELECT * FROM `user` WHERE username = '$uname' AND mobile='$mob'";
	$result=mysqli_query($connect,$qry);
	$data=mysqli_fetch_assoc($result);
	$id= $data["id"];
	$row=mysqli_num_rows($result);

	if($row>0)
	{
		$pwd =randomPassword();
		echo "new password".$pwd;
		$qry="UPDATE `user` SET password ='$pwd' WHERE id='$id'";
		$result=mysqli_query($connect,$qry);
		echo"password reset successfully";
	}
	else
	{
		echo "Invalid username or mobile number ";
	}


}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<form method="POST">
	<table cellspacing="7">
		
		<tr>
			<td>username</td>
			<td><input type="text" name="username"></td>
			<tr>
				<td>mobile</td>
				<td><input type="tel" name="mobile"></td>
			</tr>
			<td colspan="2" align="center"><button name="resetbtn">reset password </button>
			</td>
		</tr>
		<tr>

			<td colspan="2">password-<font color="red"><?php echo $pwd ?></font>,please copy the password, password change</td>  
		</tr>
	</table>
</form>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>