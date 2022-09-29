
<?php
$thongbao="";
	if(isset($_POST['goihamxuly']))
	{
		$lenhxuly=$_POST['goihamxuly'];
		if($lenhxuly=='xoakhachhang')
			$thongbao=xoa_khachhang();
		
	}

//ham xoa khach hang
function xoa_khachhang()
{
	global $con;
	if(isset($_POST['makhachhang']))
		$makhachhang=$_POST['makhachhang'];
	
	$strSQL="DELETE FROM customer WHERE customer_id={$makhachhang}";
	mysqli_query($con,$strSQL);
	
	return "Bạn Đã Xóa Thành Công Khách Hàng Này!";
}

//in thong bao
if($thongbao !="")
{
echo "<div class='thong_bao'>";
	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo "<p class='pp'><center><span style='color:#FF9900;'>{$thongbao}</span>"; 
				echo "<br />";
				echo "<br />";
?>
<center><a href="#" onclick="adm_chuyentrang('quanlykhachhang')">Bấm Vào Đây Để Về Trang Quản Lý Khách Hàng</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>

?>
