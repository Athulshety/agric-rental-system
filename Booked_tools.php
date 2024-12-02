<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
	
		.cars-table{
			display:flex;
			z-index:1;
		}
        table {
            width: 70%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
		td img{
			width:100%;
			height:100%;
		}
    </style>

</head>
<body>
	<div class="upper-logo">
        <h1>Agricultural Tools</h1>
        <img src="./Assets/car-logo1.png" width="150" alt="">
    </div>

    
        <div class="navigation_bar">
            <div class="home">
                <a href="./home.html">
                    <h4>Home</h4>
                </a>
            </div>

            <div class="search">
                <h4>Search</h4>
                <input type="text" width="200" height="5" style="color: black;">
                <div class="search-icon">
                    <img src="./Assets/search_icon.png" alt="">
                </div>
            </div> 
            <div class="about">
                <a href="prgz1.html">About</a>
            </div>

            <div class="login-page">
                <a href="Loginfinal.php" style="font-weight: bold;">Login</a>
            </div>
        </div>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'images_db');
$sql = "SELECT * FROM tool_details where tool_status='Booked'";
$result = mysqli_query($conn, $sql);
echo '<table border="1">';
echo '<tr><th>Tool Name</th><th>Image</th><th>Specifications</th><th>Price</th><th>Status</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
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
</body>
</html>