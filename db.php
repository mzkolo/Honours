<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 22/02/2018
 * Time: 19:41
 */


// CONNECT TO DATABASE
$db = mysql_connect("silva.computing.dundee.ac.uk", "cardsort",
"9844.cs.4498");
//SELECT DATABASE - use your own database name
mysql_select_db("cardsortdb");
if(!$db){
echo mysql_error();
}
else{
echo "Successfully connected to DB. <br>";
}
// CLOSE CONNECTION

//$servername = "silva.computing.dundee.ac.uk";
//$username = "cardsort";
//$password = "9844.cs.4498";
////$dbname = "cardsortdb";
//
//// Create connection
//$db = new mysqli($servername, $username, $password);
//
//// Check connection
//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}

?>


