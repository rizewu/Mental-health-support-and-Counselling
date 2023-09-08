<?php
session_start();
unset($_SESSION['docid']);
session_destroy();
echo"<script>window.location='../doclogin.php'</script>";
?>