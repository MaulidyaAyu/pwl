<?php

include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$feedback = $_POST['feedback'];
	
	$sql = "INSERT INTO fb (username, feedback)
			VALUES ('$username', '$feedback')";
	$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Wow! User feedback's Completed.')</script>";
			$username = "";
			$feedback = "";
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
}
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
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="isi.php" class="logo"> <i class="fas fa-plane"></i>Havana Tour</a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="isi.php#home">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="isi.php#about">about</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="isi.php#destination">destination</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="isi.php#services">services</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="isi.php#gallery">gallery</a>
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="isi.php#review">review</a>
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="order.php" class="btn">ORDERS</a>

</header>

<section class="destination" id="destination" style="padding-top:100px">
    <div class="heading">
        <h1>Your Orders</h1>
    </div>

    <div class="box-container" style="width: 100%;">
        <?php
        require_once "config.php";
        $select_stmt = $database->prepare("SELECT * FROM booking WHERE username = :username");
        $select_stmt->bindParam(':username', $username);
        $select_stmt->execute();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
            $phone_number = $row['phone_number'];
            $date = $row['date'];
            $people = $row['people'];
            $destination = $row['alt'];
        ?>
            <div class="box">
                <div class="image">
                    <img src="<?php echo $gambar ?>" alt="<?php echo $alt ?>">
                </div> 
                <div class="content">
                    <h3><?php echo $judul ?></h3>
                    <p><?php echo $keterangan ?></p>
                    <a href="<?php echo $path_detail_destinasi?>">read more <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>


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
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
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