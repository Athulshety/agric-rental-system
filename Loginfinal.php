<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
}

.container {
    width: 300px;
    padding: 40px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
   
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 60%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: peru;
    color: #fff;
    cursor: pointer;
    margin-left: 60px;
}
</style>
</head>
<body>


<div class="container">
    <h2>Login</h2>
    <form id="loginForm" action="" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login">
        </div>
    </form>
</div>

</body>
</html>
<?php
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cn=mysqli_connect('localhost','root','','car-rent-login');
		$qry="select * from user_login where user_name='$username' and password='$password'";
		$rs=mysqli_query($cn,$qry);
		$r=mysqli_num_rows($rs);
		if($r!=0){
			if($username=="User"){
				header("Location: home.html");
				exit();
			}
			elseif($username=="Admin"){
				header("Location: admin_page.php");
				exit();
			}
		}
		else{
			echo  "<script>alert('Invalid username and password')</script>";
		}
	}
?>