<?php
session_start();
unset($_SESSION['myusername']);
session_destroy();
header("Location: login.html");
exit;
?>