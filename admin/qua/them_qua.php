<?php 
	$strSQL="SELECT * FROM category";
	$loaiqua=mysqli_query($con,$strSQL);
?>

<form action="" method="post" name="themqua">
	<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
		<tr>
			<th	colspan="2" align="center">
				Thêm Sản Phẩm Mới		
			</th>
		</tr>
        <tr>
            <td width="150" align="center">
                Tên quả
            </td>
            <td>
				<input name="tenqua" type="text" id="tenqua" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
                Loại quả
				<select name="loaiqua" style="width:200px; height: 30px; margin-left: 15px;">
					<?php while($row=mysqli_fetch_array($loaiqua)) { ?>
					<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
					<?php } ?>
				</select>
            </td>
        </tr>
        <tr>
            <td align="center">
                Giá
            </td>
            <td>
                <input name="giaqua" type="text" id="giaqua" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;" />
				Trạng thái
				<select name="trangthai" style="width:200px; height: 30px;">
					<option value="1">Bình thường</option>
					<option value="2">Đặc biệt</option>
				</select>
            </td>
        </tr>
		<tr>
			<td>
                Số lượng(kg)
			</td>
			<td>
                <input name="soluong" type="text" id="soluong" maxlength="50" style="width:420px; height: 30px; margin-right: 30px;" >
				<span style="margin-right: 15px;">Hình ảnh</span>
				<input type="file" name="hinhanh" id="hinhanh" maxlength="50" style="width:420px; height: 50px;cursor:pointer;" >
			</td>
		</tr>
		<tr>
			<td align="center">
				Mô tả 
			</td>
			<td>
				<textarea name="mota" cols="104" rows="4" ></textarea>
			</td>
		</tr>
        <tr>
			<td align="center">
				Chi tiết
			</td>
			<td>
				<textarea name="chitiet" cols="104" rows="15" ></textarea>
			</td>
		</tr>
    	<tr>
      		<td colspan="2" align="center">
				<input name="trangchuyen" type="hidden" value="xl_qua" />
				<input name="goihamxuly" type="hidden" value="themqua" />
				<input type="reset" name="Submit2" value="Làm Lại"  class="container__add-click"/>
				<input type="submit" name="Submit" value="Thêm" class="container__add-click"/> 
				<div>
					<a href="#" onclick="adm_chuyentrang('quanlyqua')">Quay Về Trang Sản Phẩm</a>
				</div>
	  		</td>
   		 </tr>
  	</table>
</form>