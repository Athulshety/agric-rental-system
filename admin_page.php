<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:homepage.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools </title>
	<style>
		body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: green;
  color: #fff;
  padding: 20px;
  text-align: center;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h2 {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

nav a {
  color: #fff;
  text-decoration: none;
  margin-right: 20px;
}

.signinup {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.signinup button[type="submit"] {
  background-color: Salmon;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.signinup button[type="submit"]:hover {
  background-color: #555;
}

.admin_dashboard {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.admin_dashboard form {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  flex-direction:column;
}

.admin_dashboard input[type="submit"] {
  background-color: Tomato;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin: 10px;
  font-weight:bold;
}

.admin_dashboard input[type="submit"]:hover {
  background-color: Chocolate;
}

/* Responsive Design */

@media (max-width: 768px) {
  header {
    flex-direction: column;
  }
  nav {
    flex-direction: column;
    align-items: center;
  }
  .signinup {
    justify-content: center;
  }
  .admin_dashboard {
    padding: 10px;
  }
}

@media (max-width: 480px) {
  header h2 {
    font-size: 18px;
  }
  nav a {
    margin-right: 10px;
  }
  .signinup button[type="submit"] {
    padding: 5px 10px;
  }
  .admin_dashboard input[type="submit"] {
    padding: 5px 10px;
  }
}
</style>
</head>
<body>
		<header>
			<h2>AgriTool</h2>
			<nav>
				<a href="#">HOME</a>
				<a href="#">CONTACT</a>
				<a href="#">ABOUT</a>
			</nav>
			<div class="signinup">
			<form action="" method="get">
				<button type="submit" name="logout">LOGOUT</button>
			</form>
			</div>
		</header> 
    <div class="admin_dashboard">
		<center>
		<form method="POST" action="">
			<input type="submit" name="add_tool" value="ADD NEW TOOLS">
			<input type="submit" name="dlt_tool" value="DELETE TOOLS">
			<input type="submit" name="trans" value="RENTING DETAIL">
			<input type="submit" name="display_tool" value="DISPLAY ALL TOOLS">
		</form>
		</center>
	</div>
</body>
</html>

<?php
	if(isset($_POST['add_tool'])){
		header("Location: add_tool.php");
	}
	elseif(isset($_POST['trans'])){
		header("Location: trans_detail.php");
	}
	elseif(isset($_POST['dlt_tool'])){
		header("Location: delete_tool.php");
	}
	elseif(isset($_POST['display_tool'])){
		header("Location: display_tool.php");
	}
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header("location:homepage.php");
		exit;
	}
?>
