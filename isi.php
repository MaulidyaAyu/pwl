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
        <a data-aos="zoom-in-left" data-aos-delay="300" href="#home">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="#about">about</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="#destination">destination</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#services">services</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="#gallery">gallery</a>
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="#review">review</a>
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="order.php" class="btn">ORDERS</a>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">follow us</span>
        <h3 data-aos="fade-up" data-aos-delay="300">to the Venice</h3>
        <p data-aos="fade-up" data-aos-delay="450">You will discover Venice through the eyes of a real Venetian!</p>
    </div>

</section>

<!-- home section ends -->
<!-- about section starts  -->

<section class="about" id="about">

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <video src="images/about-vid-1.mp4" muted autoplay loop class="video"></video>
        <div class="controls">
            <span class="control-btn" data-src="images/about-vid-1.mp4"></span>
            <span class="control-btn" data-src="images/about-vid-2.mp4"></span>
            <span class="control-btn" data-src="images/about-vid-3.mp4"></span>
        </div>
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="300">
        <span>why choose us?</span>
        <h3>Venice's Awaits You!</h3>
        <p>Apakah Anda tertarik untuk bepergian ke kota Venesia, berlayar, atau memasak hidangan baru — kami berkomitmen untuk menginspirasi Anda untuk mengalami perjalanan dengan cara yang benar-benar baru. Koleksi perjalanan dan buku panduan Havana Tour pasti akan menginspirasi para traveler di dalamnya.</p>
    </div>

</section>

<!-- about section ends -->

<!-- destination section starts  -->
<section class="destination" id="destination">

    <div class="heading">
        <span>our destination</span>
        <h1>make yours destination</h1>
    </div>


<div class="box-container">
    <?php
    require_once "config.php";
    $select_stmt = $database->prepare("SELECT * FROM destinasi WHERE tampil='destinasi'");
    $select_stmt->execute();
    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_destinasi = $row['id_destinasi'];
        $gambar = $row['gambar'];
        $judul = $row['judul'];
        $keterangan = $row['keterangan'];
        $alt = $row['alt'];
        $path_detail_destinasi = $row['path_detail_destinasi'];
    ?>
        <div class="box" data-aos="fade-up" data-aos-delay="50">
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
<!-- destination section ends -->

