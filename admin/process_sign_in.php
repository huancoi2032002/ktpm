<?php 
    require "../admin/config.php";
    session_start();
    if($_POST['type']==2){
		$account_name = $_POST['account_name'];
		$password = $_POST['password'];
		$check = mysqli_query($conn,"SELECT * FROM customer where account_name='$account_name' and password='$password'and account_type = 0");
		$check_admin = mysqli_query($conn,"SELECT * FROM customer where account_name='$account_name' and password='$password'and account_type = 1");
		$row  = mysqli_fetch_array($check);
		$row_admin = mysqli_fetch_array($check_admin);
		if ($row>0)
		{
			$_SESSION['customer_id'] = $row['customer_id'];
			$_SESSION['account_name'] = $row['account_name'];
			$_SESSION['customer_name'] = $row['customer_name'];
			$_SESSION['phone_number'] = $row['phone_number'];
			$_SESSION['address'] = $row['address'];
			echo json_encode(array("statusCode"=>200));
		}else if($row_admin){
			$_SESSION['account_name'] = $row['account_name'];
			echo json_encode(array("statusCode"=>201));
		}else{
			echo json_encode(array("statusCode"=>202));
		}
		mysqli_close($conn);
	}
?>