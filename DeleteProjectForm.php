<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 07/04/2018
 * Time: 14:40
 */

?>

<html>
<head>
<!--    <meta http-equiv="refresh" content="0; url=home.php" />-->
</head>
<body>
<?php
include "db.php";
// get content from form
$id = $_POST["id"];
// SQL Insert using variable names
$sql = "SELECT ProjectID FROM projects WHERE ProjectID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
    mysql_query("Delete FROM projects WHERE ProjectID = '$id'", $db);
    echo "A branch was successfully removed <br>";
}
else
{
    echo "There is no project with such ID";
}

?>
</body>
</html>
