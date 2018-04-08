<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 29/03/2018
 * Time: 11:48
 */

?>

<html>
<head>
    <!--    <meta http-equiv="refresh" content="0; url=home.php" />-->
</head>
<body>
<br>
<?php
include "db.php";



$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");

/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();

}

$ProjectName = $_POST["ProjectName"];
$label = $_POST["label"];
$category = $_POST["category"];

//$stmt = $mysqli->prepare("INSERT INTO cardsortdb.projects(ProjectName, CardLabel, Category) VALUES (?, ?, ?)");
//$stmt->bind_param("ssi", $ProjectName, $label, $category);


mysql_query("INSERT INTO cardsortdb.projects (ProjectName, Category) VALUES ('$ProjectName', '$category')");
printf("Last inserted record has id %d\n", mysql_insert_id());
print_r($label);

$insert_id = mysql_insert_id();

foreach($label as $element)
{
    mysql_query("INSERT INTO cardsortdb.cards (CardLabel, Project) VALUES ('$element', '$insert_id')");
}

//$stmt = $mysqli->prepare("INSERT INTO cardsortdb.cards(CardLabel, Project) VALUES (?, ?)");
//$stmt->bind_param("si", $label, $insert_id);

//$stmt->execute();
//$stmt->close();
//$mysqli->close();





// get content from form
//$ProjectName = $_POST["ProjectName"];
//$label = $_POST["label"];
//$category = $_POST["category"];

//$sql = "SELECT ProjectID FROM projects WHERE ProjectID='$ProjectID'";

// SQL Insert using variable names
//mysql_query("INSERT INTO cardsortdb.projects(ProjectID, ProjectName, CardLabel, Category)
//VALUES (ProjectID, '$ProjectName', '$label', '$category')", $db);

//echo "New project created <br>";
?>
</body>
</html>
