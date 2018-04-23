<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 20/04/2018
 * Time: 15:08
 */

include "db.php";
include "loginform.php";

$mysqli = new mysqli("silva.computing.dundee.ac.uk", "cardsort", "9844.cs.4498");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}
?>

 <!DOCTYPE html>
    <html>
    <head>
        <title> SmartSort | Results </title>
        <link rel="stylesheet" type="text/css" href="CSS/table.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
<body>
<?php
    $username = $_SESSION['firstname'];
    ?>

    <h1> Hello <?php echo $username; ?> </h1>
<?php
//$projectName = $_SESSION['ProjectName'];

if ($_SESSION['privileges'] == "1") {

    $order = isset($_GET['sort']) ? $_GET['sort'] : 'ProjectID';

    error_reporting(0);
    $ID = $_POST["search"];
    $headers_Arr = [];

    $sql = "SELECT HeadingID, HeadingLabel FROM headings WHERE Project = 36";
    $result = mysql_query($sql, $db);

    ?>
    <div class="projectTable">
        <table id="projectTable" class='table' >
            <thead>
            <tr>
                <th>

                </th>
        <?php

//        echo $projectName;
        while ($row = mysql_fetch_array($result)) {

            $headers_Arr[] = $row["HeadingID"];

            echo "
      
                    <th>
                        " . $row["HeadingLabel"] . "
                    </th>
                
            
        ";
        }
        ?>
            </tr>

            </thead>
            <tbody>
            <?php
            $sql1 = "SELECT CardID, CardLabel FROM cards WHERE Project = 36";
            $result1 = mysql_query($sql1, $db);

            while ($row1 = mysql_fetch_array($result1)) {

                $headers_Arr[] = $row1["HeadingID"];
                $cardID = $row1['CardID'];

                ?>
                    <tr>

                    <th>
                        <?=$row1["CardLabel"]?>
                    </th>

                        <?php

                        foreach($headers_Arr as $ID)
                        {
                            $sql2 = "SELECT COUNT(*) as total FROM cardsortdb.studies where projectID = 36 AND cardID= $cardID AND headingID = $ID";
                            $result2 = mysql_query($sql2, $db);
                            $data=mysql_fetch_assoc($result2);

                            ?>
                            <td>
                                <?=$data["total"]?>
                            </td>
                            <?php

                        }

                        ?>
                    </tr>
        <?php

            }
            ?>

            </tbody>
        </table>
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