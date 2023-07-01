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
<style>
    header nav a .active{
        border-bottom: 1px solid white;
    }

    .btn1 {
        margin-top: 1rem;
        display: inline-block;
        padding: 0.3rem 1rem;
        font-size: 1.5rem;
        color: rgb(181, 184, 175);
        border: 0.2rem solid rgb(222, 226, 214);
        border-radius: 5rem;
        cursor: pointer;
        background: none;
    }

    .btn1:hover {
        background: rgb(181, 184, 175);
        color: #111;
    }

    /* class */
    .cards {
        display: coloumn;
        grid-template-columns: repeat(20%, minmax(10px, 0.5fr));
        padding-left: 25%;
        padding-right: 25%;
        margin: 10px;
        grid-gap: 2px;
        color: white;
    }

    .card {
        background-color: #222;
        border-radius: 20px;
    }

    .details {
        padding: 15px;
    }

    .details p {
        font-size: 1.4rem;
    }

    .details h3 {
        font-size: 2rem;
    }

    .img {
        height: 80%;
        overflow: hidden;
        width: 90%;
        border-radius: 20px;
    }

    .img img {
        height: 100%;
        width: 28rem;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .img1 {
        height: 80%;
        position: relative;
        margin-top: 2%;
        width: 80%;
    }

    .img1 img {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
        object-fit: cover;
        border-radius: 15px;
    }

    .btn3 {
      margin-top: 1rem;
      display: inline-block;
      padding: 0.4rem 2rem;
      font-size: 1.7rem;
      color: rgb(181, 184, 175);
      border: 0.2rem solid rgb(181, 184, 175);
      border-radius: 5rem;
      cursor: pointer;
      background: none;
    }

    .btn3:hover {
      background: rgb(181, 184, 175);
      color: #111;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
	</script>

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
    $select_stmt = $database->prepare("SELECT booking.book_code, booking.username, booking.date, booking.people, destinasi.judul, destinasi.gambar, destinasi.path_detail_destinasi
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
        $path_detail_destinasi = $row['path_detail_destinasi'];
        ?>
		<div class="cards">
            <div class="card">
                <div class="details">
                    <table>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="img">
                                        <img src="<?php echo $gambar ?>">
                                    </div>
                                </th>
                                <td>
                                    <h3><?php echo $judul ?></h3>
                                    <p>booked for <?php echo $people?> people on <?php echo $date ?></p>
                                    <a href="<?php echo $path_detail_destinasi ?>" class="btn1" style="color: white;">DETAIL</a>
                                <?php
                                    // Popup content
                                    if ($judul === "Land & Water - Walking + Boat tour") {
                                        ?>
                                        <div class="popup" id="popup">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Land & Water - Walking + Boat tour</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img1">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> we will walk through the backstreets and the squares.
                                                                    <br>> We will cross the famous Bridge, the oldest over the Grand Canal, and explore the bustling surroundings of the best fresh produce market in the city.
                                                                    <br>> The last hour will be on a luxury private boat.
                                                                    <br>> Possibility to end the tour to the Island of Murano to visit a private glass factory.</h2>
                                                                    <br>
                                                                    <h2>Duration: 3 hours + 1.</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c1" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif ($judul === "Grand Canal by Private Boat + Cicchetti & Wine Tour") {
                                        ?>
                                        <div class="popup" id="grand">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Grand Canal by Private Boat + Cicchetti & Wine Tour</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img1">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> This private tour by motor launch and you can admire the magnificent palaces with the help of your guide recounting the stories and history.
                                                                    <br>> When you got off the boat you can walk through Fondamenta della Misericordia.
                                                                    <br>> You can enjoy the typicals Venetians cicchetti (food bites) with local wine. 
                                                                    </h2>
                                                                    <br>
                                                                    <h2>Duration only Boat:1 hour.</h2>
                                                                    <h2>Duration (Boat + Cicchetti): 2 hours.</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c2" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif ($judul === "Galleria dell' Accademia") {
                                        ?>
                                        <div class="popup" id="galleria">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Galleria dell' Accademia</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> priority entrance with David Florence tickets to the Accademia Gallery.</h2>
                                                                    <br>
                                                                    <h2>Duration: Approx. 1.5 hours</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c3" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif ($judul === "The colorful islands: Murano & Burano") {
                                        ?>
                                        <div class="popup" id="murano">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>The colorful islands: Murano & Burano</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> we will visit the most beautiful islands of Venice: Murano & Burano!
                                                                    <br>> It is a boat tour with a private watertaxi, the first stop is the island of Murano, where the glass blowing dates back to the 10th century.
                                                                    <br>> Then we will visit Burano, a fishermen's island known for its vibrant multi-colored houses.
                                                                    </h2>
                                                                    <br>
                                                                    <h2>Duration: 4 or 5 hours.</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c4" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif ($judul === "St. Mark Square: Doge's Palace & Golden Basilica Tour") {
                                        ?>
                                        <div class="popup" id="mark">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>St. Mark Square: Doge's Palace & Golden Basilica Tour</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> an overview of the courtyard, and carry on through the the Institutional Chambers: the most magnificent is the Chamber of the Great Council.
                                                                    <br>> we will discover one of the world's most majestic cathedrals, a true masterpiece of Byzantine art
                                                                    <br>> I will also lead you over the Bridge of Sighs, to the Prisons.
                                                                    </h2>
                                                                    <br>
                                                                    <h2>Duration: 2 hours.</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c5" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif ($judul === "Lido di Venezia Beach") {
                                        ?>
                                        <div class="popup" id="lido">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Lido di Venezia Beach</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> you can use all Alilaguna boat transfers for 72 hours from the time you exchange your voucher.
                                                                    <br>> Get around Venice using any of the three lines to explore the city at your own pace.
                                                                    <br>> including the line that connects Venice Marco Polo Airport and the Venice cruise port to the city center, Lido and Murano Island.
                                                                    </h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c6" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif ($judul === "Doge's Palace & Basilica Treasure Hunt") {
                                        ?>
                                        <div class="popup" id="treasure">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Doge's Palace & Basilica Treasure Hunt</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                    <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                    <h2>> This tour is designed especially for children to engage with the history and art of Venice.
                                                                    <br>> Ideal for children aged between 5-12 years.
                                                                    <br>> After skipping the queques I will lead your family through the Basilica and Doge's Palace, with clues and riddles
                                                                    </h2>
                                                                    <br>
                                                                    <h2>Duration 2 hours.</h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c7" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif ($judul === "Cooking Class & Lunch of typical Venetian Recipes") {
                                        ?>
                                        <div class="popup" id="cooking">
                                            <div class="popup-content" style="color: black;">
                                                <div class="popup-header">
                                                    <p style="font-size: 2rem;"><b>Cooking Class & Lunch of typical Venetian Recipes</b></p>
                                                </div>
                                                <div class="popup-text">
                                                    <table style="margin-right: 10%; margin-left: 10%">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="img">
                                                                        <img src="<?php echo $gambar ?>">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <h1>you booked this destination for <?php echo $people?> people.
                                                                        <br>The tour will be held on <?php echo $date ?></h1><br>
                                                                        <h2>> The cooking classes are leaded by a Venetian chef in his home.
                                                                        <br>>  Fish and Meat menu available. Welcome drink. Pilchards in sweet and sour, scallops au gratin in Venetian style and so on
                                                                        </h2>
                                                                        <br>
                                                                        <h2>
                                                                            <br>Duration: 4 hours.<br>
                                                                            (from 10.00 am to 2.00 pm)<br>
                                                                            From 1 to 6 people.
                                                                        </h2>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="#c8" class="btnn popup-btn">CLOSE</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <?php
      }
    } else {
      // Tampilkan pesan jika keranjang kosong
    ?>
      <br><br><br><br><br><br>
      <div class="heading">
        <span>Go get your vacation!</span><br>
        <a href="form.php" class="btn3">book now</a>
      </div>
    <?php
    }
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

</body>
</html>