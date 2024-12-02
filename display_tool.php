<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Tools rent</title>
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
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}


.table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table th {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

.table th:first-child {
  border-top-left-radius: 10px;
}

.table th:last-child {
  border-top-right-radius: 10px;
}

.table tr {
  border-bottom: 1px solid #ddd;
}

.table tr:hover {
  background-color: #f5f5f5;
}

.table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

.table td:first-child {
  border-top-left-radius: 10px;
}

.table td:last-child {
  border-top-right-radius: 10px;
}

.table td:hover {
  background-color: #f5f5f5;
}

.table td:hover:first-child {
  border-top-left-radius: 10px;
}

.table td:hover:last-child {
  border-top-right-radius: 10px;
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
<div class="table">
	<?php
		$conn = mysqli_connect('localhost', 'root', '', 'project');
		$qry = "SELECT * FROM tool_details";
		$exe = mysqli_query($conn, $qry);
		echo '<table border="1" align="center">';
		echo '<tr><th>Tool Name</th><th>Image</th><th>Specifications</th><th>Price</th><th>Status</th></tr>';
		while ($row = mysqli_fetch_assoc($exe)) {
			echo '<tr>';
			echo '<td>' . $row['tool_name'] . '</td>';
			echo '<td><img src="' . $row['tool_image'] . '" width="100" height="100"></td>';
			echo '<td>' . $row['tool_specifications'] . '</td>';
			echo '<td>' . $row['tool_price'] . '</td>';
			echo "<td style='color:green;'>" . $row['tool_status'] . "</td>";
			echo '</tr>';
		}
		echo '</table>';
		mysqli_close($conn);
	?>
	</div>
</body>
</html>