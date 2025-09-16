<?php
define('HOST', 'localhost');
define('USER', 'root');
define('pass', '');
define('db', 'app_bukutamu');

$koneksi = mysqli_connect(HOST, USER, pass, db) or die('Koneksi Gagal');
?>