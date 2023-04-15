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

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="order.php" class="btn">HISTORY</a>

</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>


</body>
</html>