<?php
// include 'C:\Users\FPTSHOP\Desktop\Project_Tien_Vu\database/connect.php';

include("../../database/connect.php");

// Login
$arr = "";
$err = [];
if (isset($_POST['customer_username'])) {
    $customer_username = $_POST['customer_username'];
    $customer_password = $_POST['customer_password'];

    $sql = "SELECT * FROM customer WHERE customer_username = '$customer_username'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);

    $check_customer_name = mysqli_num_rows($query);

    if ($check_customer_name == 1) {
        $checkPass = password_verify($customer_password, $data['customer_password']);
        if ($checkPass) {

            $_SESSION['customers'] = $data;
            header("location:../../index.php");
        } else {
            $err['customer_password'] = 'Wrong password';
        }
    }
    if ($customer_username == $arr) {
        $err['customer_username'] = 'Unnamed';
    } elseif ($check_customer_name != 1) {
        $err['customer_username'] = 'Name does not exist';
    }
}


?>


<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../style/login.css">
    <link rel="stylesheet" href="../../style/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>



</head>

<body>

    <header>
        <div class="nav_bar">
            <img src="../../img/img_logo/logo.jpg" alt="" class="logo">
            <ul id="ul_nav">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../../html/all_product.html">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="../../html/contactUs.html">Contact</a></li>
                <li><a href="#">Blog</a></li>
            </ul>

            <div class="search">
                <input type="text" placeholder="Search Item....">
                <i class="bi-search" id="search_icon"></i>
            </div>

            <div class="icon">
                <i class="bi bi-heart love"></i>
                <a href="../../html/cart.html"><i class="bi bi-cart2 cart"></i></a>
                <div class="dropdown">
                    <i class="bi bi-person-circle user" id="user"></i>

                    <div class="drop_menu" id="drop_menu">
                        <li><a href="../../pages/manager/register.php">Register</a></li>
                        <!-- <li><a href="#">dang xuat</a></li> -->
                    </div>
                </div>

            </div>

            <div class="list_icon">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </header>

    <div class="login_customer">
        <div class="content_customers">
            <img src="../../img/img_login/login.jpg" alt="">
        </div>

        <form class="from_login" method="POST" role="form">
            <div class="icon_close_login">
                <a href="">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>

            <div class="text_login">
                <h2>Login</h2>
                <div class="icon_input_login">
                    <div class="user_login">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="User name...." name="customer_username">
                        <div class="err_log">
                            <span><?php echo (isset($err['customer_username'])) ? $err['customer_username'] : '' ?></span>
                        </div>
                    </div>
                    <div class="password_login">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Password..." name="customer_password">
                        <div class="err_log">
                            <span><?php echo (isset($err['customer_password'])) ? $err['customer_password'] : '' ?></span>
                        </div>
                    </div>
                </div>

                <div class="forgot_password">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>

            <div class="btn_login">
                <button class="register_btn" id="register"><a href="./register.php">Register</a></button>
                <button class="login_btn">Login</button>
            </div>
        </form>

        <?php
        include("../footer.php");
        ?>


        <!-- ----Subscribe_email----- -->
        <!-- <div class="subscribe_email">
            <div class="text_subscribe">
                <h3>Sign up to receive updates</h3>
                <p>You will receive the latest notifications from the store and <br> many attractive offers</p>
            </div>
            <div class="search_subscribe">
                <input type="text" placeholder="Enter email address">
                <button>Subscribe</button>
            </div>
        </div> -->



        <!-- ---Footer----- -->
        <!-- <div class="footer">
            <div class="footer_content">
                <div class="footer_text">
                    <h4>Policy</h4>
                    <li><a href="">Privacy policy</a></li>
                    <li><a href="">Shipping policy</a></li>
                    <li><a href="">Usage rules</a></li>
                </div>

                <div class="footer_text">
                    <h4>Introduce</h4>
                    <li><a href="">Shop</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Products</a></li>
                </div>

                <div class="footer_text">
                    <h4>Customer support</h4>
                    <li><a href="">Check your order</a></li>
                    <li><a href="">Login</a></li>
                    <li><a href="">Register</a></li>
                    <li><a href="">Cart</a></li>
                </div>

                <div class="footer_text">
                    <h4>Connect with us</h4>
                    <li><a href=""><i class="bi bi-geo-alt-fill address"></i> : Ha noi , Viet Nam</a></li>
                    <li><a href=""><i class="bi bi-facebook face"></i> : 1234@facebook.com</a></li>
                    <li><a href=""><i class="bi bi-telephone-fill phone"></i> : 01235556485</a></li>
                    <li><a href=""><i class="bi bi-envelope-fill email"></i> : 0123@gmail.com</a></li>
                </div>
            </div>

            <div class="footer_copyright">
                Copyright@ 2022 belong to team Tien Vu
            </div>
        </div>
    </div> -->

        <script src="../../js/user.js"></script>
</body>

</html>