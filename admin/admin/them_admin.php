<?php 
	$strSQL="SELECT * FROM admin";
	$admin=mysqli_query($con,$strSQL);
?>

<form action="" method="post" name="themadmin">
	<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
		<tr>
			<th	colspan="2">
				Thêm Quản Trị Viên	
			</th>
		</tr>
        <tr>
            <td width="200" align="center">
                Tên đăng nhập:
            </td>
            <td>
                <input name="tendangnhap" type="text" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                Mật khẩu:
            </td>
            <td>
                <input name="matkhau" type="password" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                Họ tên: 
            </td>
            <td>
                <input name="hoten" type="text" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                Giới tính: 
            </td>
            <td>
                <select name="gioitinh" style="width:150px; height: 30px; margin-right: 30px;">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center">
                SĐT:
            </td>
            <td>
                <input name="phone" type="text" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                Địa chỉ:
            </td>
            <td>
                <input name="diachi" type="text" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                Email:
            </td>
            <td>
                <input name="email" type="text" id="" maxlength="30" style="width:420px; height: 30px; margin-right: 30px;"/>
            </td>
        </tr>
    	<tr>
      		<td colspan="2" align="center">
				<input name="trangchuyen" type="hidden" value="xl_admin" />
				<input name="goihamxuly" type="hidden" value="them_admin" />
				<input type="reset" name="Submit2" value="Làm Lại"  class="input__submit"/>
				<input type="submit" name="Submit" value="Thêm Mới" class="input__submit"/> 
				<div>
					<a href="#" onclick="adm_chuyentrang('quanlyadmin')">Bấm Vào Đây Để Về Trang Quản Lý Admin</a>
				</div>
	  		</td>
   		 </tr>
  	</table>
</form>