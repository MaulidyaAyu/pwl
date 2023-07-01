<?php
// payment_success.php

session_start();
if (!isset($_SESSION["username"])) {
    header("location: index.php");
    exit;
}

include 'config.php';

if (isset($_GET['book_code']) && isset($_GET['total_price'])) {
    $book_code = $_GET['book_code'];
    $total_price = $_GET['total_price'];

    // Update the payment status for the given book code
    $update_stmt = $database->prepare("UPDATE booking SET payment_status = 1 WHERE book_code = :book_code");
    $update_stmt->bindParam(':book_code', $book_code);
    $update_stmt->execute();

    // Retrieve the order details from the database
    $select_stmt = $database->prepare("SELECT * FROM booking WHERE book_code = :book_code");
    $select_stmt->bindParam(':book_code', $book_code);
    $select_stmt->execute();
    $order = $select_stmt->fetch(PDO::FETCH_ASSOC);

    $select_stmt = $database->prepare("SELECT booking.*, destinasi.judul, destinasi.harga
                                        FROM booking 
                                        JOIN destinasi ON booking.destination = destinasi.id_destinasi
                                        WHERE booking.book_code = :book_code");
    $select_stmt->bindParam(':book_code', $book_code);
    $select_stmt->execute();
    $order = $select_stmt->fetch(PDO::FETCH_ASSOC);

    // Display the payment success notification and order details
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Success</title>
        <link rel="shortcut icon" href="images/icon.jpg" ; type="image/x-icon;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

        <!-- custom js file link  -->
        <script src="js/script.js" defer></script>

	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	    <link rel="stylesheet" type="text/css" href="css/style.css">

        <style>
            .container1 {
                width: 500px;
                min-height: 400px;
                border-radius: 5px;
                padding: 50px 20px;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
            }

            .content {
                text-align: left;
                display: block;
                color: white;
                margin-left: 16%;
            }

            .container1 .text {
                text-align: center;
                display: block;
                color: #fff;
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
                margin-left: 40%;
            }

            .btn1:hover {
                background: rgb(181, 184, 175);
                color: #111;
            }

        </style>

    </head>
    <body>

    <div class="container1">
            <p class="text" style="font-size: 3rem; font-weight: 600;">Payment Successful!</p>
			<p class="text" style="font-size: 1.7rem; font-weight: 300;">Thank you for your payment.</p>
            <br><br>
            <p class="content" style="font-size: 1.7rem; font-weight: 600;">Your order details:</p>
            <p class="content" style="font-size: 1.8rem; font-weight: 300;">
            name: <?php echo $order['username']; ?>
            <br>tour start at: <?php echo $order['date']; ?>
            <br>tour Destination: <?php echo $order['judul']; ?>
            <br>amount of People: <?php echo $order['people'] ; ?>
            <br>price: IDR <?php echo $order['harga']?>
            <br>Total Price: IDR <?php echo $total_price; ?></p><br><br>
            <a href="order.php" class="btn1">DONE</a>
    </div>

    </body>
    </html>

    <?php
} else {
    // If the required parameters are not provided, redirect back to the cart page or display an error message.
    header("location: cart.php");
    exit;
}
?>
