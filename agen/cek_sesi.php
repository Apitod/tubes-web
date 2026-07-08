<?php
session_start();

// Cek remember me cookie jika session expired
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_user'])) {
    require_once __DIR__ . '/../koneksi.php';
    $uid = mysqli_real_escape_string($koneksi, $_COOKIE['remember_user']);
    $result = mysqli_query($koneksi, "SELECT id, nama_lengkap, role FROM users WHERE id = '$uid' LIMIT 1");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'];
    }
}

// Cek apakah user sudah login DAN role-nya adalah 'agen'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'agen') {
    header("Location: ../login.php");
    exit();
}
?>