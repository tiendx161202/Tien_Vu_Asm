<?php
$thongbao="";
	if(isset($_POST['goihamxuly']))
	{
		$lenhxuly=$_POST['goihamxuly'];
		if($lenhxuly=='xoadonhang')
			$thongbao=xoa_donhang();
		
	}

//ham xoa don dat hang
function xoa_donhang()
{
    global $con;
	if(isset($_POST['madonhang']))
		$madonhang=$_POST['madonhang'];
	
	//xoa don dat hang
	$strSQL="DELETE FROM the_order WHERE order_id={$madonhang}";
	mysqli_query($con,$strSQL);
	
	//xoa mat hang khoi chi tiet dat hang
	$strSQL="DELETE FROM order_detail WHERE order_id={$madonhang}";
	mysqli_query($con,$strSQL);
	
	return"Bạn Đã Xóa Thành Công Đơn Đặt Hàng này!";
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
<center><a href="#" onclick="adm_chuyentrang('quanlydondathang')">Bấm Vào Đây Để Về Trang Quản Lý Đơn Hàng</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>

?>