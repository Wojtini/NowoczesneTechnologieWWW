<?php
session_start();
session_destroy();
$_SESSION = [];
header('Location: main.php');
exit;
?>
