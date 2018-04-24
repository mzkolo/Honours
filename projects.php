<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 16/03/2018
 * Time: 13:21
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title> SmartSort | My Projects </title>
    <link rel="stylesheet" type="text/css" href="CSS/buttons.css">
    <link rel="stylesheet" type="text/css" href="CSS/table.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.onload = function(){
            $("#delete").hide();
            $("#update").hide();
        }
        $(document).ready(function(){
            $("#showDelete").click(function(){
                $("#delete").show();
                $("#update").hide();
            });
            $("#showUpdate").click(function(){
                $("#delete").hide();
                $("#update").show();
            });

        });
    </script>
</head>
<body>
    <div class="content">
<?php
include "header.php";
include "db.php";
include "loginform.php";

if ($_SESSION['privileges'] == "1") {

    $order = isset($_GET['sort']) ? $_GET['sort'] : 'ProjectID';

    error_reporting(0);
    $ID = $_POST["search"];
    if ($ID == null) {
        $sql = "SELECT ProjectID, ProjectName, Link FROM projects ORDER BY $order";
    } else {
        $sql = "SELECT ProjectID, ProjectName, Link, FROM projects WHERE ProjectID='$ID' or ProjectName='$ID' ORDER BY $order";
    }
    $result = mysql_query($sql, $db);
    ?>
    <div class="projectTable">
        <?php

        echo "<table id='table2'>
	<caption><h2>Your Projects</h2></caption>
	<br>
	<tr>
		<th><a href='Projects.php?sort=ProjectID'> Project ID </a></th>
		<th><a href='Projects.php?sort=ProjectName'> Project Title </a></th>
	</tr>";
        while ($row = mysql_fetch_array($result)) {
            echo "<tr><td><a href='ResultsForm.php?id=". $row["ProjectID"] ."'>" . $row["ProjectID"] .
                 "</a></td><td><a href='ResultsForm.php?id=". $row["ProjectID"] ."'>" . $row["ProjectName"];
            echo "</a></td></tr>";
        }
        echo "</table>"
        ?>
    </div>
    <br>
    <br>
    </div>
    </body>
    </html>
    <?php
}
else {
    header("Location: https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/login.php");
    exit();
}
?>