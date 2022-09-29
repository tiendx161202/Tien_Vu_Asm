<?php
	if(isset($_POST['matintuc']))
	{
		$matintuc=$_POST['matintuc'];
		$strSQL="SELECT * FROM news WHERE news_id={$matintuc}";
		$tintuc=mysqli_query($con,$strSQL);
		$row_tt=mysqli_fetch_array($tintuc);
	}
?>
<form action="" method="post" name="sua_tintuc">
    <table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
        <tr>
            <td colspan="2">
                Sửa Tin Tức Đã Đăng
            </td>
        </tr>
        <tr>
            <td align="center">
                Tiêu đề
            </td>
            <td>
                <input name="tieudetintuc" type="text" id="tieudetintuc" maxlength="50" style="width:1000px; height:50px;" 
                value="<?php echo $row_tt['news_name']; ?>">
            </td>
        </tr>
        <tr>
            <td align="center">
                Hình ảnh
            </td>
            <td>
                <input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:800px; height:30px;" value="<?php echo $row_tt['news_img']; ?>">
            </td>
        </tr>
        <tr>
            <td width="160" align="center">
                Nội Dung
            </td>
            <td>
                <textarea name="noidungtintuc" id="tintuc" style="width:1000px; height:300px;" ><?php echo $row_tt['news_content']; ?></textarea>
                <script language="javascript1.2">
                    generate_wysiwyg('tintuc');
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input name="trangchuyen" type="hidden" value="xl_tintuc" />
                <input name="goihamxuly" type="hidden" value="suatintuc" />
				<input name="matt" type="hidden" value="<?php echo $row_tt['news_id']; ?>" />
                <input type="reset" name="Submit2" value="Làm Lại" class="input__submit" />
                <input type="submit" name="Submit" value="Cập Nhật" class="input__submit">
                <div>
					<a href="#" onclick="adm_chuyentrang('quanlytintuc')">Bấm Vào Đây Để Về Trang Quản Tin Tức</a>
				</div>
            </td>
        </tr>
    </table>	
</form>