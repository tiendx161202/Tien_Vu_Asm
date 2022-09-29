<?php
	//tim kiem loai qua
	$dieukien="";
	$tukhoa="";
	$strSQL="SELECT * FROM category";
	$loaiqua=mysqli_query($con,$strSQL);

	//kiem tra xem ten qua co duoc nhap vao hay khong
	if(isset($_POST['tukhoa']))
    {
        $tukhoa=$_POST['tukhoa'];
        if($tukhoa!="")
        $dieukien="product_name Like '%{$tukhoa}%'";
    }	
	//kiem tra ma loai qua co duoc nhap vao hay khong
    if(isset($_POST['loaiqua']))
    {
        $maloaiqua=$_POST['loaiqua'];
        if($maloaiqua!="0")
            {
                if($dieukien!="")
                    $dieukien=$dieukien."AND category_id = {$maloaiqua}";
                else
                    $dieukien="category_id = {$maloaiqua}";	
            }
    }
		if($dieukien!="")
		$dieukien="WHERE ".$dieukien;
	
    //phan trang
    $strSQL="SELECT count(*) FROM product {$dieukien}";
    $qua=mysqli_query($con,$strSQL);
    $row=mysqli_fetch_array($qua);
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
	
	$strSQL="SELECT * FROM product {$dieukien} ORDER BY product_id desc Limit {$dongbatdau},{$kichthuoctrang}";
	$qua=mysqli_query($con,$strSQL);
?>

<form name="timqua" action="" method="post">
	<div class="container__product">
		<div class="container__search">
			<div class="container__search-wrap">
				<input type="text" name="tukhoa" id="tukhoa" value="" placeholder="Nhập để tìm kiếm" class="container__search-input"/>
				<div class="container__search-input-serapate"></div>
				<select name="loaiqua" class="container__search-select">
					<option value="0">----Tên Loại Quả----</option>
					<?php while($row=mysqli_fetch_array($loaiqua)) { ?>
						<?php if($row['category_id']==$maloaiqua) { ?>
							<option value="<?php echo $row['category_id']; ?>" selected="selected" ><?php echo $row['category_name']; ?></option>
							<?php } else { ?>
							<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<button type="submit" name="submit" class="container__search-btn">
					<input name="trangchuyen" type="hidden" value="quanlyqua" />
					<i class="container__search-icon fa-sharp fa-solid fa-magnifying-glass"></i>
				</button>
			</div>
		</div>
		<div class="container__add">
			<a href="#" onclick="them_suaqua('them_qua')" class="container__add-click">Thêm Sản Phẩm Mới</a>
		</div>
	</div>
</form>

<form action="" method="post">
	<table width="100%" cellpadding="2" cellspacing="0" border="0" class="main__admin-table">
		<tr>
			<th width="10%" align="center">
				STT
			</th>
			<th width="10%">
				ID
			</th>
			<th width="15%">
				Hình ảnh
			</th>
			<th width="35%">
				Tên quả
			</th>
			<th width="30%" colspan="3">
				Chức năng
			</th>
		</tr>
	
		<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($qua)) { $i+=1; ?>
	
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
			<td <?php echo $mausac; ?>  align="center">
				#<?php echo $row['product_id']; ?>
			</td>
			<td <?php echo $mausac; ?> >
				<a href="#" onclick="them_suaqua('sua_qua',<?php echo $row['product_id']; ?>)">
					<img src="../img/<?php echo $row['product_img']; ?>" class="table__admin-img-cate"/>
				</a>
			</td>
			<td <?php echo $mausac; ?>>
				<a href="#" onclick="them_suaqua('sua_qua',<?php echo $row['product_id']; ?>)" class="margin-left">
					<?php echo $row['product_name']; ?>
				</a>
				<?php
					// hien trang thai cua qua
					if($row['product_status']==2)
						echo "<img src='../image/hot.gif' border='0'>";
				?>
			</td>
			<td <?php echo $mausac; ?> align="center">
				<a href="#" onclick="chitiet_qua('<?php echo $row['product_id']; ?>')">
					<i class="fa-sharp fa-solid fa-book"></i> Chi tiết
				</a>
			</td>
			<td <?php echo $mausac; ?> align="center">
				<a href="#" onclick="them_suaqua('sua_qua',<?php echo $row['product_id']; ?>)">
					<i class="fa-solid fa-pen-to-square"></i> Sửa	
				</a>
			</td>
			<td <?php echo $mausac; ?> align="center">
				<a href="#" onclick="xoa_qua(<?php echo $row['product_id']; ?>)" class="delete">				
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
</form>

<form action="" method="post" name="them_sua">
	<input name="maqua" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyqua" />
</form>

<form action="" method="post" name="xoaqua">
	<input name="maqua" type="hidden" value="" />
	<input name="goihamxuly" type="hidden" value="xoaqua" />
	<input name="trangchuyen" type="hidden" value="xl_qua" />
</form>

<form name="ct_qua" action="" method="post">
	<input type="hidden" name="maqua" value="" />
	<input name="trangchuyen" type="hidden" value="chitiet_qua" />
</form>

<script>
	function them_suaqua(trangden,mah)
	{
		them_sua.trangchuyen.value=trangden
		them_sua.maqua.value=mah
		them_sua.submit()
	}
	function xoa_qua(mah)
	{
		xoaqua.maqua.value=mah
		if(confirm('bạn có thực sự muốn xóa không!'))
		xoaqua.submit()
	}
	function chitiet_qua(trangden,mah)
	{
		ct_qua.maqua.value=trangden
		ct_qua.submit()
	}
</script>


<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlyqua" />
</form>

<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>