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
    <title> SmartSort | Projects </title>
    <!--    <meta http-equiv="refresh" content="0; url=projects.php" />-->
    <link rel="stylesheet" type="text/css" href="CSS/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        </head>
<div class="content">
<header>
<!--<table class="headings" width="100%">-->
<!--	<tr>-->
<!--		<td>-->
<!--			<h1 class="grassroots">SmartSort</h1>-->
<!--		</td>-->
<!--		<td>-->
<!--			<h2 class="title">THE HUB OF CARD SORTING</h2>-->
<!--		</td>-->
<!--	</tr>-->
<!--	</table>-->
    <h3><a href="home.php"> Back </a><h3>
</header>

<body>
<form action="projects.php" method="post">
    <input type="search" name="search" placeholder="Search..">
</form>

<?php
include "loginform.php";
include "header.php";

if ($_SESSION['privileges'] == "1"){
?>
<form name="Add Project" action="NewProjectForm.php" method="post" id = "add" class="center">
    <div class="field">
        <div id="projectTitle" class="projectTitle">
            <label class="control-label"> Project Name </label>
            <input id="ProjectNameField" class="formControl" type="text" name="ProjectName" required=><br>
        </div>
        <br>
        </label>
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
            <input id="cardLabelField" class="formControl" type="text" name="label[]" required><br><br>
            <details hidden> </details>
            <br>
            <br>
        </div>
        <br>
        <input type="submit" value="Submit">
    </div>
</form>
<button> Click to Clone </button>
</div>
<br><br>
<script>
        // $( 'input#clone' ).click(
        //     function()
        //     {
        //         $("#cardLabelField").clone().attr('id', 'new_form' ).appendTo("body");
        //
        //     }
        // )

$("button").click(function() {

    $("input.formControl")
        .last()
        .clone()
        // .appendTo($(".cardLabel"))
        .insertAfter($("details"))
        .find("input").attr("name",function(i,oldVal) {
            return oldVal.replace(/\[(\d+)\]/,function(_,m){
                return "[" + (+m + 1) + "]";
            });
        });

    return false;
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