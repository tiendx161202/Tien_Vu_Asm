<?php
	if(isset($_POST['makhachhang']))
	{
		$makhachhang=$_POST['makhachhang'];
		$strSQL="SELECT * FROM customer WHERE customer_id={$makhachhang}";
		$khachhang=mysqli_query($con,$strSQL);
		$rowKH=mysqli_fetch_array($khachhang);
		
		// $gioitinh=$rowKH['customer_sex'];
		// 	if($gioitinh==1)
		// 		$gioitinh="Nam";
		// 	else if($gioitinh==2)
		// 		$gioitinh="Nữ";
		// 	else
		// 		$gioitinh="Không Xác Định";
	}
?>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-detail">
    <tr>
		<th colspan="2">
			Thông Tin Chi Tiết Khách Hàng: <?php echo $rowKH['customer_name']; ?>
		</th>
	</tr>
    <tr>
		<td width="250" >
            <div class="form__ct">Mã khách hàng</div>
		</td>
		<td width="650">
            <div class="form__ct"><?php echo $rowKH['customer_id']; ?></div>
		</td>
	</tr>
	<tr>
		<td >
            <div class="form__ct">Tên khách hàng </div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowKH['customer_name']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">SDT</div>
		</td>
		<td>
			<div class="form__ct"><?php echo $rowKH['customer_phone']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Địa chỉ</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowKH['customer_address']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Email</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowKH['customer_email']; ?></div>
		</td>
	</tr>
	<!-- <tr>
		<td >
            <div class="form__ct">Giới tính</div>
		</td>
		<td>
            <div class="form__ct">div>
		</td>
	</tr> -->
	<tr>
		<td >
            <div class="form__ct">Tên đăng nhập</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowKH['customer_username']; ?></div>
		</td>
	</tr>
	<tr>
		<td >
            <div class="form__ct">Mật khẩu</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowKH['customer_password']; ?></div>
		</td>
	</tr>
</table>

<form name="khachhang" method="post" action="">
	<input name="makhachhang" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xl_khachhang" />
	<input name="goihamxuly" type="hidden" value="xoakhachhang" />
</form>

<script>
    function xoa_khachhang(makhachhang)
        {
            khachhang.makhachhang.value=makhachhang
            if(confirm("Bạn có thực sự muốn xóa khách hàng này không?"))
            khachhang.submit()
        }
</script>