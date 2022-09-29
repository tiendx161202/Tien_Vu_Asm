<?php
	if(isset($_POST['maqua']))
	{
		$maqua=$_POST['maqua'];
		$strSQL="SELECT * FROM product WHERE product_id={$maqua}";
		$qua=mysqli_query($con,$strSQL);
		$rowqua=mysqli_fetch_array($qua);

        $trangthai=$rowqua['product_status'];
			if($trangthai==1)
				$trangthai="Bình thường";
			else if($trangthai==2)
				$trangthai="Đặc biệt";

        $strSQL="SELECT * FROM category";
        $loaiqua=mysqli_query($con,$strSQL);
	}
?>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-detail">
    <tr>
		<th colspan="2">
			Thông Tin Chi Tiết Của: <?php echo $rowqua['product_name']; ?>
		</th>
	</tr>
    <tr>
		<td width="200" >
            <div class="form__ct">Mã quả</div>
		</td>
		<td width="800">
            <div class="form__ct"><?php echo $rowqua['product_id']; ?></div>
		</td>
	</tr>
	<tr>
		<td >
            <div class="form__ct">Tên quả </div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowqua['product_name']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Hình ảnh</div>
		</td>
		<td>
            <div class="form__ct"><img src="../img/<?php echo $rowqua['product_img']; ?>" style="display: block; width: 25%;"/></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Giá</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowqua['product_price']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Số lượng(kg)</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowqua['product_strock']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Thuộc loại</div>
		</td>
		<td>
            <div class="form__ct">
                <?php
					$strSQL="SELECT * FROM category WHERE category_id=$rowqua[category_id]";
					$loaiqua=mysqli_query($con,$strSQL);
					$rowloai=mysqli_fetch_array($loaiqua);
					echo $rowloai['category_name'];
				?>
            </div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Trạng thái</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $trangthai; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Mô tả</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowqua['product_information']; ?></div>
		</td>
	</tr>
    <tr>
		<td >
            <div class="form__ct">Chi tiết</div>
		</td>
		<td>
            <div class="form__ct"><?php echo $rowqua['product_detail']; ?></div>
		</td>
	</tr>
</table>
<div>
	<a href="#" onclick="adm_chuyentrang('quanlyqua')">Quay Về Trang Sản Phẩm</a>
</div>