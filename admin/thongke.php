<?php
	//dem so loai qua
	$strSQL="SELECT COUNT(*) FROM category";
	$so_loai_qua=mysqli_query($con,$strSQL);
	$rowloai=mysqli_fetch_array($so_loai_qua);
	$soloaiqua=$rowloai[0];

	//dem so qua
	$strSQL="SELECT COUNT(*) FROM product";
	$so_qua=mysqli_query($con,$strSQL);
	$rowqua=mysqli_fetch_array($so_qua);
	$soqua=$rowqua[0];

	//dem so khach hang
	$strSQL="SELECT COUNT(*) FROM customer";
	$khach_hang=mysqli_query($con,$strSQL);
	$rowKHACH=mysqli_fetch_array($khach_hang);
	$khachhang=$rowKHACH[0];

	//dem so tin tuc
	$strSQL="SELECT COUNT(*) FROM news";
	$tin_tuc=mysqli_query($con,$strSQL);
	$rowTIN=mysqli_fetch_array($tin_tuc);
	$tintuc=$rowTIN[0];

	//dem so don dat hang
	$strSQL="SELECT COUNT(*) FROM the_order";
	$donhang=mysqli_query($con,$strSQL);
	$rowDH=mysqli_fetch_array($donhang);
	$donhang=$rowDH[0];
?>