<?php
include("../../database/connect.php");
$err = [];

if (isset($_POST['customer_username'])) {
    $customer_username = $_POST['customer_username'];
    $customer_name = $_POST['customer_name'];
    $customer_password = $_POST['customer_password'];
    $customer_rpassword = $_POST['customer_rpassword'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    // if (! isset($customer_name['customer_name'])) {
    // $customer_name['customer_name'] = $_POST['customer_name'];
    // }

    if (empty($customer_username)) {
        $err['customer_username'] = 'You have not entered a name';
    }
    if (empty($customer_password)) {
        $err['customer_password'] = 'You have not entered your password';
    }
    if ($customer_password != $customer_rpassword) {
        $err['customer_rpassword'] = 'Incorrect reentry password';
    }
    if (empty($customer_name)) {
        $err['customer_name'] = 'You have not entered a full name';
    }
    if (empty($customer_email)) {
        $err['customer_email'] = 'You have not entered an email yet';
    }
    if (empty($customer_address)) {
        $err['customer_address'] = 'You have not entered address';
    }
    if (empty($customer_phone)) {
        $err['customer_phone'] = 'You have not entered a phone number';
    }



    if (empty($err)) {
        $pass = password_hash($customer_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO customer(customer_username,customer_password,customer_name,customer_email,customer_address,customer_phone) VALUES ('$customer_username','$pass','$customer_name','$customer_email','$customer_address','$customer_phone')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script> alert('Register Successfully')</script>";
            header('location:login.php');
        }
    }
}



?>


<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../style/index.css">
    <link rel="stylesheet" href="../../style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <style>
        .nav_bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100px;
            background-color: white;
        }

        .search input {
            outline: none;
            width: 360px;
            height: 35px;
            position: relative;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #E0E2DF;
        }

        .icon .bi:hover {
            color: #82AE46;
        }

        .nav_bar ul li a:hover {
            color: #82AE46;
        }

        .has_error {
            height: 30px;
            width: 300px;
            margin-left: 75px !important;
            text-align: left;
        }
    </style>

</head>

<body>

    <header>
        <div class="nav_bar">
            <img src="../../img/img_logo/logo.jpg" alt="" class="logo">
            <ul id="ul_nav">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../html/all_product.html">Shop</a></li>
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
                <i class="bi bi-person-circle user" id="user"> </i>

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

        <form class="from_register" method="POST" role="form">
            <div class="icon_close_login">
                <a href="../html/page.html">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>

            <div class="text_register">
                <h2>Register</h2>
                <div class="icon_input_login">
                    <div class="user_register">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="User name...." name="customer_username">

                        <div class="has_error">
                            <span><?php echo (isset($err['customer_username'])) ? $err['customer_username'] : '' ?></span>
                        </div>
                    </div>
                    <div class="password_register">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Password..." name="customer_password">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_password'])) ? $err['customer_password'] : '' ?></span>
                        </div>
                    </div>

                    <div class="password_register">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Enter the password..." name="customer_rpassword">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_rpassword'])) ? $err['customer_rpassword'] : '' ?></span>
                        </div>
                    </div>

                    <div class="name_register">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="Full name...." name="customer_name">

                        <div class="has_error">
                            <span><?php echo (isset($err['customer_name'])) ? $err['customer_name'] : '' ?></span>
                        </div>
                    </div>

                    <div class="email_register">
                        <i class="bi bi-envelope-fill"></i><input type="email" placeholder="Email.." name="customer_email">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_email'])) ? $err['customer_email'] : '' ?></span>
                        </div>
                    </div>

                    <div class="address_register">
                        <i class="bi bi-geo-alt-fill"></i><input type="text" placeholder="Address..." name="customer_address">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_address'])) ? $err['customer_address'] : '' ?></span>
                        </div>
                    </div>

                    <div class="phone_register">
                        <i class="bi bi-telephone-fill"></i><input type="text" placeholder="Phone Number..." name="customer_phone">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_phone'])) ? $err['customer_phone'] : '' ?></span>
                        </div>
                    </div>

                </div>


            </div>

            <div class="btn_confirm" id="confirm">
                <button type="submit">Confirm</button>
            </div>

            <div class="btn_loginUser">
                <a href="../../pages/manager/login.php">Login</a>
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