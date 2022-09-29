<?php 
	if(isset($_POST['maqua']))
	    $maqua=$_POST['maqua'];	
	$strSQL="SELECT * FROM product WHERE product_id={$maqua}";
	$sua_qua=mysqli_query($con,$strSQL);
	$row_sua=mysqli_fetch_array($sua_qua);
	
?>

<form action="" method="post" name="themqua">
    <table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
        <tr>
            <th colspan="2">
                Thay Đổi Thông Tin Sản Phẩm
            </th>
        </tr>
        <tr>
            <td align="center">
                Tên Quả:
            </td>
            <td>
                <input name="tenqua" type="text" id="tenqua" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;" value="<?php echo $row_sua['product_name']; ?>"   />
                Loại Quả:
                <select name="loaiqua" style="width:200px; height: 30px; margin-left: 15px;">
                    <?php 
                    $strSQL="SELECT * FROM category";
                    $loaiqua=mysqli_query($con,$strSQL);
                    while($rowloai=mysqli_fetch_array($loaiqua)) { ?>
                    <option value="<?php echo $rowloai['category_id']; ?>"><?php echo $rowloai['category_name']; ?></option>
                    <?php } ?>
                </select>   
            </td>
        </tr>
        <tr>
            <td align="center">
                Giá:
            </td>
            <td>
                <input name="giaqua" type="text" id="giaqua" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;" value="<?php echo $row_sua['product_price']; ?>"/>
				Trạng Thái: 
                <select name="trangthai" style="width:200px; height: 30px;">
                    <option value="1">Bình thường</option>
                    <option value="2">Đặc biệt</option>
                </select>
            </td>
        </tr>
        <tr>
			<td align="center">
				Hình Ảnh 
			</td>
			<td>
                <input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:420px; height:30px;" value="<?php echo $row_sua['product_img']; ?>" >
			</td>
		</tr>
        <tr>
			<td align="center">
				Số lượng(kg)
			</td>
			<td>
                <input name="soluong" type="text" id="soluong" maxlength="50" style="width:420px; height: 30px;" value="<?php echo $row_sua['product_strock']; ?>" >
			</td>
		</tr>
		<tr>
			<td  align="center">
				Mô Tả 
			</td>
			<td >
				<textarea name="mota" cols="104" rows="4" ><?php echo $row_sua['product_information']; ?></textarea>
			</td>
		</tr>
        <tr>
			<td align="center">
				Chi tiết
			</td>
			<td>
				<textarea name="chitiet" cols="104" rows="15" ><?php echo $row_sua['product_detail']; ?></textarea>
			</td>
		</tr>
        <tr>
            <td colspan="2" align="center">
                <input name="trangchuyen" type="hidden" value="xl_qua" />
                <input name="goihamxuly" type="hidden" value="suaqua" />
                <input name="maqua" type="hidden" value="<?php echo $row_sua['product_id']; ?>" />
                <input type="submit" name="Submit" value="Cập Nhật" class="container__add-click" />  
                <div>
                    <a href="#" onclick="adm_chuyentrang('quanlyqua')">Quay Về Trang Sản Phẩm</a>
				</div>
            </td>
        </tr>
    </table>
</form>