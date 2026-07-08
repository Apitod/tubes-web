<?php
session_start();

// Cek remember me cookie jika session expired
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_user'])) {
    require 'koneksi.php';
    $uid = mysqli_real_escape_string($koneksi, $_COOKIE['remember_user']);
    $result = mysqli_query($koneksi, "SELECT id, nama_lengkap, role FROM users WHERE id = '$uid' LIMIT 1");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'];
    }
}

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } elseif ($_SESSION['role'] == 'tl') {
        header("Location: tl/dashboard.php");
    } else {
        header("Location: agen/dashboard.php");
    }
} else {
    header("Location: login.php");
}
exit();
?>