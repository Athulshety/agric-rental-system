<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Form</title>
		<link rel="stylesheet" href="homestyle.css">
		<style>
		body{
			background-image: url("C:\xampp\htdocs\tool_rental\bgimg.jpeg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
		.article {
			background-color: #34C759; 
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			max-width: 1000px; 
			margin: 40px auto;
		}
		.article p {
			font-size: 18px;
			color: #fff; 
			line-height: 1.5;
			margin-bottom: 20px;
		}
		.article p:first-child {
			margin-top: 0;
		}
		.article p:last-child {
			margin-bottom: 0;
		}
	</style>
	</head>
	<body>
		<header style="background-color:green;">
			<h2>Agriculture Tool Rental</h2>
			<nav>
				<a href="#">HOME</a>
				<a href="#">CONTACT</a>
				<a href="#">ABOUT</a>
			</nav>
			<div class="signinup">
				<button type="button" onclick="popup('login_popup');">LOGIN</button>
				<button type="button" onclick="popup('register_popup');">REGISTER</button>
			</div>
		</header>
		<article class="article">
			<p>
				An agriculture tool rental system provides a platform for farmers to rent the equipment they need for their agricultural operations. This system offers several benefits for both farmers promoting efficiency and accessibility within the agricultural sector.
			</p>
		</article>
		<div class="popup-cont" id="login_popup">
			<div class="popup">
				<form method="post" action="login.php">
					<h2>
						<span>LOGIN</span>
						<button type="reset" onclick="popup('login_popup');">X</button>
					</h2>
					<input type="text" placeholder="Username" name="uname" required>
					<input type="password" placeholder="Password" name="password" required>
					<button type="submit" class="login_btn" name="login_btn">LOGIN</button>
				</form>				
			</div>
		</div> 
		<div class="popup-cont" id="register_popup">
			<div class="popup">
				<form method="post" action="reg_ster.php">
					<h2>
						<span>REGISTRATION</span>
						<button type="reset" onclick="popup('register_popup');">X</button>
					</h2>
					<input type="text" placeholder="Username" name="uname">
					<input type="email" placeholder="Email" name="email">
					<input type="password" placeholder="Password" name="password">
					<input type="password" placeholder="Confirm Password" name="cpassword">
					<input type="text" placeholder="Location" name="loc">
					<button type="submit" class="login_btn" name="reg_btn">REGISTER</button>
				</form>				
			</div>
		</div>
		<script type="text/javascript">
			function popup(popup_name)
			{
				get_popup=document.getElementById(popup_name);
				if(get_popup.style.display==='flex')
				{
					get_popup.style.display='none';
				}
				else
				{
					get_popup.style.display='flex';
				}
			}
		</script>	
	</body>
</html>

