<?php

// Memasukkan data ke tabel transaksi
include 'koneksi.php';

// ambil data dari form
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$tanggal_input = date('Y-m-d H:i:s');

// query insert
$sql = "INSERT INTO transaksi (tanggal, kategori, nominal, keterangan, tanggal_input) VALUES ('$tanggal', '$kategori', '$nominal', '$keterangan', '$tanggal_input')";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'tabel.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}