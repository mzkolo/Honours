<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 18/04/2018
 * Time: 17:34
 */
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	</head>
	<header>
	<h3><a href="login.php">Login</a><h3>
	</header>

	<body>

    <?php
include "db.php";
?>
	<form name="Add customer member" action="AddUserForm.php" method="post" id = "add" class="center">
	<div class="field">
	<label>Firstname</label>
	<input type="text" name="firstname"><br>
	<label>Surname</label>
	<input type="text" name="surname"><br>
	<label>Address</label>
	<input type="text" name="address"><br>
	<label>City</label>
	<input type="text" name="city"><br>
	<label>Postcode</label>
	<input type="text" name="postcode"><br>
	<label>Email</label>
	<input type="text" name="email"><br>
	<label>Phone Number</label>
	<input type="text" name="phonenumber"><br>
	<label>Password</label>
	<input type="text" name="password"><br>
	<input type="submit" value="Submit">
	</div>
	</form>
	</body>
</html>