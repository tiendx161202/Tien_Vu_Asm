<?php
	//timkiem
	$dieukien="";
	if(isset($_POST['trangthai']))
		{
			$tk=$_POST['trangthai'];
			$dieukien="WHERE order_status={$tk}";
		}
        
	//phan trang
    $strSQL="SELECT count(*) FROM the_order {$dieukien}";
	$donhang=mysqli_query($con,$strSQL);
	$row=mysqli_fetch_array($donhang);
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
	
	$strSQL="SELECT * FROM the_order {$dieukien} ORDER BY order_id desc Limit {$dongbatdau},{$kichthuoctrang}";
	$the_order=mysqli_query($con,$strSQL);
?>

<form name="timdonhang" action="" method="post">
	<div class="container__order">
		<div class="container__search-wrap">
			<a href="#" onclick="timdon()" class="container__add-click">Đơn Hàng Chưa Giao</a>
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
		<th width="25%">
            Tên khách hàng
		</th>
		<th width="20%">
            Trạng thái
		</th>
		<th width="30%" colspan="2" align="center">
			Chức năng
		</th>
	</tr>

	<?php $i=$dongbatdau; ?>
	<?php while($row=mysqli_fetch_array($the_order)) { $i+=1; ?>

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
			#<?php echo $row['order_id']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" class="margin-left">
				<?php 
					//lay chi tiet cua khach hang 
					$strSQL="SELECT * FROM customer WHERE customer_id={$row['customer_id']}";
					$khachhang=mysqli_query($con,$strSQL);
					$rowKH=mysqli_fetch_array($khachhang);
					
				?>
				<?php echo $rowKH['customer_name']; ?>
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<?php 
				if($row['order_status']==1)
					echo "Chưa Giao";
				else
					echo "<font color='#D4D0C8'> Đã Giao Hàng </font>";
			?>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="ct_datdonhang('<?php echo $row['order_id']; ?>')">
				<i class="fa-sharp fa-solid fa-book"></i> Chi tiết
			</a>
		</td>
		<td <?php echo $mausac; ?> align="center">
			<a href="#" onclick="xoa_donhang('<?php echo $row['order_id']; ?>')" class="delete">
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

<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlydondathang" />
</form>

<script>
	function sotrang(trang)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>

<form name="xl_donhang" action="" method="post">
	<input type="hidden" name="trangchuyen" value="" />
	<input type="hidden" name="goihamxuly" value="xoadonhang" />
	<input type="hidden" name="madonhang" value="" />
</form>

<form name="ct_donhang" action="" method="post">
	<input type="hidden" name="madonhang" value="" />
	<input name="trangchuyen" type="hidden" value="chitiet_donhang" />
</form>

<script>
	function xoa_donhang(ma,trang,hanhdong)
	{
		xl_donhang.madonhang.value=ma
		xl_donhang.trangchuyen.value=trang
		xl_donhang.goihamxuly.value=hanhdong
		if(confirm('Bạn có thực sự muốn xóa đơn đặt hàng này không?'))
		xl_donhang.submit()
	}
	
	function ct_datdonhang(madonhang)
	{
		ct_donhang.madonhang.value=madonhang
		ct_donhang.submit()
	}
</script>

<form name="giaonhan" action="" method="post">
	<input type="hidden" name="trangchuyen" value="quanlydondathang" />
	<input type="hidden" name="trangthai" value="1" />
</form>

<script>
	function timdon()
	{
		giaonhan.submit()
	}
</script>