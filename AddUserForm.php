<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 18/04/2018
 * Time: 16:52
 */
?>

<html>
<head>
<meta http-equiv="refresh" content="0; url=Customers.php" />
</head>
<body>
<?php
include "db.php";
// get content from form
$privileges = $_POST["priveleges"];
$firstname = $_POST["firstname"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = crypt($_POST['password'],'mysalt');

// SQL Insert using variable names
mysql_query("INSERT INTO cardsortdb.user(Privileges, FirstName, Surname, Email, Username, Password) 
VALUES ('$priveleges', '$firstname', '$surname', '$email', '$password')", $db);


echo "New user added <br>";
?>
</body>
</html>