<div class="popup" id="popup">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Land & Water - Walking + Boat tour</h2>
            <a href="#c1" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>During this tour we will enjoy a stroll to the very heart of Venice, the St. Marks Area. You will not only experience the atmosphere of Venice and wonders of this unique city but you will feel the real essence of the city!</h3><br>
                <h3>After St. Mark's square, staying away from the crowds, we will walk through the backstreets and the squares to explore the city's layout.
                We'll end our visit in the busy neighborhood of Rialto, once the trade centre of Venice. We will cross the famous Bridge, the oldest over the Grand Canal, and explore the bustling surroundings of the best fresh produce market in the city (closed on Sunday and Monday)!</h3>
                <br>
                <h3>The last hour will be on a luxury private boat -the best way to appreciate Venice is from the water perspective. During this unique opportunity you enjoy all the best scenarios Venice presents: the peaceful small and narrow canals, passing under some of the 400 bridges of Venice, while observing the vibrant reverberation of the buildings reflecting on the water surface.
                Possibility to end the tour to the Island of Murano to visit a private glass factory.</h3>
                <br>
                <h3>Duration: 3 hours + 1.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="grand">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Grand Canal by Private Boat + Cicchetti & Wine Tour</h2>
            <a href="#c2" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>The Gran Canal of Venice is the most spectacular “high street” in the world. The sumptuous palaces were constructed over hundreds of years and slowly the Grand Canal became what is today.
                Take this private tour by motor launch and you can admire the magnificent palaces with the help of your guide recounting the stories and history.
                When you got off the boat you can walk through Fondamenta della Misericordia, the most suggestive “popular” part of Venice, where you can enjoy the typicals Venetians cicchetti (food bites) with local wine.</h3><br>
            <h3>Duration only Boat:1 hour.</h3>
            <h3>Duration (Boat + Cicchetti): 2 hours.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="galleria">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Galleria dell' Accademia</h2>
            <a href="#c3" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>A privileged and exclusive cultural experience: easy, hassle-free priority entrance with David Florence tickets to the Accademia Gallery, home to Michelangelo's masterpiece!</h3>
            <br>
            <h3>Admired and acclaimed by experts and travelers worldwide this amazing sculpture is not only one of the greatest works of art ever, but it is also an icon of the Renaissance, one of the most revolutionary artistic periods of all times.</h3>
            <br>
            <h3>Carved from a single block of far-from-perfect Carrara marble when Michelangelo was only in his twenties the sculpture is truly impressive. Enjoy the chance to learn all this, and much more, from your experienced professional guide!</h3>
            <br>
            <h3>Duration: Approx. 1.5 hours</h3>

        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="murano">
    <div class="popup-content">
        <div class="popup-header">
            <h2>The colorful islands: Murano & Burano</h2>
            <a href="#c4" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>With this tour we will visit the most beautiful islands of Venice: Murano & Burano!
                It is a boat tour with a private watertaxi, the first stop is the island of Murano, where the glass blowing dates back to the 10th century. Whilst watching one of the glass masters blowing and shaping the glass in the furnace, you will learn the history and the process of the glass making throughout the years.</h3>
            <br>
            <h3>Then we will visit Burano, a fishermen's island known for its vibrant multi-colored houses. I will lead you through the narrow alleyways and you will be amazed by the true culture and lifestyle of this charming, picturesque town, famous also for the millenary lace-work.</h3>
            <br>
            <h3>Duration: 4 or 5 hours.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="mark">
    <div class="popup-content">
        <div class="popup-header">
            <h2>St. Mark Square: Doge's Palace & Golden Basilica Tour</h2>
            <a href="#c5" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>Explore the Doge's Palace, the true heart of Venetian political power where the Doge and his council took the decisions for the Venetian Republic. I will start with an overview of the courtyard, and carry on through the the Institutional Chambers: the most magnificent is the Chamber of the Great Council.
                I will also lead you over the Bridge of Sighs, to the Prisons. After that we will discover one of the world's most majestic cathedrals, a true masterpiece of Byzantine art! From the ground floor you can admire the beautiful golden mosaics and marble inlay flooring.</h3>
            <br>
            <h3>***Entrance Fees are not included (25 Euro)***</h3>
            <br>
            <h3>Duration: 2 hours.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="lido">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Lido di Venezia Beach</h2>
            <a href="#c6" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>The Venice Lido (Lido di Venezia), a long stretch of sand in the Venetian Lagoon, is an easy escape for a quick beach break, round of golf, bout of shopping, or leisurely meal. Along several water bus lines and just minutes from the center of Venice, sneaking away from the crushing crowds of St. Mark's Square couldn't be simpler.</h3>
            <br>
            <h3>The best ways to experience Venice Lido (Lido di Venezia) are 72-Hour Venice Transportation Pass</h3>
            <br>
            <h3>With this Venice transportation pass, you can use all Alilaguna boat transfers for 72 hours from the time you exchange your voucher.</h3>
            <br>
            <h3>Get around Venice using any of the three lines to explore the city at your own pace, including the line that connects Venice Marco Polo Airport and the Venice cruise port to the city center, Lido and Murano Island.</h3>

        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="treasure">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Doge's Palace & Basilica Treasure Hunt</h2>
            <a href="#c7" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>Enjoy a treasure hunt in St.Mark Square! This tour is designed especially for children to engage with the history and art of Venice. Ideal for children aged between 5-12 years.</h3><br>
            <h3>After skipping the queques I will lead your family through the Basilica and Doge's Palace, with clues and riddles that reveal secrets and artistic masterpieces!</h3><br>
            <h3>A wonderful way for children to enjoy Venice!</h3><br>
            <h3>They will come away having had fun, having learnt about art, religion and history but also they will go back home with...the Venetian Treasure!</h3>
            <br>
            <h3>***Entrance Fees are not included (30Euro)***</h3>
            <br>
            <h3>Duration 2 hours.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<div class="popup" id="cooking">
    <div class="popup-content">
        <div class="popup-header">
            <h2>Cooking Class & Lunch of typical Venetian Recipes</h2>
            <a href="#c8" class="popup-close">&times;</a>
        </div>
        <div class="popup-text">    
            <h3>The cooking classes are leaded by a Venetian chef in his home, the second noble floor of a 1500 prestigious Venetian palace, 10 minutes from Rialto and St.Mark Square.</h3><br>
            <h3>The apartment of 130 mqs with pleasant and family atmosphere, has meticulously been restored in 2015, bringing the original ceilings to the light in wood with a splendid balcony.</h3><br>
            <h3>The sight is typically Venetian, open and fascinating. The bell tower and the Basilica can be admired. Fish and Meat menu available. Welcome drink. Pilchards in sweet and sour, scallops au gratin in Venetian style and so on...
                Buon appetito!</h3><br>
            <h3>Duration: 4 hours.</h3><br>
            <h3>(from 10.00 am to 2.00 pm)</h3><br>
            <h3>From 1 to 6 people.</h3>
        </div>
        <a href="form.php" class="btnn popup-btn">book now</a>
    </div>
