<?php
	if(isset($_POST['maloaiqua']))
		$maloaiqua=$_POST['maloaiqua'];	
	$strSQL="SELECT * FROM category WHERE category_id={$maloaiqua}";
	$loaiqua=mysqli_query($con,$strSQL);
	$row=mysqli_fetch_array($loaiqua);
?>

<form action="" method="post" name="sua_loaiqua" >
	<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
		<tr>
			<th colspan="2" >
				Sửa Tên Danh Mục
			</th>
		</tr>
		<tr>
			<td align="right"  height="50">
				<input name="tenloaiqua" type="text" value="<?php echo $row['category_name']; ?>" class="container__add-input" maxlength="30">
			</td>
			<td align="left"  height="50">
				<input name="trangchuyen" type="hidden" value="xl_loaiqua" />
				<input name="goihamxuly" type="hidden" value="sualoaiqua" />
				<input name="maloaiqua" type="hidden" value="<?php echo $row['category_id']; ?>" />
				<input type="submit" name="Submit" value="Cập Nhật" class="container__add-click">
			</td>
		</tr>
	</table>
</form>
