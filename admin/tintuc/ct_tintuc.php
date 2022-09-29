<?php
	if(isset($_POST['matintuc']))
	{
		$matintuc=$_POST['matintuc'];
		$strSQL="SELECT * FROM news WHERE news_id={$matintuc}";
        $tintuc=mysqli_query($con,$strSQL);
        $rowtt=mysqli_fetch_array($tintuc);

	}
?>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-detail">
    <tr>
		<th colspan="2">
			Thông Tin Chi Tiết
		</th>
	</tr>
    <tr>
		<td width="200" >
            <div class="form__ct">Mã tin</div>
		</td>
		<td width="800">
            <div class="form__ct"><?php echo $rowtt['news_id']; ?></div>
		</td>
	</tr>
	<tr>
		<td >
            <div class="form__ct">Tiêu đề</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowtt['news_name']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Hinh ảnh</div>
		</td>
		<td>
            <div class="form__ct"><img src="../img/<?php echo $rowtt['news_img']; ?>" style="display: block; width: 25%;"/></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Nội dung</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowtt['news_content']; ?></div>
		</td>
	</tr>
</table>