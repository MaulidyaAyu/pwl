<?php

include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$phone_number = $_POST['phone'];
	$date = $_POST['bdate'];
	$people = $_POST['people'];
	$destination = $_POST['destination'];
	
	$sql = "INSERT INTO booking (username, phone_number, date, people, destination)
			VALUES ('$username', '$phone_number', '$date', '$people', '$destination')";
	$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Wow! User booking Completed.'); window.location.href='isi.php';</script>";
			$phone_number = "";
			$date = "";
			$people = "";
			$destination = "";
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
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
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login-email">
            <p class="login-text" style="font-size: 3rem; font-weight: 800;">BOOK NOW</p>
			<p class="login-text" style="font-size: 1.2rem; font-weight: 400;">You will discover Venice through the eyes of a real Venetian!</p>
			<div class="input-group">
				<input type="text" placeholder="phone number" name="phone" value="<?php echo $phone; ?>" required>
			</div>
			<div class="main-form">
				<div><input type="date" placeholder="date" name="bdate" value="<?php echo $_POST['bdate']; ?>" required></div>
            </div><br><br>
            <div class="main-form">
				<div><select placeholder="many people" name="people" id="people" value="<?php echo $_POST['people']; ?>" required>
                        <option value="">---People---</option>
                        <option value="1">1 People</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
						<option value="more">more</option>
                    </select></div>
			</div><br><br>
			<div class="main-form">
				<div><select placeholder="destination" name="destination" id="destination" value="<?php echo $_POST['destination']; ?>" required>
                        <option value="">---Destination---</option>
                        <option value="d1">des. 1</option>
                        <option value="d2">des. 2</option>
                        <option value="d3">des. 3</option>
                        <option value="p1">paket 1</option>
						<option value="p2">paket 2</option>
                    </select></div>
			</div>
			<div id="submit">
				<button name="submit" class="btn">BOOK</button>
			</div>
		</form>
	</div>
	
	
</body>
</html>