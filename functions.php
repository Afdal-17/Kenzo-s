<?php
include 'koneksi.php';

function query() {
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM buku_tamu");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_tamu($data)
{
    global $koneksi;

    $tanggal    = date("Y-m-d");
    $nama_tamu  = mysqli_real_escape_string($koneksi, $data["nama_tamu"]);
    $alamat     = mysqli_real_escape_string($koneksi, $data["alamat"]);
    $no_hp      = mysqli_real_escape_string($koneksi, $data["no_hp"]);
    $bertemu    = mysqli_real_escape_string($koneksi, $data["bertemu"]);
    $kepentingan= mysqli_real_escape_string($koneksi, $data["kepentingan"]);

    // Sesuaikan nama kolom dengan tabel kamu
    $query = "INSERT INTO buku_tamu (tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan)
              VALUES ('$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertemu', '$kepentingan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubah_tamu($data)
{
    global $koneksi;

    $id         = htmlspecialchars($data["id_tamu"]);
    $nama_tamu  = htmlspecialchars($data["nama_tamu"]);
    $alamat     = htmlspecialchars($data["alamat"]);
    $no_hp      = htmlspecialchars($data["no_hp"]);
    $bertemu    = htmlspecialchars($data["bertemu"]);
    $kepentingan= htmlspecialchars($data["kepentingan"]);

    $query = "UPDATE buku_tamu SET
                nama_tamu   = '$nama_tamu',
                alamat      = '$alamat',
                no_hp       = '$no_hp',
                bertemu     = '$bertemu',
                kepentingan = '$kepentingan'
              WHERE id_tamu = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
// function hapus data tamu
function hapus_tamu($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM buku_tamu WHERE id_tamu = $id");
    return mysqli_affected_rows($koneksi);
}
?>