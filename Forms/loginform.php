<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 22/02/2018
 * Time: 19:41
 */

include "db.php";
session_start();

//get content from

//print_r (isset($_POST['password']));
if(isset($_POST['username']) && isset($_POST['password'])){
    $ID = mysql_real_escape_string ($_POST['username']);
    $password = crypt(mysql_real_escape_string ($_POST['password']),"mysalt");


// SQL Insert using variable names

    $password = mysql_real_escape_string($password);
    $sqlQry = "SELECT * FROM cardsortdb.users WHERE username = '$ID'";
    $sqlQry = "SELECT * FROM cardsortdb.users WHERE password = '$password'";
    $result = mysql_query($sqlQry, $db);

    if ($result == false){
        echo "query has failed";
    }

    else {
        $row = mysql_fetch_array($result);

        //$row = mysql_fetch_array($result);
        $rows = mysql_num_rows($result);
        // echo "- " . $rows . " -";
        // If result matched $ID table row must be 1 row
        if ($rows == 1){

            if(strcmp(trim($password),trim($row['Password']))== 0){

                // echo "id: " . $row["userID"]. " - Name: " . $row["Privileges"]. " ";
                $_SESSION['privileges']=$row["Privileges"];
                $_SESSION['firstname']=$row["FirstName"];
                $_SESSION['surname']=$row["Surname"];
                $_SESSION['email']=$row["Email"];
                $_SESSION['login_user']=$ID;
                echo "<br>";
                if($row["Privileges"] == 1)
                    header("location: home.php"); // Redirecting To Home
            }
        }

        else if ($rows < 1){
            echo "Login failed";
            header("Refresh:2; url=login.php", true, 303);
        }
    }
}
?>

