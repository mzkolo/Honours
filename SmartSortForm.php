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

$code = mysql_real_escape_string($_POST['ProjectCode']);
$sqlQry = "SELECT * FROM cardsortdb.projects WHERE Link = '$code'";
$result = mysql_query($sqlQry, $db);
$row = mysql_fetch_array($result);

if ($row["ProjectID"] == null) {
         echo "No project";
    header("Refresh:2; url=SmartSort.php", true, 303);
 }

else if (isset($_POST['ProjectCode'])) {
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
//        else if ($row["ProjectID"] == null) {
//            echo "No project";
//        }
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

    echo ' <a href="SmartSort.php"  onclick="return confirm(\'Are you sure you want to go back, you will lose all data.\');"
  ><i id="back" class="fa fa-arrow-circle-o-left fa-lg" > Back </i></a><br><br>
    <button class="finishBtn"> Finished </button>';

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
//    $userID = uniqid('Project exists, this is the unique userID prefix: ');
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> SmartSort | Card Sort </title>
    <link rel="stylesheet" href="CSS/DragDropStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3/dist/interact.min.js"></script>
    <script src="JavaScript/script.js"></script>
</head>
<body>

<form id="form" action="SessionForm.php" method="post">
    <input type="hidden" name="project_id" value="<?=$projectID?>"/>
    <input type="hidden" name="obj" id="obj" value=""/>
</form>

<script>
    $(".finishBtn").click(function(e) {

        e.preventDefault();

        var projectID = <?=$projectID?>;
        // alert (projectID);
        e.preventDefault();
        $.ajax({
           type: "POST",
           url: "SessionForm.php",
           data: {
               id: projectID, // < note use of 'this' here
               obj:obj
           },
           success: function(result) {
               location.href = "https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/SmartSort.php"
           },
           error: function(result) {
               alert('error');
           }
        });
    });
</script>
</body>
</html>