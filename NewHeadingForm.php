<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 09/04/2018
 * Time: 13:20
 */


include "db.php";

$id = $_POST["id"];

$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");

/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}

$HeadingLabel = $_POST["HeadingLabel"];

//printf("Last inserted record has id %d\n", mysql_insert_id());
print_r($HeadingLabel);

foreach($HeadingLabel as $element)
{
    mysql_query("INSERT INTO cardsortdb.headings (HeadingLabel, Project) VALUES ('$element', '$id')");

}

header("Location: https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/home.php");
exit();