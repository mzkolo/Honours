<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 29/03/2018
 * Time: 11:48
 */

include "db.php";

$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");

/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();

}

function generateRandomString($length = 6) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        ceil($length/strlen($x)) )),1,$length);
}

$ProjectName = $_POST["ProjectName"];
$label = $_POST["label"];
$category = $_POST["category"];
$link = generateRandomString();

mysql_query("INSERT INTO cardsortdb.projects (ProjectName, Category, Link) VALUES ('$ProjectName', '$category', '$link')");
//printf("Last inserted record has id %d\n", mysql_insert_id());

$insert_id = mysql_insert_id();
foreach($label as $element)
{
    mysql_query("INSERT INTO cardsortdb.cards (CardLabel, Project) VALUES ('$element', '$insert_id')");
}

if(isset($_POST['category']) == "2" || "3"){
    header("Location: https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/HeadingsForm.php?id=".$insert_id);
}

elseif(isset($_POST['category']) == "1"){
    header("Location: https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/home.php");
}

//$stmt = $mysqli->prepare("INSERT INTO cardsortdb.projects(ProjectName, CardLabel, Category) VALUES (?, ?, ?)");
//$stmt->bind_param("ssi", $ProjectName, $label, $category);

//$stmt = $mysqli->prepare("INSERT INTO cardsortdb.cards(CardLabel, Project) VALUES (?, ?)");
//$stmt->bind_param("si", $label, $insert_id);


//$stmt = $mysqli->prepare("INSERT INTO cardsortdb.projects(Link) VALUES (?)");
//$stmt->bind_param("s", $link);


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