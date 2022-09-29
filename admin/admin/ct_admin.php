<?php
	if(isset($_POST['maadmin']))
	{
		$maadmin=$_POST['maadmin'];
		$strSQL="SELECT * FROM admin WHERE admin_id={$maadmin}";
		$admin=mysqli_query($con,$strSQL);
		$row_admin=mysqli_fetch_array($admin);

        $phanquyen=$row_admin['admin_level'];
        if($phanquyen==1)
            $phanquyen="Admin";
        else if($phanquyen==2)
            $phanquyen="Quản Trị Viên";

		$gioitinh=$row_admin['admin_sex'];
        if($gioitinh==1)
            $gioitinh="Nam";
        else if($gioitinh==2)
            $gioitinh="Nữ";
        else
            $gioitinh="Không Xác Định";
	}
?>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-detail">
    <tr>
		<th colspan="2">
			Thông Tin Chi Tiết Quản Trị Viên: <?php echo $row_admin['admin_fullname']; ?>
		</th>
	</tr>
    <tr>
		<td width="250" >
            <div class="form__ct">Tên đăng nhập</div>
		</td>
		<td width="650">
            <div class="form__ct"><?php echo $row_admin['admin_username']; ?></div>
		</td>
	</tr>
	<tr>
		<td >
            <div class="form__ct">Mật khẩu </div>
		</td>
		<td>
            <div class="form__ct"><?php echo $row_admin['admin_password']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Quyền hạn</div>
		</td>
        <td>
            <div class="form__ct">
                <?php echo $phanquyen ?>
            </div>
        </td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Họ tên</div>
		</td>
		<td>
			<div class="form__ct"><?php echo $row_admin['admin_fullname']; ?></div>
		</td>
	</tr>
    <tr>
		<td width="250" >
            <div class="form__ct">Giới tính</div>
		</td>
		<td width="650">
            <div class="form__ct"><?php echo $gioitinh ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">SĐT</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $row_admin['admin_phone']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Địa chỉ</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $row_admin['admin_address']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Email</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $row_admin['admin_email']; ?></div>
		</td>
</tr>
</table>

<form name="khachhang" method="post" action="">
	<input name="maadmin" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xl_khachhang" />
	<input name="goihamxuly" type="hidden" value="xoakhachhang" />
</form>

<script>
    function xoa_khachhang(maadmin)
        {
            khachhang.maadmin.value=maadmin
            if(confirm("Bạn có thực sự muốn xóa khách hàng này không?"))
            khachhang.submit()
        }
</script>