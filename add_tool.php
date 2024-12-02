<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools rent</title>
</head>
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
  background-color: #f0f0f0;
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
  border-radius:10px;
}
*{
	font-family:poppins;
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
    <h2>Add Tool Details</h2>
   <form action="" method="POST" enctype="multipart/form-data">
		<div class="tool_selection">
			<label for="toolName">Tool Id:</label>
			<input type="number" id="toolId" name="toolId" required>
			<label for="toolName">Tool Name:</label>
			<input type="text" id="toolName" name="toolName" required>
			<label for="toolSpecs">Discription:</label>
			<textarea id="toolSpecs" name="toolSpecs" rows="4" cols="34" required></textarea>
			<label for="toolPrice">Price:</label>
			<input type="number" id="toolPrice" name="toolPrice" required>
			<label for="toolImage">Tool Image:</label>
			<input type="file" id="toolImage" name="toolImage" accept="image/*" required>
			<input type="submit" name="submit" value="Save">
		</div>
	</form>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $toolId = $_POST['toolId'];
    $toolName = $_POST['toolName'];
    $toolSpecs = $_POST['toolSpecs'];
    $toolPrice = $_POST['toolPrice'];
    require 'dbconnection.php';
    $targetDir = 'uploads/';
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFile = $targetDir . basename($_FILES['toolImage']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType === 'jpg' || $imageFileType === 'jpeg' || $imageFileType === 'png') {
        if (move_uploaded_file($_FILES['toolImage']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO tool_details (tool_id, tool_name, tool_specifications, tool_image, tool_price) VALUES ('$toolId', '$toolName', '$toolSpecs', '$targetFile', '$toolPrice')";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Tool added successfully!'); window.location.href='admin_page.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "'); window.location.href='admin_page.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='admin_page.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid format, only JPG, JPEG, and PNG are allowed.'); window.location.href='admin_page.php';</script>";
    }
}
?>
