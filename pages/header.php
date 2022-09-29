<?php 
  $users = (isset( $_SESSION['customers'])) ? $_SESSION['customers'] : [];
?>


<!DOCTYPE html>
<html>

<head>
  <title>Shop Fruit</title>
  <link rel="stylesheet" href="../style/index.css">
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
      <img src="../img/img_logo/logo.jpg" alt="" class="logo">
      <ul id="ul_nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../html/all_product.html">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href="../html/contactUs.html">Contact</a></li>
        <li><a href="#">Blog</a></li>
      </ul>

      <div class="search">
        <input type="text" placeholder="Search Item....">
        <i class="bi-search" id="search_icon"></i>
      </div>

      <div class="icon">
        <i class="bi bi-heart love"></i>
        <a href="../html/cart.html"><i class="bi bi-cart2 cart"></i></a>

        <?php if (isset($users['customer_username'])) { ?>

          <div class="dropdown">
            <i class="bi bi-person-circle user" id="user"> <?php echo $users['customer_username'] ?> </i>

            <div class="drop_menu" id="drop_menu">
              <!-- <li><a href="./dangnhap.php">Dang nhap</a></li>
                            <li><a href="./dangky.php">Dang ki</a></li> -->
              <li><a href="../pages/logout.php">Logout</a></li>
            </div>
          </div>

        <?php } else { ?>
          <div class="dropdown">
            <i class="bi bi-person-circle user" id="user"></i>

            <div class="drop_menu" id="drop_menu">
              <li><a href="../pages/manager/login.php">Loign</a></li>
              <li><a href="../pages/manager/register.php">Register</a></li>
              <!-- <li><a href="#">dang xuat</a></li> -->
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="list_icon">
        <i class="bi bi-list"></i>
      </div>
    </div>
  </header>

</body>

<script src="../js/user.js"></script>

</html>