<?php
	//timkiem
    $dieukien="";
    if(isset($_POST['tukhoa']))
    {
        $tukhoa=$_POST['tukhoa'];
        $dieukien="customer_name Like '%{$tukhoa}%'";
    }
    if($dieukien!="")
        $dieukien="WHERE ".$dieukien;
        
	//phan trang
    $strSQL="SELECT count(*) FROM customer {$dieukien}";
	$khachhang=mysqli_query($con,$strSQL);
	$row=mysqli_fetch_array($khachhang);
	$sodong=$row[0];
	
	$kichthuoctrang=10;
		if(($sodong%$kichthuoctrang)==0)
				$tongsotrang=$sodong/$kichthuoctrang;
		else
				$tongsotrang=($sodong/$kichthuoctrang)+1;
			
			
	if(!isset($_POST['tranghienhanh']) || $_POST['tranghienhanh']=="1")
		{
			$dongbatdau=0;
			$tranghienhanh=1;
		}
	else
		{
			$dongbatdau=($_POST['tranghienhanh']-1)*$kichthuoctrang;
			$tranghienhanh=$_POST['tranghienhanh'];
		}
	
	$strSQL="SELECT * FROM customer {$dieukien} ORDER BY customer_id desc Limit {$dongbatdau},{$kichthuoctrang}";
	$customer=mysqli_query($con,$strSQL);
?>

<form name="timtin" action="" method="post">
	<div class="container__customer">
		<div class="container__customer-search">
			<div class="container__search-wrap">
				<input type="text" name="tukhoa" value="" placeholder="Nhập để tìm kiếm" class="container__search-input"/>
				<button type="submit" value="Tìm" name="submit" class="container__search-btn">
					<input name="trangchuyen" type="hidden" value="quanlykhachhang" />
					<i class="container__search-icon fa-sharp fa-solid fa-magnifying-glass"></i>
				</button>
			</div>
		</div>
	</div>
</form>

<table width="100%" cellpadding="2" cellspacing="0" border="0" class="main__admin-table">
	<tr>
        <th width="10%" align="center">
            STT
		</th>
		<th width="15%" align="center">
            ID
		</th>
		<th width="45%">
            Tên khách hàng
		</th>
		<th width="30%" colspan="3" align="center">
			Chức năng
		</th>
	</tr>

	<?php $i=$dongbatdau; ?>
	<?php while($row=mysqli_fetch_array($customer)) { $i+=1; ?>

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
			#<?php echo $row['customer_id']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="chi_tiet_kh('<?php echo $row['customer_id']; ?>')" class="margin-left"><?php echo $row['customer_name']; ?></a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="chi_tiet_kh('<?php echo $row['customer_id']; ?>')">
				<i class="fa-sharp fa-solid fa-book"></i> Chi tiết
			</a>
		</td>
        <td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="sua_khachhang('<?php echo $row['customer_id']; ?>')">
				<i class="fa-solid fa-pen-to-square"></i> Sửa
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="xoa_khachhang('<?php echo $row['customer_id']; ?>')" class="delete">
				<i class="fa-solid fa-trash"></i> Xóa
			</a>
		</td>
	</tr>
	<?php } ?>

    <tr>
        <td colspan="6" height="30" align="center">
			<?php if((int)$tongsotrang>1) { ?>
				<?php 
					//xu ly review trang
					if((int)$tranghienhanh!=1)
					{
				?>
					    <a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh-1 ?>) "> <img src="../images/review.jpg" border="0" /></a> 
					<?php } ?>
			
                        <?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
                        <?php if ((int)$tranghienhanh==$i) { ?>
                            <a href="#" class="tranghientai" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
                        <?php } else  {?>	
                            <a href="#" class="phantrang" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
                    <?php } ?>	
                <?php } ?>
				<?php 
					//xu ly next trang
					if((int)$tranghienhanh!=(int)$tongsotrang)
					{
					?>
				        <a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh+1 ?>) "> <img src="../images/next.jpg" border="0" /></a>		
					<?php } ?>
            <?php } ?>		
			
		    <?php if((int)$tongsotrang>1) { ?>
		        <select name="select" onchange="sotrang(this.value)" >
                    <?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
                        <?php if ($tranghienhanh==$i) { ?>
                            <option value="<?php echo $i; ?>" selected="selected">Trang  <?php echo $i; ?></option>
                        <?php } else  {?>
                            <option value="<?php echo $i; ?>" >Đến Trang  <?php echo $i; ?></option>
                        <?php } ?>			
			    <?php } ?>			   
	   	        </select> 
		    <?php } ?>	
		</td>
    </tr>
</table>

<form name="khachhang" method="post" action="">
	<input name="makhachhang" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xl_khachhang" />
	<input name="goihamxuly" type="hidden" value="xoakhachhang" />
</form>

<form name="chitiet_kh" action="" method="post">
	<input type="hidden" name="makhachhang" value="" />
	<input name="trangchuyen" type="hidden" value="chitiet_khachhang" />
</form>

<script>
	function xoa_khachhang(makhachhang)
	{
		khachhang.makhachhang.value=makhachhang
		if(confirm("Bạn có thực sự muốn xóa khách hàng này không"))
		khachhang.submit()
	}
	function chi_tiet_kh(makhachhang)
	{
		chitiet_kh.makhachhang.value=makhachhang
		chitiet_kh.submit()
	}
</script>

<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlykhachhang" />
</form>

<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>