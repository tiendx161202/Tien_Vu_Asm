<?php
    $thongbao="";
    if(isset($_POST['goihamxuly']))
    {
        $lenhxuly=$_POST['goihamxuly'];
        if($lenhxuly=='xoatintuc')
            $thongbao=xoa_tintuc();
        else if($lenhxuly=='themtintuc')
            $thongbao=them_tintuc();
        else if($lenhxuly=='suatintuc')
            $thongbao=sua_tintuc();
    }

//ham xoa tin tuc
function xoa_tintuc()
{
    global $con;
    if(isset($_POST['matintuc']))
        $matintuc=$_POST['matintuc'];
        $strSQL="DELETE FROM news WHERE news_id ={$matintuc}";
        mysqli_query($con,$strSQL);
            return "Bạn đã xóa thành công tin tức này!";
}

//ham them tin tuc
function them_tintuc()
{
    global $con;
    if(isset($_POST['tieudetintuc']))
        $tieudetintuc=$_POST['tieudetintuc'];

    if(isset($_POST['hinhanh']))
        $hinhanh=$_POST['hinhanh'];

    if(isset($_POST['noidungtintuc']))
        $noidungtintuc=$_POST['noidungtintuc'];

    $strSQL="INSERT INTO news(news_name,news_img,news_content) VALUES ('{$tieudetintuc}','{$hinhanh}','{$noidungtintuc}')";
    mysqli_query($con,$strSQL);
	    return "Đã thêm thành công tin tức này!";
}

// ham sua tin tuc
function sua_tintuc()
{
		global $con;
	if(isset($_POST['matt']))
		$matt=$_POST['matt'];
		
	if(isset($_POST['tieudetintuc']))
		$tieudetintuc=$_POST['tieudetintuc'];
		
	if(isset($_POST['hinhanh']))
		$hinhanh=$_POST['hinhanh'];
		
	if(isset($_POST['noidungtintuc']))
		$noidungtintuc=$_POST['noidungtintuc'];
	
	$strSQL="UPDATE news SET news_name='{$tieudetintuc}',news_img='{$hinhanh}',news_content='{$noidungtintuc}' WHERE news_id={$matt}";	
	mysqli_query($con,$strSQL);
	    return "Sửa tin tức thành công!";
		
}

//in thong bao
if($thongbao !="")
{
echo "<div class='thong_bao'>";
	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo "<p class='pp'><center><span style='color:#FF9900;'>{$thongbao}</span>"; 
				echo "<br />";
				echo "<br />";
?>
<center><a href="#" onclick="adm_chuyentrang('quanlytintuc')">Bấm Vào Đây Để Về Trang Quản Lý Tin Tức</a></center>
<?php
				echo "</p>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
echo "</div>";
}
?>
