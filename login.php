<?php
/**
 * Created by PhpStorm.
 * User: Walid
 * Date: 22/02/2018
 * Time: 19:41
 */
?>

<html class="">
<head>
    <head>
        <title>SmartSort | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Roboto|Roboto+Slab|Titillium+Web" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
        <link href="https://fonts.googleapis.com/css?family=Mada:700" rel="stylesheet">
    </head>
    <body>
<?php
				//include "db.php";
				include "loginform.php";
				?>

        <div class="background"></div>
        <div class="background2"></div>
        <div class="loginForm">
            <hgroup>
                <h1>SmartSort</h1>
            </hgroup>
            <form action = "loginform.php" method = "post">
                <div class="group">
                    <input name ="username" type="text" class="used"><span class="highlight"></span><span class="bar"></span>
                    <label>Username</label>
                </div>
                <div class="group">
                    <input name ="password" type="password" class="used"><span class="highlight"></span><span class="bar"></span>
                    <label>Password</label>
                </div>
                <button type="submit" class="buttonui">
                    <span> Log In </span>
                    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                </button>
                
            </form>
        </div>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>$(window, document, undefined).ready(function () {

                $('input').blur(function () {
                    var $this = $(this);
                    if ($this.val())
                        $this.addClass('used');
                    else
                        $this.removeClass('used');
                });

                var $ripples = $('.ripples');

                $ripples.on('click.Ripples', function (e) {

                    var $this = $(this);
                    var $offset = $this.parent().offset();
                    var $circle = $this.find('.ripplesCircle');

                    var x = e.pageX - $offset.left;
                    var y = e.pageY - $offset.top;

                    $circle.css({
                        top: y + 'px',
                        left: x + 'px'
                    });

                    $this.addClass('is-active');

                });

                $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function (e) {
                    $(this).removeClass('is-active');
                });
