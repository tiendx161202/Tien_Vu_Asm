<?php
	$thongbao="";
		if(isset($_POST['goihamxuly']))
		{
			$lenhxuly=$_POST['goihamxuly'];		
			if($lenhxuly=='themqua')
				$thongbao=them_qua();	
			else if($lenhxuly=='xoaqua')
				$thongbao=xoa_qua();	
			else if($lenhxuly=='suaqua')
				$thongbao=sua_qua();				
		}


//ham xoa qua
function xoa_qua()
{
	global $con;
		if(isset($_POST['maqua']))
		$maqua=$_POST['maqua'];
		
		//kiem tra loai qua co ton tai trong chi tiet don dat hang nao khong
		$strSQL="SELECT COUNT(*) FROM order_details WHERE product_id ='{$maqua}'";
		$ctdathang=mysqli_query($con,$strSQL);
		$row=mysqli_fetch_array($ctdathang);
		if($row[0]>0)
			return "Bạn Không Thể Xóa Sản Phẩm Đã Có Trong Chi Tiết Hóa Đơn!";

		//neu khong co the xoa
		$strSQL="DELETE FROM product WHERE product_id={$maqua}";
		mysqli_query($con,$strSQL);
		return "Đã Xóa Thành Công!";
}	

//ham them qua
function them_qua()
{
	global $con;
		if(isset($_POST['tenqua']))
			$tenqua=$_POST['tenqua'];
			
		if(isset($_POST['loaiqua']))
			$loaiqua=$_POST['loaiqua'];
		
		if(isset($_POST['giaqua']))
			$giaqua=$_POST['giaqua'];

        if(isset($_POST['soluong']))
			$soluong=$_POST['soluong'];

        if(isset($_POST['chitiet']))
			$chitiet=$_POST['chitiet'];
			
		if(isset($_POST['mota']))
			$mota=$_POST['mota'];
			
		if(isset($_POST['hinhanh']))
			$hinhanh=$_POST['hinhanh'];
		
		if(isset($_POST['trangthai']))
			$trangthai=$_POST['trangthai'];
			
		//kiem tra xem ten qua co bi trung hay khong
		$strSQL="SELECT COUNT(*) FROM product WHERE product_name='{$tenqua}'";
		$qua=mysqli_query($con,$strSQL);
		$row=mysqli_fetch_array($qua);
		
		if($row[0]>0)
			return "Tên Sản Phẩm Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";

		//neu khong trung ten luu vao csdl
		$strSQL="INSERT INTO product(product_name,category_id,product_price,product_information,product_img,product_status,product_strock,product_detail) 
			VALUES ('{$tenqua}','{$loaiqua}','{$giaqua}','{$mota}','{$hinhanh}','{$trangthai}','{$soluong}','{$chitiet}')";
		mysqli_query($con,$strSQL);
			return "Thêm Thành Công Quả: {$tenqua} Vào Cơ Sở Dữ Liệu!";
		
}

//ham sua qua
function sua_qua()
{
	global $con;
    if(isset($_POST['maqua']))
        $maqua=$_POST['maqua'];

    if(isset($_POST['tenqua']))
        $tenqua=$_POST['tenqua'];
    
    if(isset($_POST['loaiqua']))
        $loaiqua=$_POST['loaiqua'];

    if(isset($_POST['giaqua']))
        $giaqua=$_POST['giaqua'];

    if(isset($_POST['soluong']))
        $soluong=$_POST['soluong'];

    if(isset($_POST['chitiet']))
        $chitiet=$_POST['chitiet'];
        
    if(isset($_POST['mota']))
        $mota=$_POST['mota'];
        
    if(isset($_POST['hinhanh']))
        $hinhanh=$_POST['hinhanh'];

    if(isset($_POST['trangthai']))
        $trangthai=$_POST['trangthai'];
			
		$strSQL="UPDATE product SET product_name='{$tenqua}',category_id='{$loaiqua}',product_price='{$giaqua}',product_information='{$mota}',product_img='{$hinhanh}',product_status='{$trangthai}',product_strock='{$soluong}',product_detail='{$chitiet}' WHERE product_id={$maqua}";
		mysqli_query($con,$strSQL);
			return "Thay Đổi Thành Công!";
		
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
<center><a href="#" onclick="adm_chuyentrang('quanlyqua')">Quay Về Trang Sản Phẩm</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>