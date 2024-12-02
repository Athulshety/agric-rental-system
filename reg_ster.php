<?php
	if(isset($_POST['reg_btn'])){
		$uname=trim($_POST['uname']);
		$email=trim($_POST['email']);
		$password=trim($_POST['password']);
		$cpassword=trim($_POST['cpassword']);
		$location=trim($_POST['loc']);
		$error=array();
		if(empty($uname))
			$error[]="User name is required";
		if(empty($email))
			$error[]="Email is required";
		if(empty($password))
			$error[]="Password is required";
		if(empty($cpassword))
			$error[]="Confirm password is required";
		if(empty($location))
			$error[]="Location is required";
		if(!empty($_POST['password'])){
			if($_POST['password'] != $_POST['cpassword']) {
				$error[]="Password cannot match with Confirm password";
			}
		}
		if(empty($error)){
			$connection=@mysqli_connect('localhost','root','','project');
			$query="select * from user where username='$uname'";
			$exe=mysqli_query($connection,$query);
			$row=mysqli_num_rows($exe);
			if($row==0){
				$qry="INSERT INTO user (username,password,email,location) VALUES('$uname','$password','$email','$location')";
				$execute=mysqli_query($connection,$qry);
				if($execute){
					echo "<script>alert('Registration Successful');window.location.href='homepage.php';</script>";
				}
				else{
					echo "<script>alert('Registration Unsucessful');window.location.href='homepage.php';</script>";
				}
			}
			else{
				echo "<script>alert('User already exist');window.location.href='homepage.php';</script>";
			}
		}
		else{
			foreach($error as $er){
				echo "<script>alert($er);window.location.href='homepage.php';</script>";
			}
		}
	}						
?>