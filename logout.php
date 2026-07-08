<?php
session_start();

// Hapus remember me cookie
setcookie('remember_user', '', time() - 3600, "/");

session_destroy();

header("Location: ../login.php");
exit();
?>