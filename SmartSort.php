<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 10/04/2018
 * Time: 19:14
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
//            echo uniqid('Project exists, this is the unique userID prefix: ');
            $projectID = $row["ProjectID"];
            $projectName = $row["ProjectName"];
        }
        else if ($row["ProjectID"] == null) {
            echo "No project";
        }
    }
    echo'<div id="title" ='.$row["ProjectName"].' class="title">';
    echo  $row["ProjectName"];
    echo '</div>';

    // **********************************************
    //          GET HEADINGS
    // **********************************************

    $headings = array();
    $sqlQry = "SELECT * FROM cardsortdb.headings WHERE Project = '$projectID'";

    echo '<div style="position:absolute; left: 300px; top:30px;" class="dropHeadings">';
    $result = mysql_query($sqlQry, $db);
    if ($result == false) {
        echo "query has failed";
    } else {
        while ($row = mysql_fetch_array($result)){
            array_push($headings, $row["HeadingID"]);
            echo'<div id="heading" data-id='.$row["HeadingID"].' name='.$row["HeadingID"].' class="dropzone">';
            echo $row["HeadingLabel"];
            echo '</div>';
        }
    }
    echo '</div>';

    // **********************************************
    //          GET CARDS
    // **********************************************

    $cards = array();
    $sqlQry = "SELECT * FROM cardsortdb.cards WHERE Project = '$projectID'";

    echo '<div class="draggableCards">';
    $result = mysql_query($sqlQry, $db);
    if ($result == false) {
        echo "query has failed";
    } else {
        while ($row = mysql_fetch_array($result)){
            array_push($cards, $row["CardID"]);
            echo'<div id="cards" data-id='.$row["CardID"].' name='.$row["CardID"].' class="draggable drag-drop">';
            echo $row["CardLabel"];
            echo '</div>';
        }
    }
    echo '</div>';
//    print_r($cards);
//    print_r($headings);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> SmartSort | Card Sort </title>
    <link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JavaScript/script.js"></script>
</head>
<body>
<div class="background"></div>
<div class="background2"></div>
<div class="loginForm">
    <div class="projectCode">
<form name="Project Code" action="SmartSortForm.php" method="post" id = "code" class="center">
    <input id="ProjectCodeInput" class="formControl" type="text" name="ProjectCode" placeholder="Enter project code" required><br>
    <button class="buttonui" type="submit" id="finishBtn">
        <span> GO </span>
    </button>
</div>
</form>
</div>
</body>
</html>