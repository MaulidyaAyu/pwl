<?php
require_once "config.php";

if(isset($_GET['book_code'])) {
  $book_code = $_GET['book_code'];

  $select_stmt = $database->prepare("SELECT * FROM booking WHERE book_code = :book_code");
  $select_stmt->bindParam(':book_code', $book_code);
  $select_stmt->execute();
  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

  $phone_number = $row['phone_number'];
  $date = $row['date'];
  $people = $row['people'];
  $destination = $row['destination'];
}

if(isset($_POST['update'])) {

  $phone_number = $row['phone_number'];
  $date = $_POST['date'];
  $people = $_POST['people'];
  $destination = $_POST['destination'];

  $update_stmt = $database->prepare("UPDATE booking SET phone_number = :phone_number, date = :date, people = :people, destination = :destination WHERE book_code = :book_code");
  $update_stmt->bindParam(':date', $date);
  $update_stmt->bindParam(':people', $people);
  $update_stmt->bindParam(':destination', $destination);
  $update_stmt->bindParam(':phone_number', $phone_number);
  $update_stmt->bindParam(':book_code', $book_code);
  $update_stmt->execute();

  header("Location: order.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="images/icon.jpg" ; type="image/x-icon;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Booking Form </title>
</head>
<body>
	<div class="container">
        <form method="post">
            <p class="login-text" style="font-size: 3rem; font-weight: 800;">BOOK NOW</p>
			<p class="login-text" style="font-size: 1.2rem; font-weight: 400;">You will discover Venice through the eyes of a real Venetian!</p>
            
            <div class="main-form">
				<div><input type="text" name="phone_number" value="<?php echo $phone_number; ?>" required></div>
			</div><br><br>

            <div class="main-form">
				<div><input type="date" name="date" value="<?php echo $date ?>" required></div>
            </div><br><br>
            
            <div class="main-form">
				<div>
                    <input type="number" id="people" name="people" min="1" max="36" value="<?php echo $people ?>" required>
                </div>
			</div><br><br>

            <div class="main-form">
				<div><select name="destination" required>
                <?php
                    $select_stmt = $database->prepare("SELECT * FROM destinasi");
                    $select_stmt->execute();
                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_destinasi = $row['id_destinasi'];
                        $judul = $row['judul'];
                        if ($id_destinasi == $destination) {
                            echo "<option value='$id_destinasi' selected>$judul</option>";
                        } else {
                            echo "<option value='$id_destinasi'>$judul</option>";
                        }
                    }
                ?>
            </select></div>
			</div><br>
            <div id="submit">
                <input type="submit" name="update" value="Update" class="btn">
			</div>
        </form>
