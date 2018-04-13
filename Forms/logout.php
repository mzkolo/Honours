<?php
 if(!isset($_SESSION)){
session_start();
 }
session_unset();
session_destroy();
echo 'You have been logged out.';
header("Refresh:2; url=login.php", true, 303);
?>