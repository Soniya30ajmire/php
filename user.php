<?php
session_start();
if(isset($_SESSION["uid"]))
{
	header("location:login.php");
}

include("dbconnect.php");
$qry="SELECT * FROM `admin` order by id desc limit 5";
$result=mysqli_query($connect, $qry);
$row=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
		ul li{
			line-height: 45px;
			font-size: 20px;
		}	
        body {
            background-color: #f8f9fa;
        }
        .container-fluid {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #17a2b8;
        }
        .card-header {
            font-size: 1.5rem;
        }
        .notice-list {
            padding-left: 20px;
        }
      .container {
      	padding-left: 200px;
      	   }
    </style>
</head>
<body>
	
	<div class="container-fluid">
        <h2 class="text-center text-primary my-4">Welcome to User Page</h2>
        <div class="row justify-content-center">
	
		<div class="col-md-6">
			<form method="post">
				<div class="card">
			<div class="card-header bg-info text-light">Notice</div>
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
			<div class="card-body">

				<ul>
					<?php  
					if($row>0)
					{
						while($data=mysqli_fetch_assoc($result))
							{ ?>
						<li><?php echo $data["notice"]?></li>
						<?php
					}
					}
					else
					{?>
							<li>No notice found here</li>
				<?php	}?>



					
				</ul>  
			</form>
		</div>
	</marquee>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <br/>
    	<div class="container">
    <button class="btn btn-info"><a href="logout.php" class="text-light">Logout</a></button>
</div>
</body>
</html>
