<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 26/03/2018
 * Time: 15:14
 */

?>

<html>
<head>
    <title> SmartSort | New Projects </title>
    <link rel="stylesheet" type="text/css" href="CSS/table.css">
    <link rel="stylesheet" type="text/css" href="CSS/buttons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="content">
<?php
include "loginform.php";
include "header.php";
if ($_SESSION['privileges'] == "1"){
?>
<form name="Add Project" action="NewProjectForm.php" method="post" id = "add" class="center">
    <div class="container">
    <a href="home.php"> <i class="fa fa-arrow-circle-o-left fa-lg"> Back </i></a><br><br>
        <div id="projectTitle" class="projectTitle">
            <label class="control-label"> Project Name </label>
            <input id="ProjectNameField" class="formControl" type="text" name="ProjectName" placeholder="New Project" required><br>
        </div>
        <br>
        <div class="category">
        <label class="control-label"> Sort Type </label>
        <label class="containers"> <p>Open</p>
            <input type="radio" class="radio" name="category" value="1" required>
            <span class="checkmark"></span>
        <label class="containers"> <p>Closed</p>
            <input type="radio" class="radio" name="category" value="2" required>
            <span class="checkmark"></span>
        </label>
        <label class="containers"><p>Hybrid</p>
            <input type="radio" class="radio" name="category" value="3" required>
            <span class="checkmark"></span>
        </label>
        </div>
        <br>
        <div id="cardLabel" class="cardLabel">
            <label class="control-label"> Card Label </label>
            <input id="cardLabelField" class="formControl" type="text" name="label[]" placeholder="Card" required>
        </div>
        <button class="addBtn" type="button"> Add Card <i class="fa fa-plus-circle fa-lg"></i> </button><br><br><br><br>
        <input id="saveBtn" class="button" type="submit" value="Save">
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
        .appendTo($(".cardLabel"))
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