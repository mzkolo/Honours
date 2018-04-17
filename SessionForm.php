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

$userID = uniqid('Project exists, this is the unique userID prefix: ');
$projectID = $_POST["id"];
$obj = $_POST["obj"];

//$obj = (object) array(
//    91 => (object) array(
//        'header_id' => 34
//    ),
//    92 => (object) array(
//        'header_id' => 35
//    ),
//);

//print_r($obj);

$string = " ";

foreach($obj as $index=>$key){

//    $card_id = $index;
//    $header_id = $key["header_id"];
//
//    $string .= $card_id . "+".$header_id."-";

}

echo json_encode($obj);


