<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:homepage.php");
		exit;
	}
	require 'dbconnection.php';
	$qry="select * from tool_details";
	$res=mysqli_query($con,$qry);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.card {
  border: none;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
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
  font-size: 18px;
  margin-bottom: 10px;
}

.card-text {
  font-size: 16px;
  color: #666;
}

.card-text strong {
  font-weight: bold;
  color: #333;
}

.btn-primary {
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #444;
}
header {
  background-color: #34C759;
  padding: 20px;
  border-bottom: 1px solid #333;
  border-radius:10px;
}

header h1 {
  font-weight: bold;
  font-size: 24px;
  color: #fff; 
  margin-bottom: 0;
}

header a.btn-danger {
  background-color: red;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

header a.btn-danger:hover {
  background-color: #darkred; 
}
	</style>
</head>
<body>
	<div class="container">
			<header class="d-flex justify-content-between align-items-center mb-4">
				<h1 class="my-0">Agriculture Tool Rental</h1>
				<form method="get" action="">
					<input type="submit" class="btn btn-danger" name="logout" value="Logout">
				</form>
			</header>
			<div class="row">
				<?php while($row=mysqli_fetch_assoc($res)){?>
					<div class="col-md-4">
						<div class="card">
							<img src="<?php echo $row['tool_image'];?>" class="card-img-top" alt="<?php echo $row['tool_name'];?>">
								<div class="card-body">
									<h5 class="card-title"><?php echo $row['tool_name'];?></h5>
									<p class="card-text"><?php echo $row['tool_specifications'];?></p>
									<p class="card-text"><strong>₹<?php echo $row['tool_price'];?>/day</strong></p>
									<p class="card-text" id="status"><strong><?php echo $row['tool_status'];?></strong></p>
									<a href="book.php?id=<?php echo $row['tool_id'];?>" class="btn btn-primary" id="book">Book Now</a>
								</div>
						</div>
					</div>
				<?php } ?>
			</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		const cards = document.querySelectorAll('.card');
			cards.forEach((card) => {
			const status = card.querySelector('#status');
			const link = card.querySelector('#book');
			if (status.textContent === 'Not Available') {
				card.style.display='none';
		}
	});
</script>
	</script>
</body>
</html>						
<?php
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header("location:homepage.php");
		exit;
	}
?>