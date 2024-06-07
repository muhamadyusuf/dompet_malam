<?php

// Memasukkan data ke tabel transaksi
include 'koneksi.php';

// ambil data dari form
$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$tanggal_input = date('Y-m-d H:i:s');

// query update
$sql = "UPDATE transaksi SET tanggal = '$tanggal', kategori = '$kategori', nominal = '$nominal', keterangan = '$keterangan', tanggal_input = '$tanggal_input' WHERE id = '$id'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'tabel.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}