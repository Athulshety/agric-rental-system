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
.close {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="number"] {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #444;
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
<div class="close">
	<form method="post" action="rent_close.php">
		<input type="number" name="id" placeholder="Enter transaction Id" required>
		<input type="submit" name="close" value="Close the rent">
	</form>
</div>
<div class="table">
<?php
  $con = mysqli_connect('localhost', 'root', '', 'project');
  if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $qry = "SELECT * FROM bookings";
  $exe = mysqli_query($con, $qry);
  $res = mysqli_num_rows($exe);
  if ($res != 0) {
    echo "<table align='center'>";
	echo "<tr>";
    echo "<th>TRANSACTION ID</th><th>USERNAME</th><th>TOOL ID</th><th>START DATE</th><th>END DATE</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($exe)) {
		echo "<tr><td>" . $row['tran_id'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['tool_id'] . "</td>";
		echo "<td>" . $row['start_date'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td></tr>";
	}
    echo "</table>";
  }
  else {
    echo "<script>alert('Transaction does not exist');window.location.href='admin_page.php';</script>";
  }
?>
</div>
</body>
</html>