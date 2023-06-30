<?php

include 'config.php';
// error_reporting(0);

session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    header nav a .active{
        border-bottom: 1px solid white;
    }

    .btn1 {
      display: inline-block;
      padding: 0.2rem 0.6rem;
      color: rgb(181, 184, 175);
      border: 0.2rem solid rgb(181, 184, 175);
      border-radius: 1rem;
      cursor: pointer;
      background: none;
    }

    .btn1:hover {
      background: rgb(97, 99, 94);
    }
  </style>
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
        <a href="order.php">orders</a>
    </nav>

    <a href="logout.php" class="btn">LOGOUT</a>

</header>

<section class="destination" id="destination">

  <div class="heading">
    <br><br><br><br><br>
  </div>

  <div class="box-container">
    <?php
    require_once "config.php";
    $username = $_SESSION['username'];
    $select_stmt = $database->prepare("SELECT booking.book_code, booking.username, booking.date, booking.people, destinasi.judul, destinasi.gambar 
                                        FROM booking 
                                        JOIN destinasi ON booking.destination = destinasi.id_destinasi WHERE booking.username = '$username'");
    $select_stmt->execute();
    if ($select_stmt->rowCount() > 0) {
      while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        $date = $row['date'];
        $people = $row['people'];
        $judul = $row['judul'];
        $gambar = $row['gambar'];
        $book_code = $row['book_code'];
        ?>
        <div class="box">
            <div class="image">
              <img src="<?php echo $gambar ?>">
            </div> 
            <div class="content">
              <h3><?php echo $judul ?></h3>
              <p>booked for <?php echo $people?> people on <?php echo $date ?></p>
              <a href="editOrder.php?book_code=<?php echo $book_code ?>" class="btn1" style="margin-left: 53%">EDIT</a>
              <a href="deleteOrder.php?book_code=<?php echo $book_code ?>" class="btn1" style="margin-left: 4%">DELETE</a>
            </div>
        </div>
        <?php
      }
    } else {
      // Tampilkan pesan jika keranjang kosong
      ?>
      <br><br><br><br><br><br>
      <div class="heading">
        <span>Go get your destination!</span>
      </div>
    <?php
    }
    ?>
</div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

<style>
  .box-container {
  flex-direction: column;
  gap: 1rem;
}

.box {
  border-radius: 1rem;
  overflow: hidden;
  background: #222;
  width: 100%;
  max-width: 40rem;
}

.box:hover img {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.box .image {
  height: 20rem;
  overflow: hidden;
  width: 100%;
}

.box .image img {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;     
  object-fit: cover;
}

.box .content {
  padding: 2rem;
  text-align: center;
}

.box .content h3 {
  font-size: 2rem;
  color: #fff;
}

.box .content p {
  padding: 1rem 0;
  font-size: 1.4rem;
  color: #aaa;
  line-height: 2;
}

.box .content a {
  font-size: 1.7rem;
  color: rgb(181, 184, 175);
}

.box .content a:hover i {
  padding-left: 1rem;
}

.box .content a i {
  padding-right: .5rem;
}

</style>
 

</body>
</html>