<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script>alert('Please Login');</script>";
		header("location:homepage.php");
		exit;
	}
	require 'dbconnection.php';
	if(isset($_GET['id'])){
		$toolId=$_GET['id'];
		$qry="select * from tool_details where tool_id=".$toolId."";
		$res=mysqli_query($con,$qry);
		$row=mysqli_num_rows($res);
		if($row>0){
			$tool=mysqli_fetch_assoc($res);
		}
		else{
			echo "<script>alert('Tool does not exist');window.location.href='user_page.php';</script>";
			exit;
		}
	}
	else{
		echo "<script>alert('Invalid request');window.location.href='user_page.php';</script>";
		exit;
	}
	
	$success=false;
	if(isset($_POST['book'])){
		$toolId=$_GET['id'];
		$username=$_SESSION['username'];
		$email=$_POST['user_email'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];
		$qry1="insert into bookings (tool_id,username,email,start_date,end_date) values('".$toolId."','".$username."','".$email."','".$start_date."','".$end_date."')";
		$exe1=mysqli_query($con,$qry1);
		if($exe1){
			$success=true;
			$uqry="update tool_details set tool_status='Not Available' where tool_id=".$toolId."";
			$uexe=mysqli_query($con,$uqry);
			
			echo "<script>alert('Book successful');window.location.href='user_page.php';</script>";
			exit;
		}
		else{
			echo "<script>alert('Book unsuccessful');window.location.href='user_page.php';</script>";
		}
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
	.card {
  max-width: 400px;
  margin: 40px auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
}

.card-img-top {
  height: 200px;
  object-fit: cover;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.card-body {
  padding: 20px;
}

.card-title {
  font-weight: bold;
  font-size: 24px;
  margin-bottom: 10px;
}

.card-text {
  font-size: 18px;
  color: #666;
}

.card-text strong {
  font-weight: bold;
  color: #333;
}

.alert {
  margin-top: 20px;
  padding: 10px;
  border-radius: 5px;
}

.alert-success {
  background-color: #dff0d8;
  color: #333;
  border-color: #d6e9c6;
}

.alert-danger {
  background-color: #f2dede;
  color: #333;
  border-color: #ebccd1;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  padding: 10px;
  border: none;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.btn-primary {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #444;
}
h1.my-4 {
  text-align: center;
  background-color: #34C759;
  color: #fff;
  padding: 10px;
  border-radius: 10px;
  display: inline-block;
  width: 100%;
}
	</style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Book Tool</h1>
        <div class="card">
            <img src="<?php echo $tool['tool_image']; ?>" class="card-img-top" alt="<?php echo $tool['tool_name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $tool['tool_name']; ?></h5>
                <p class="card-text"><?php echo $tool['tool_specifications']; ?></p>
                <p class="card-text"><strong>₹<?php echo $tool['tool_price']; ?>/day</strong></p>
                <?php if ($success): ?>
                    <div class="alert alert-success">Booking successful!</div>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST" action="" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="user_name">Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username'];?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
					<div class="form-group">
                        <label for="end_date">Start Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
					<button type="submit" class="btn btn-primary" name="book">Book Now</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		function validateForm() {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(document.getElementById('end_date').value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (startDate < today) {
                alert("Start date cannot be in the past.");
                return false;
            }
            if (endDate < today) {
                alert("End date cannot be in the past.");
                return false;
            }
            if (endDate < startDate) {
                alert("End date cannot be before start date.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
	
		
		
		
		
	