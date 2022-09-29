
<?php
	$strSQL="SELECT * FROM category";
	$loai_qua=mysqli_query($con,$strSQL);
	
	//phan hien thi trang them va sua
	if(isset($_POST['chentrang']))
	{
		$chucnang=$_POST['chentrang'];
		if($chucnang=='them_loaiqua')
			include_once('them_loaiqua.php');
		if($chucnang=='sua_loaiqua')
			include_once('sua_loaiqua.php');
	}
?>

<div class="container__category">
	<div class="container__add">
		<a href="#" onclick="goithem_sua('them_loaiqua')" class="container__add-click">Thêm Danh Mục Mới</a>
	</div>
</div>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="main__admin-table">
	<tr>
		<th width="10%" align="center">
            STT
		</th>
		<th width="15%" align="center">
			ID
		</th>
		<th width="45%">
			Tên loại quả
		</th>
		<th width="30%" colspan="2" align="center">
			Chức năng
		</th>
	</tr>

	<?php $i=0; ?>
	<?php while($row=mysqli_fetch_array($loai_qua)) { $i+=1; ?>

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
		<td <?php echo $mausac; ?> align="center">
			#<?php echo $row['category_id']; ?>
		</td>
		<td <?php echo $mausac; ?>>
			<a href="#"  onclick="goithem_sua('sua_loaiqua',<?php echo $row['category_id']; ?>)" class="margin-left"><?php echo $row['category_name']; ?> </a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="goithem_sua('sua_loaiqua',<?php echo $row['category_id']; ?>)">
				<i class="fa-solid fa-pen-to-square"></i> Sửa
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="xoa_loaiqua(<?php echo $row['category_id']; ?>)" class="delete">
				<i class="fa-solid fa-trash"></i> Xóa
			</a>
		</td>
	</tr>
	<?php } ?>
</table>

<form action="" method="post" name="loaiqua">
	<input name="maloaiqua" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xl_loaiqua" />
	<input name="goihamxuly" type="hidden" value="xoaloaiqua" />
</form>

<form action="" method="post" name="them_sua">
	<input name="chentrang" type="hidden" value="" />
	<input name="maloaiqua" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyloaiqua" />
</form>

<script>
	function xoa_loaiqua(maloaiqua)
	{
		loaiqua.maloaiqua.value=maloaiqua
		if(confirm('Bạn có muốn xóa mục này không..!'))
		loaiqua.submit()
	}
	function goithem_sua(trangthem,maloaiqua)
	{
		them_sua.chentrang.value=trangthem
		them_sua.maloaiqua.value=maloaiqua
		them_sua.submit()
	}
</script>
