<?php
	$thongbao="";
	if(isset($_POST['goihamxuly']))
	{
		$lenhxuly=$_POST['goihamxuly'];
		if($lenhxuly=='xoaloaiqua')
			$thongbao=xoa_loaiqua();
		else if($lenhxuly=='themloaiqua')
			$thongbao=them_loaiqua();
		else if($lenhxuly=='sualoaiqua')
			$thongbao=sua_loaiqua();
	}

// ham them loai qua
function them_loaiqua()
{
	global $con;
	if(isset($_POST['tenloaiqua']))
		$tenloaiqua=$_POST['tenloaiqua'];
	//kiem tra loai qua co trung ten voi loai qua da co hay ko
		$strSQL="SELECT COUNT(*) FROM category WHERE category_name ='{$tenloaiqua}'";
		$category=mysqli_query($con,$strSQL);
		$row=mysqli_fetch_array($category);
		if($row[0]>0)
			return "Loại Quả Này Đã Tồn Tại! Bạn Hãy Chọn Tên Khác";
	//neu khong trung ten luu vao csdl
		$strSQL="INSERT INTO category(category_name) VALUES('{$tenloaiqua}')";
		mysqli_query($con,$strSQL);
			return "Thêm Thành Công Loại Quả: {$tenloaiqua} Vào Cơ Sở Dữ Liệu!";
}

// ham sua loai qua
function sua_loaiqua()
{	
	global $con;
	if(isset($_POST['maloaiqua']))
		$maloaiqua=$_POST['maloaiqua'];
	if(isset($_POST['tenloaiqua']))
		$tenloaiqua=$_POST['tenloaiqua'];
	//kiem tra loai qua co trung ten voi loai qua da co hay ko
		$strSQL="SELECT COUNT(*) FROM category WHERE category_name ='{$tenloaiqua}'";
		$category=mysqli_query($con,$strSQL);
		$row=mysqli_fetch_array($category);
		if($row[0]>0)
			return "Loại Quả Này Đã Tồn Tại! Bạn Hãy Chọn Tên Khác";
	//neu khong trung ten luu vao csdl	
		$strSQL="UPDATE category SET category_name='{$tenloaiqua}' WHERE category_id={$maloaiqua}";
		mysqli_query($con,$strSQL);	
			return "Thay Đổi Thành Công!";
}

// ham xoa loai qua
function xoa_loaiqua()
{
	global $con;
	if(isset($_POST['maloaiqua']))
		$maloaiqua=$_POST['maloaiqua'];
	//kiem tra xem loai qua co lien quan den 
	$strSQL="SELECT COUNT(*) FROM product WHERE category_id={$maloaiqua}";
	$product=mysqli_query($con,$strSQL);
	$row=mysqli_fetch_array($product);
	
	if($row[0]>0)
		return "Không Thể Xóa Loại Quả Đã Có Sản Phẩm";
	//neu khong co qua lien quan thi co the xoa
	$strSQL="DELETE FROM category WHERE category_id={$maloaiqua}";
	mysqli_query($con,$strSQL);
		return "Đã Xóa Thành Công!";
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
<center><a href="#" onclick="adm_chuyentrang('quanlyloaiqua')">Bấm Vào Đây Để Về Trang Quản Lý Loại Quả</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>
