<?php

include 'config.php';
// error_reporting(0);

session_start();
if(isset($_SESSION["username"]))
$user = $_SESSION["username"];
else
header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAVANA TOUR</title>
    <link rel="shortcut icon" href="images/icon.jpg" ; type="image/x-icon;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
    header nav a .active{
        border-bottom: 1px solid white;
    }

    .img {
        height: 80%;
        overflow: hidden;
        width: 90%;
        border-radius: 20px;
    }

    .about .video-container1 {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 42rem;
        flex: 1 1 42rem;
    }

    .about .video-container1 img {
        border-radius: 1rem;
        width: 100%;
    }

    .about .video-container1 .controls {
        text-align: center;
        padding: 2rem 0;
    }

    .about .video-container1 .controls span {
        display: inline-block;
        height: 2rem;
        width: 2rem;
        border-radius: 50%;
        background: #fff;
        cursor: pointer;
        margin: .7rem;
    }

    .about .video-container1 .controls span:hover {
        background: rgb(181, 184, 175);
    }

    .btn1 {
        margin-top: 1rem;
        display: inline-block;
        padding: 0.3rem 1rem;
        font-size: 1.5rem;
        color: rgb(181, 184, 175);
        border: 0.2rem solid rgb(222, 226, 214);
        border-radius: 2rem;
        cursor: pointer;
        background: none;
    }

    .btn1:hover {
        background: rgb(181, 184, 175);
        color: #111;
    }

</style>

</head>
<body>
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="isi.php" class="logo"> <i class="fas fa-plane"></i>Havana Tour</a>
 
    <nav class="navbar">
        <a href="isi.php#home"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && empty($_SERVER['QUERY_STRING'])) { echo ' class="active"'; } ?>>home</a>
        <a href="isi.php#about"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && $_SERVER['QUERY_STRING'] == '#about') { echo ' class="active"'; } ?>>about</a>
        <a href="isi.php#destination"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && $_SERVER['QUERY_STRING'] == '#destination') { echo ' class="active"'; } ?>>destination</a>
        <a href="isi.php#services"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && $_SERVER['QUERY_STRING'] == '#services') { echo ' class="active"'; } ?>>services</a>
        <a href="isi.php#gallery"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && $_SERVER['QUERY_STRING'] == '#gallery') { echo ' class="active"'; } ?>>gallery</a>
        <a href="isi.php#review"<?php if(basename($_SERVER['PHP_SELF']) == 'isi.php' && $_SERVER['QUERY_STRING'] == '#review') { echo ' class="active"'; } ?>>review</a>
        <a href="cart.php">cart</a>
        <a href="order.php">order</a>
    </nav>

    <a href="logout.php" class="btn">LOGOUT</a>

</header>

<div class="heading">
    <br><br><br><br><br>
</div>

<?php
require_once "config.php";
$username = $_SESSION['username'];
$select_stmt = $database->prepare("SELECT booking.book_code, booking.username, booking.date, booking.people, destinasi.judul, destinasi.gambar, destinasi.harga
                                  FROM booking 
                                  JOIN destinasi ON booking.destination = destinasi.id_destinasi WHERE booking.username = '$username'");
$select_stmt->execute();
if ($select_stmt->rowCount() > 0) {
  ?>

    <?php
    $totalPrice = 0;
    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
      $date = $row['date'];
      $people = $row['people'];
      $judul = $row['judul'];
      $gambar = $row['gambar'];
      $harga = $row['harga'];
      $book_code = $row['book_code'];
      $subtotal = $harga * $people;
      $totalPrice += $subtotal;
      ?>
<section class="about" id="about">
<div class="video-container1" data-aos="fade-right" data-aos-delay="300">
    <img src="<?php echo $gambar ?>" alt="About Image" class="video">
</div>


    <div class="content" data-aos="fade-left">
        <span><?php echo $judul ?></span>
        <h3>Booking for <?php echo $people?> people <br>
        on <?php echo $date ?></h3>
        <span>price: IDR <?php echo $harga ?>/orang<br>
        Total price: IDR <?php echo $totalPrice ?></span><br><br>
        <a href="cart.php" class="btn1">BACK</a>
        <a href="payment_success.php?book_code=<?php echo $book_code; ?>&total_price=<?php echo $totalPrice; ?>" class="btn1" style="margin-left: 10%;">PAY</a>
    </div>

</section>
      <?php
    }
} ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

</body>
</html>