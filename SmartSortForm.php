<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 11/04/2018
 * Time: 13:21
 */

include "db.php";

$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}


if(isset($_POST['ProjectCode'])) {
    $code = mysql_real_escape_string($_POST['ProjectCode']);


    // **********************************************
    //          GET PROJECT INFO
    // **********************************************

    $sqlQry = "SELECT * FROM cardsortdb.projects WHERE Link = '$code'";

    $result = mysql_query($sqlQry, $db);
    if ($result == false) {
        echo "query has failed";
    } else {
        $row = mysql_fetch_array($result);
        if ($row["ProjectID"] != null){
            echo uniqid('Project exists, this is the unique userID prefix: ');
            $projectID = $row["ProjectID"];
        }
        else if ($row["ProjectID"] == null) {
            echo "No project";
        }
    }

    // **********************************************
    //          GET CARDS
    // **********************************************

    $sqlQry = "SELECT * FROM cardsortdb.cards WHERE Project = '$projectID'";
    // echo $sqlQry;

    $result = mysql_query($sqlQry, $db);
    if ($result == false) {
        echo "query has failed";
    } else {
//        $row = mysql_fetch_array($result);
        while ($row = mysql_fetch_array($result)){

            echo'<div id="yes-drop" class="draggable drag-drop">';
            echo $row["CardLabel"];
            echo '</div>';
        }
    }

    // **********************************************
    //          GET HEADINGS
    // **********************************************

    $sqlQry = "SELECT * FROM cardsortdb.headings WHERE Project = '$projectID'";
    //echo $sqlQry;

    $result = mysql_query($sqlQry, $db);
    if ($result == false) {
        echo "query has failed";
    } else {
//        $row = mysql_fetch_array($result);
        while ($row = mysql_fetch_array($result)){
            echo'<div id="heading" class="dropzone">';

            echo $row["HeadingLabel"];
            echo '</div>';
        }
    }

}
