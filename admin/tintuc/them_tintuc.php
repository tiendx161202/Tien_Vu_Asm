<form action="" method="post" name="them_tintuc">
    <table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
        <tr>
            <th colspan="2">
			    Đăng Tin Tức Mới
            </th>
        </tr>
        <tr>
            <td align="center">
                Tiêu đề
            </td>
            <td>
                <input name="tieudetintuc" type="text" id="tieudetintuc" maxlength="50" style="width:1000px; height:50px;">
            </td>
        </tr>
        <tr>
            <td align="center">
                Hình ảnh
            </td>
            <td>
                <input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:800px; height:30px;">
            </td>
        </tr>
        <tr>
            <td width="160" align="center">
                Nội dung
            </td>
            <td>
                <textarea name="noidungtintuc" id="tintuc" style="width:1000px; height:300px;" ></textarea>
                <script language="javascript1.2">
                    generate_wysiwyg('tintuc');
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input name="trangchuyen" type="hidden" value="xl_tintuc" />
                <input name="goihamxuly" type="hidden" value="themtintuc" />
                <input name="matt" type="hidden" value="<?php echo $row_tt['ma_tt']; ?>" />
                <input type="reset" name="Submit2" value="Làm Lại" class="input__submit" />
                <input type="submit" name="Submit" value="Đăng Bài" class="input__submit">
                <div>
					<a href="#" onclick="adm_chuyentrang('quanlytintuc')">Bấm Vào Đây Để Về Trang Quản Tin Tức</a>
				</div>
            </td>
        </tr>
    </table>	
</form>