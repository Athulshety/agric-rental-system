<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools rent</title>
    <link rel="stylesheet" href="homestyle.css">
	<style>
		body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.page-head {
  background-color: #333;
  color: #fff;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.upper-logo {
  font-size: 24px;
  font-weight: bold;
}

.home {
  margin-left: 20px;
}

.home a {
  color: #fff;
  text-decoration: none;
}

.home a:hover {
  color: #ccc;
}



.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-top: 0;
  font-size: 24px;
  font-weight: bold;
  color: #333;
}

.tool_selection {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.tool_selection label {
  width: 25%;
  margin-bottom: 10px;
}

.tool_selection input, textarea {
  width: 70%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
}

.tool_selection input[type="file"] {
  padding: 10px 0;
}

.tool_selection input[type="submit"] {
  background-color: SpringGreen;
  color: #000;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weigth:bold;
}

.tool_selection input[type="submit"]:hover {
  background-color: BlueViolet;
}

@media (max-width: 768px) {
  .container {
    padding: 10px;
  }
  .tool_selection label {
    width: 50%;
  }
  .tool_selection input, textarea {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .upper-logo {
    flex-direction: column;
  }
  .upper-logo img {
    margin-left: 0;
  }
  .container {
    padding: 5px;
  }
  .tool_selection label {
    width: 100%;
  }
}
	</style>
</head>

<body>
<div class="page-head">
    <div class="upper-logo">
        <h1>Agriculture  tools</h1>
    </div>
	<div class="home">
        <a href="admin_page.php">HOME</a>
    </div>
</div>

<div class="container">
    <h2>Delete Tool</h2>
   <form action="" method="POST" enctype="multipart/form-data">
		<div class="tool_selection">
			<label for="toolName">Tool Id:</label>
			<input type="text" id="toolId" name="toolId" required>
			<input type="submit" name="delete" value="DELETE">
		</div>
	</form>
</div>
</body>
</html>
<?php
	include_once('dbconnection.php');
	if(isset($_POST['delete'])){
		$toolId=$_POST['toolId'];
		$qry="delete from tool_details where tool_id=".$toolId."";
		$exe=mysqli_query($con,$qry);
		if($exe){
			echo "<script>alert('Tool delete successfully');window.location.href='admin_page.php';</script>";
		}
		else{
			echo "<script>alert('Tool doesnot exist');window.location.href='delete_tool.php';</script>";
		}
	}
?>
			
		
		
