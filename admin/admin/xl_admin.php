<?php
	$thongbao="";
		if(isset($_POST['goihamxuly']))
		{
			$lenhxuly=$_POST['goihamxuly'];		
			if($lenhxuly=='them_admin')
				$thongbao=them_admin();	
            else if($lenhxuly=='sua_admin')
                $thongbao=sua_admin();				
			else if($lenhxuly=='xoaadmin')
				$thongbao=xoa_admin();	
		}


//ham xoa admin
function xoa_admin()
{
	global $con;
		if(isset($_POST['maadmin']))
		$maadmin=$_POST['maadmin'];
		
		//kiem tra quyen han
        if($maadmin=='1')
            return "Không thể xóa Admin";

		//co the xoa
		$strSQL="DELETE FROM admin WHERE admin_id='{$maadmin}'";
		mysqli_query($con,$strSQL);
		return "Đã Xóa Thành Công!";
}	

//ham them qua
function them_admin()
{
	global $con;
		if(isset($_POST['tendangnhap']))
			$tendangnhap=$_POST['tendangnhap'];
			
		if(isset($_POST['matkhau']))
			$matkhau=$_POST['matkhau'];
		
		if(isset($_POST['hoten']))
			$hoten=$_POST['hoten'];

        if(isset($_POST['gioitinh']))
			$gioitinh=$_POST['gioitinh'];

        if(isset($_POST['phone']))
			$phone=$_POST['phone'];

        if(isset($_POST['diachi']))
			$diachi=$_POST['diachi'];
			
		if(isset($_POST['email']))
			$email=$_POST['email'];
			
		//kiem tra xem ten qua co bi trung hay khong
		$strSQL="SELECT COUNT(*) FROM admin WHERE admin_username='{$tendangnhap}'";
		$admin=mysqli_query($con,$strSQL);
		$row=mysqli_fetch_array($admin);
		
		if($row[0]>0)
			return "Tên Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";

		//neu khong trung ten luu vao csdl
		$strSQL="INSERT INTO admin(admin_username,admin_password,admin_level,admin_fullname,admin_sex,admin_phone,admin_address,admin_email) 
			VALUES ('{$tendangnhap}','{$matkhau}','2','{$hoten}','{$gioitinh}','{$phone}','{$diachi}','{$email}')";
		mysqli_query($con,$strSQL);
			return "Thêm Thành Công Quả: {$tendangnhap} Vào Cơ Sở Dữ Liệu!";
		
}

//ham sua qua
function sua_admin()
{
	global $con;
	if(isset($_POST['maadmin']))
		$maadmin=$_POST['maadmin'];
	
	if(isset($_POST['matkhau']))
		$matkhau=$_POST['matkhau'];

	if(isset($_POST['hoten']))
		$hoten=$_POST['hoten'];

	if(isset($_POST['gioitinh']))
		$gioitinh=$_POST['gioitinh'];

	if(isset($_POST['phone']))
		$phone=$_POST['phone'];

	if(isset($_POST['diachi']))
		$diachi=$_POST['diachi'];
		
	if(isset($_POST['email']))
		$email=$_POST['email'];
		
	$strSQL="UPDATE admin SET admin_password='{$matkhau}',admin_fullname='{$hoten}',admin_sex='{$gioitinh}',admin_phone='{$phone}', admin_address='{$diachi}',admin_email='{$email}' WHERE admin_id={$maadmin}";
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
<center><a href="#" onclick="adm_chuyentrang('quanlyadmin')">Bấm Vào Đây Để Về Trang Quản Lý Admin</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>