</div>

<!-- services section starts  -->

<section class="services" id="services">

    <div class="heading">
        <span>our services</span>
        <h1>countless experiences</h1>
    </div>

    <div class="box-container">

        <div class="box" data-aos="zoom-in-up" data-aos-delay="50">
            <i class="fas fa-globe"></i>
            <h3>worldwide</h3>
            <p>kami memiliki pemandu wisata dengan berbagai bahasa utama. Jadi dari manapun anda berasal, kami siap melayani!</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="100">
            <i class="fas fa-award"></i>
            <h3>experienced</h3>
            <p>selalu ada dalam menghadirkam perjalanan serta melayani industri pariwisata di Venesia</p>
        </div>
        <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
            <i class="fas fa-bus"></i>
            <h3>family trips</h3>
            <p>Karena ada tur untuk setiap anggaran, selera, dan usia, kami menyediakan berbagai jenis Pengawal Tur</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="200">
            <i class="fas fa-hotel"></i>
            <h3>affordable hotels</h3>
            <p>Sistem reservasi untuk seluruh hotel Kota Venesia dimana saja.</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="250">
            <i class="fas fa-wallet"></i>
            <h3>affordable price</h3>
            <p>Harga yang anda bayar sesuai dengan fasilitas terbaik yang anda dapat.</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
            <i class="fas fa-headset"></i>
            <h3>24/7 support</h3>
            <p>Anda dapat menghubungi tim koordinasi Havana Tour 24/7. Anda dapat menghubungi agen pemesanan kami kapan saja untuk dukungan apa pun.</p>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <div class="heading">
        <span>our gallery</span>
        <h1>we record memories</h1>
    </div>
    
    <div class="box-container">

        <div class="box" data-aos="zoom-in-up" data-aos-delay="50">
            <img src="images/g1.jpg" alt="">
            <span>travel spot</span>
            <h3>Golden Basilica</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="100">
            <img src="images/g2.jpg" alt="">
            <span>travel spot</span>
            <h3>Piazza San Marco</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
            <img src="images/g3.jpg" alt="">
            <span>travel spot</span>
            <h3>grand canal</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="200">
            <img src="images/g4.png" alt="">
            <span>travel spot</span>
            <h3>lido di venezia beach</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="250">
            <img src="images/g5.jpg" alt="">
            <span>travel spot</span>
            <h3>rialto bridge</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
            <img src="images/g6.jpg" alt="">
            <span>travel spot</span>
            <h3>cooking class venice</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="350">
            <img src="images/g7.jpg" alt="">
            <span>travel spot</span>
            <h3>peggy guggenheim garden</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="400">
            <img src="images/g8.jpg" alt="">
            <span>travel spot</span>
            <h3>galleria dell'Accademia</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
            <img src="images/g9.jpg" alt="">
            <span>travel spot</span>
            <h3>The colorful islands</h3>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="500">
            <img src="images/g10.jpg" alt="">
            <span>travel spot</span>
            <h3>giant hand</h3>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <div class="content" data-aos="fade-right" data-aos-delay="50">
        <span>testimonials</span>
        <h3>good news from our clients</h3>
        <p>
            Pada akhir tahun 2019 kami telah menyambut lebih dari 3.000 tamu dari 24 negara di seluruh dunia, menerima rata-rata 4,8/5 bintang di situs web perjalanan seperti Airbnb dan Penasihat Perjalanan. Namun kami terus tumbuh dan berkembang dari hari ke hari!</p>
    </div>

    <div class="box-container" data-aos="fade-left" data-aos-delay="100">

        <div class="box">
            <p>pemandangan yang sangat luar biasa dan tour guide yang sangat baik dan sangat membantu, terimah kasih!</p>
            <div class="user">
                <img src="images/pic-1.png" alt="">
                <div class="info">
                    <h3>Jonathan Lee</h3>
                    <span>traveler</span>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Luar biasa!!!!!! Pemandu wisatanya tahu segalanya dan benar-benar berbicara dengan kami sepanjang waktu, memberi tahu kami sejarah Venesia! Sangat baik dan ramah dan pengalaman hebat yang tidak akan Anda dapatkan di gondola di kanal. Sangat dipersonalisasi. Highlight kami tinggal di Venesia</p>
            <div class="user">
                <img src="images/pic-2.png" alt="">
                <div class="info">
                    <h3>Chirstine</h3>
                    <span>designer</span>
                </div>
            </div>
        </div>
        <div class="box">
            <p>It was amazing to explore the hidden gems of Venice with Havana Tour, their tour guide's knowledge and love for the city really shows! We had a great time cruising around! The experience will show you so many things about Venice you didn't know! Highly recommend</p>
            <div class="user">
                <img src="images/pic-3.png" alt="">
                <div class="info">
                    <h3>Stasia</h3>
                    <span>photographer</span>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Dapat melihat hal-hal di sekitar pulau yang tidak akan saya lihat jika bukan karena mengikuti tour ini!</p>
            <div class="user">
                <img src="images/pic-4.png" alt="">
                <div class="info">
                    <h3>Laela Riani</h3>
                    <span>traveler</span>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- banner section starts  -->

