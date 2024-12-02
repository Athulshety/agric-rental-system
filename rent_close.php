<?php
if(isset($_POST['close'])){
		$id=$_POST['id'];
		require 'dbconnection.php';
		$qry="select * from bookings";
		$exe=mysqli_query($con,$qry);
		$row=mysqli_num_rows($exe);
		if($row!=0){
			$rec=mysqli_fetch_assoc($exe);
			$uqry="delete from bookings where tran_id=".$id."";
			$uexe=mysqli_query($con,$uqry);
			if($uexe){
				$upqry="update tool_details set tool_status='Available' where tool_id=".$rec['tool_id']."";
				$upexe=mysqli_query($con,$upqry);
				echo "<script>alert('Successfully unrent');window.location.href='trans_detail.php';</script>";
			}
		
		}else{
			echo "<script>alert('transaction id does not exit');window.location.href='trans_detail.php';</script>";
		}
	}
?>