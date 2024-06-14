<?php

// Memasukkan data ke tabel transaksi
include 'koneksi.php';

// ambil data dari form
$tanggal = $_POST['tanggal'];
$kategori_id = $_POST['kategori_id'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$tanggal_input = date('Y-m-d H:i:s');

// Upload file
$lampiran = '';
if (isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
    if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
        $lampiran = $target_file;
    } else {
        echo "Error uploading file.";
    }
}

// query insert
$sql = "INSERT INTO transaksi (tanggal, kategori_id, nominal, keterangan, tanggal_input, lampiran) VALUES ('$tanggal', '$kategori_id', '$nominal', '$keterangan', '$tanggal_input', '$lampiran')";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'tabel.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}