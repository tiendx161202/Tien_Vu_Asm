<script language="JavaScript" type="text/javascript">
	function kiemtra_nhap() 
	{
		var tenloaiqua=themloaiqua.tenloaiqua.value;
		if(tenloaiqua=="")
		{
			document.all('loi_nhap').innerHTML="Bạn chưa nhập thông tin!"
			themloaiqua.tenloaiqua.style.background='#fffcc'
			themloaiqua.tenloaiqua.focus()
			return false;
		}
		else
		{
			document.all('loi_nhap').innerHTML=""
			themloaiqua.tenloaiqua.style.backgroundColor="#FFFFFF"
			
		}
	}
</script>

<form action="" method="post" name="themloaiqua" style="margin-bottom: 15px;" onsubmit="return kiemtra_nhap()">
	<table width="100%" cellpadding="2" cellspacing="0" border="0" class="table__admin-act">
		<tr>
			<th colspan="2">
				Thêm Danh Mục Mới
			</th>
		</tr>
		<tr>
			<td align="right"  height="50">
				<input name="tenloaiqua" type="text" value="" placeholder="Nhập để thêm" class="container__add-input" maxlength="30">
			</td>
			<td align="left"  height="50">
				<input name="trangchuyen" type="hidden" value="xl_loaiqua" />
				<input name="goihamxuly" type="hidden" value="themloaiqua" />				
				<input type="submit" name="Submit" value="Thêm" class="container__add-click">
			</td>
		</tr>
		<tr>
			<td>
				<span id="loi_nhap" class="thongbao_loinhap"></span>
			</td>
		</tr>
	</table>			
</form>
