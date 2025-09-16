<?php
require_once 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapus_tamu($id) > 0) {
        // jika data berhasil dihapus maka akan muncul alert
        echo "<script>alert('Data Berhasil di hapus!')</script>";
        // redirect ke halaman buku-tamu.php
        echo "<script>window.location.href='buku-tamu.php'</script>";
    } else {
        // jika gagal dihapus
        echo "<script>alert('Data Gagal di hapus!')</script>";
    }
}
?>