<div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="500">
        <span>start your adventures</span>
        <h3>Let's Explore Venice!</h3>
        <p>We strongly believe in authentic and intimate tours of small groups of people, giving the chance to experience Venice and its surroundings as locals do!</p>
        <a href="form.php" class="btn">book now</a>
    </div>



</div>

<!-- banner section ends -->
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="50">
            <a href="#" class="logo"> <i class="fas fa-paper-plane"></i>HAVANA TOUR </a>
            <p>FOLLOW US OUT THERE FOR MORE</p>
            <div class="share">
                <a href="http://facebook.com/neena" class="fab fa-facebook-f"></a>
                <a href="https://twitter.com/thorqish" class="fab fa-twitter"></a>
                <a href="http://instagram.com/arrdiena" class="fab fa-instagram"></a>
                <a href="https://www.youtube.com/channel/UCT_f2yKWj4Iz6sXExfL08Rg" class="fab fa-youtube"></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="100">
            <h3>quick links</h3>
            <a href="#home" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#about" class="links"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="#destination" class="links"> <i class="fas fa-arrow-right"></i> destination </a>
            <a href="#services" class="links"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="#gallery" class="links"> <i class="fas fa-arrow-right"></i> gallery </a>
            <a href="#review" class="links"> <i class="fas fa-arrow-right"></i> review </a>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <h3>contact info</h3>
            <p> <i class="fas fa-map"></i> Semarang, Indonesia </p>
            <p> <i class="fas fa-phone"></i> +62857-1314-9060 </p>
            <p> <i class="fas fa-envelope"></i> neenaardiena@gmail.com </p>
            <p> <i class="fas fa-clock"></i> 7:00am - 10:00pm </p>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="200">
            <h3>feedback</h3>
            <p>SSilahkan beri Feedback Anda untuk kami agar bla bla bla.</p>
            <form action="" method="post">
                <input type="text" name="feedback" placeholder="enter your feedback" class="email" id="email">
                <button name="submit" class="btn">subscribe</button>
            </form>
        </div>

    </div>

</section>

<div class="credit">created by <span>neenaardiena</span> | all rights reserved!</div>

<!-- footer section ends -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

</body>
</html>