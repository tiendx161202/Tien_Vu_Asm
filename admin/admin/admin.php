<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    if($_SESSION['phanquyen']!='admin')
    {
    ?>
        <p>Bạn Không Đủ Quyền Quản Lý Mục Này
        <br>
        <a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a>
        </p>
<?php
    }
    else
    {
        $strSQL="SELECT * FROM admin ORDER BY admin_id desc";
        $admin=mysqli_query($con,$strSQL);
?>

<div class="container__admin">
	<div class="container__add">
		<a href="#" onclick="themsua_admin('them_admin')" class="container__add-click">Thêm Quản Trị Viên</a>
	</div>
</div>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="main__admin-table">
	<tr>
		<th width="10%" align="center">
            STT
		</th>
		<th width="35%" align="center">
			Họ tên
		</th>
		<th width="25%">
			Tên đăng nhập
		</th>
		<th width="30%" colspan="3" align="center">
			Chức năng
		</th>
	</tr>

	<?php $i=0; ?>
	<?php while($row=mysqli_fetch_array($admin)) { $i+=1; ?>

	<tr>
		<?php 
			//xu ly mau cho dong
			if($i%2==0) 
				$mausac="style='background:#F8F8F8;'";
			else 
				$mausac="style='background:#FFFFFF;'";
		?>
		<td <?php echo $mausac; ?> align="center">
			<?php echo $i; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="chitiet_admin(<?php echo $row['admin_id']; ?>)" class="margin-left"><?php echo $row['admin_fullname']; ?> </a>
		</td>
        <td <?php echo $mausac; ?> align="center">
			<?php echo $row['admin_username']; ?>
        </td>
        <td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="chitiet_admin('<?php echo $row['admin_id']; ?>')">
				<i class="fa-sharp fa-solid fa-book"></i> Chi tiết
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="themsua_admin('sua_admin',<?php echo $row['admin_id']; ?>)">
				<i class="fa-solid fa-pen-to-square"></i> Sửa
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="xoa_admin(<?php echo $row['admin_id']; ?>)">
				<i class="fa-solid fa-trash"></i> Xóa
			</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php } ?>

<form action="" method="post" name="themsua_adm">
	<input name="maadmin" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyadmin" />
</form>

<form action="" method="post" name="xoaadmin">
	<input name="maadmin" type="hidden" value="" />
	<input name="goihamxuly" type="hidden" value="xoaadmin" />
	<input name="trangchuyen" type="hidden" value="xl_admin" />
</form>

<form name="ct_admin" action="" method="post">
	<input type="hidden" name="maadmin" value="" />
	<input name="trangchuyen" type="hidden" value="chitiet_admin" />
</form>

<script>
	function themsua_admin(trangden,mah)
	{
		themsua_adm.trangchuyen.value=trangden
		themsua_adm.maadmin.value=mah
		themsua_adm.submit()
	}
	function xoa_admin(mah)
	{
		xoaadmin.maadmin.value=mah
		if(confirm('Bạn có thực sự muốn xóa không!'))
		xoaadmin.submit()
	}
	function chitiet_admin(trangden,mah)
	{
		ct_admin.maadmin.value=trangden
		ct_admin.submit()
	}
</script>


<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlyqua" />
</form>

<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>