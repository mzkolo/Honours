<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 09/04/2018
 * Time: 13:10
 */
?>

<html>
<head>
    <title> SmartSort | New Projects </title>
    <!--    <meta http-equiv="refresh" content="0; url=projects.php" />-->
    <link rel="stylesheet" type="text/css" href="CSS/table.css">
    <link rel="stylesheet" type="text/css" href="CSS/buttons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="content">


<?php
include "loginform.php";
include "header.php";

$id = $_GET["id"];
if ($_SESSION['privileges'] == "1"){
?>
<form name="Add Category" action="NewHeadingForm.php" method="post" id = "add" class="center">
    <div class="container">
        <a href="ProjectForm.php"> <i class="fa fa-arrow-circle-o-left fa-lg"> Back </i></a><br><br>
        <div id="headingLabel" class="headingLabel">
            <label class="control-label"> Category Label </label>
            <input type="hidden" name="id" value="<?=$id?>">
            <input id="headingLabelField" class="formControl" type="text" name="HeadingLabel[]" placeholder="Heading" required>
        </div>
        <button class="addBtn" type="button"> Add Heading <i class="fa fa-plus-circle fa-lg"></i> </button> <br><br><br><br>
        <input class="button" type="submit" value="Submit">
    </div>
</form>
</div>
<br><br>
<script>
$("button").click(function() {

    $("input.formControl")
        .last()
        .clone()
        .val(" ")
        .appendTo($(".headingLabel"))
});
</script>
</body>
</html>
<?php
}
else {
header("Location: https://zeno.computing.dundee.ac.uk/2017-projects/cardsort/login.php");
exit();
}
?>