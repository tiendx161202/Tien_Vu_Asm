<?php session_start(); ?>
<?php include ("../database/connect.php")?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../font/fontawesome-free-6.1.2-web/css/all.min.css" />
    <title>
        <?php
        if ($_REQUEST['trangchuyen'] == "")
            echo "Admin CP";
        else
            echo $_REQUEST['trangchuyen'];
        ?>
    </title>
</head>

<body>
    <?php
    $thongbao = "";
    if (isset($_POST['txttendangnhap']) && isset($_POST['txtpass'])) {
        $tendangnhap = $_POST['txttendangnhap'];
        $pass = $_POST['txtpass'];
        $strSQL = "SELECT * FROM admin WHERE admin_username = '{$tendangnhap}' AND admin_password = '{$pass}'";
        $admin = mysqli_query($con, $strSQL);
        //Kiem tra du lieu - Neu co luu vao SS - Neu khong bao loi
        if (mysqli_num_rows($admin) > 0) {
            //lay ten luu vao ss//
            $row = mysqli_fetch_array($admin);
            $_SESSION['hovatenad'] = $row['admin_fullname'];
            $_SESSION['phanquyen'] = $row['admin_username'];
        } else
            $thongbao = "Sai Tên Đăng Nhập Hoặc Mật Khẩu";
    }
    if (isset($_POST['tquat']) && $_POST['tquat'] == "tquat")
        $_SESSION['hovatenad'] = "";
    ?>

    <?php if (!isset($_SESSION['hovatenad']) || ($_SESSION['hovatenad'] == "")) { ?>

        <form action="" method="post" name="formdangnhapadmin">
            <table class="admin_table">
                <tr>
                    <th colspan="3" class="admin__title">ADMIN CONTROL PANEL</th>
                </tr>
                <tr>
                    <td class="admin__font">&nbsp;&nbsp;Tên Đăng Nhập</td>
                    <td>
                        <input name="txttendangnhap" type="text" id="txttendangnhap" class="admin__font-input" />
                    </td>
                </tr>
                <tr>
                    <td class="admin__font">&nbsp;&nbsp;Mật Khẩu</td>
                    <td>
                        <input name="txtpass" type="password" id="txtpass" class="admin__font-input" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="color:#CC3300; font-size: 1.4rem;" align="center"><?php echo $thongbao; ?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="Submit" class="btn" value="Đăng Nhập" />
                    </td>
                </tr>
            </table>
        </form>
    <?php } else { ?>
        <form action="" method="post" name="hung">
            <input type="hidden" name="tquat" value="" />
        </form>

        <div class="management__admin">
            <div class="nav__admin">
                <div class="nav__admin-info">
                    <div class="nav__admin-info-press">
                        <button class="nav__admin-info-btn js-btn-info ">
                            <img src="../img/img_admin/admin.jpg" alt="Admin" class="nav__admin-info-btn-img" />
                            <span><?php echo $_SESSION['hovatenad']; ?></span>
                        </button>
                    </div>
                    <div class="nav__admin-modal js-modal">
                        <div class="modal__close js-modal"></div>
                        <div class="modal__container js-modal-container">
                            <div class="modal__container-position">
                                Chức Vụ: <?php if ($_SESSION['phanquyen'] == 'admin') echo 'Admin';
                                            else echo 'Quản Trị Viên'; ?>
                            </div>
                            <div class="modal__container-logout">
                                <a href="#" onclick="tquattaikhoan('tquat')" class="modal__container-logout-click">Đăng Xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav__admin-menu">
                    <ul class="nav__admin-menu-list">
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlyloaiqua')">
                                <i class="fa-solid fa-book"></i> Danh Mục
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlyqua')">
                                <i class="fa-solid fa-tags"></i> Sản Phẩm
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlydondathang')">
                                <i class="fa-solid fa-truck-moving"></i> Đơn Hàng
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlykhachhang')">
                                <i class="fa-solid fa-user"></i> Khách Hàng
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlytintuc')">
                                <i class="fa-solid fa-newspaper"></i> Tin Tức
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="adm_chuyentrang('quanlyadmin')">
                                <i class="fa-solid fa-address-book"></i> Admin
                            </a>
                        </li>
                    </ul>
                </div>
                <?php include('./thongke.php'); ?>
                <div class="nav__admin-statistical">
                    <ul class="nav__admin-statistical-list">
                        <li>Tổng Số Danh Mục: <?php echo $soloaiqua ?></li>
                        <li>Tổng Số Sản Phẩm: </span> <?php echo $soqua ?></li>
                        <li>Tổng Số Đơn Hàng: </span> <?php echo $donhang ?></li>
                        <li>Tổng Số Khách Hàng: </span> <?php echo $khachhang ?></li>
                        <li>Tổng Số Tin Tức: </span> <?php echo $tintuc ?></li>
                    </ul>
                </div>
            </div>
            <div class="main__admin">
                <div>
                    <?php include("layout/header.php"); ?>
                </div>
                <?php
                if (isset($_POST['trangchuyen'])) {
                    $hienthi = $_POST['trangchuyen'];
                    //admin
                    if ($hienthi == 'quanlyadmin')
                        include_once('admin/admin.php');
                    else if ($hienthi == 'them_admin')
                        include_once('admin/them_admin.php');
                    else if ($hienthi == 'sua_admin')
                        include_once('admin/sua_admin.php');
                    else if ($hienthi == 'chitiet_admin')
                        include_once('admin/ct_admin.php');
                    else if ($hienthi == 'xl_admin')
                        include_once('admin/xl_admin.php');
                    //loai qua
                    else if ($hienthi == 'quanlyloaiqua')
                        include_once('loai_qua/loaiqua.php');
                    else if ($hienthi == 'xl_loaiqua')
                        include_once('loai_qua/xl_loaiqua.php');
                    //qua
                    else if ($hienthi == 'quanlyqua')
                        include_once('qua/qua.php');
                    else if ($hienthi == 'them_qua')
                        include_once('qua/them_qua.php');
                    else if ($hienthi == 'sua_qua')
                        include_once('qua/sua_qua.php');
                    else if ($hienthi == 'chitiet_qua')
                        include_once('qua/ct_qua.php');
                    else if ($hienthi == 'xl_qua')
                        include_once('qua/xl_qua.php');
                    //tin tin
                    else if ($hienthi == 'quanlytintuc')
                        include_once('tintuc/tintuc.php');
                    else if ($hienthi == 'them_tintuc')
                        include_once('tintuc/them_tintuc.php');
                    else if ($hienthi == 'sua_tintuc')
                        include_once('tintuc/sua_tintuc.php');
                    else if ($hienthi == 'ct_tintuc')
                        include_once('tintuc/ct_tintuc.php');
                    else if ($hienthi == 'xl_tintuc')
                        include_once('tintuc/xl_tintuc.php');
                    //khach hang
                    else if ($hienthi == 'quanlykhachhang')
                        include_once('khachhang/khachhang.php');
                    else if ($hienthi == 'chitiet_khachhang')
                        include_once('khachhang/ct_khachhang.php');
                    else if ($hienthi == 'xl_khachhang')
                        include_once('khachhang/xl_khachhang.php');
                    //don hang
                    else if ($hienthi == 'quanlydondathang')
                        include_once('donhang/donhang.php');
                    else if ($hienthi == 'chitiet_donhang')
                        include_once('donhang/ct_donhang.php');
                    else if ($hienthi == 'xl_donhang')
                        include_once('donhang/xl_donhang.php');
                } else
                    include_once('layout/main.php');
                ?>
            </div>
        </div>
        <div>
            <?php include("layout/footer.php"); ?>
        </div>

        <form action="" method="post" name="chuyentrang">
            <input name="trangchuyen" type="hidden" value="" />
        </form>

        <script>
            function adm_chuyentrang(trang) {
                chuyentrang.trangchuyen.value = trang
                chuyentrang.submit()

            }

            function tquattaikhoan(lenh) {
                hung.tquat.value = lenh;
                if (confirm('Bạn chắc chắn muốn thoát tài khoản..!!'))
                    hung.submit()
            }
        </script>

        <script>
            const btnInfo = document.querySelectorAll('.js-btn-info')
            const modal = document.querySelector('.js-modal')
            const modalContainer = document.querySelector('.js-modal-container')


            //Hàm hiển thị modal( thêm class open vào modal)
            function showbtnInfo() {
                modal.classList.add('open')
            }

            //Hàm ẩn modal ( gỡ bỏ class open ra modal)
            function hidebtnInfo() {
                modal.classList.remove('open')
            }

            for (const btn of btnInfo) {
                btn.addEventListener('click', showbtnInfo)
            }

            // //Nghe hành vi click vào button close
            //  modalClose.addEventListener('click', hidebtnInfo)

            //Nghe hành vi click vào khoảng không bên ngoài để button close
            modal.addEventListener('click', hidebtnInfo)

            //Ngừng nổi bọt để khi click vào modal container khônng bị close
            modalContainer.addEventListener('click', function(event) {
                event.stopPropagation()
            })
        </script>
    <?php } ?>
</body>

</html>