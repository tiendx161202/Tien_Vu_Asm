<?php
	if (isset($_POST['madonhang']))
	{
		$madonhang =$_POST['madonhang'];
		$strSQL = "SELECT * FROM the_order WHERE order_id = {$madonhang}";
		$donhang = mysqli_query($con,$strSQL);
		$rowDH=mysqli_fetch_array($donhang);
		$makhachhang=$rowDH['customer_id'];
		//lay khach hang
		$strSQL="SELECT * FROM customer WHERE customer_id = {$makhachhang}";
		$khachhang = mysqli_query($con,$strSQL);
		$rowKH=mysqli_fetch_array($khachhang);
	}
?>

