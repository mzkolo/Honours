<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 15/04/2018
 * Time: 16:21
 */



/**
for each heading{
    create array for heading;
        for each card in heading  {
        insert into db;
    }
}
 */

include "db.php";

$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}

$userID = uniqid();
$projectID = $_POST["id"];
$obj = $_POST["obj"];


foreach($obj as $index=>$key){

    if($key != null)
    {
        $card_id = $index;
        $header_id = $key['header_id'];

        mysql_query("INSERT INTO cardsortdb.studies (userPrefix, projectID, cardID, headingID) VALUES ('$userID', '$projectID', '$card_id', '$header_id')");

//        echo "The user id " .$userID . "This is card id " . $card_id . " under the header id " . $header_id . "from the project " . $projectID;
        echo "<br>";
    }

}

