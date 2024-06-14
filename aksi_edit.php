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

// cek apakah ada file yang diupload
if(isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] === UPLOAD_ERR_OK) {
    $lampiran_name = $_FILES['lampiran']['name'];
    $lampiran_tmp_name = $_FILES['lampiran']['tmp_name'];
    $lampiran_new_path = 'uploads/' . $lampiran_name;

    // pindahkan file yang diupload ke direktori uploads
    if(move_uploaded_file($lampiran_tmp_name, $lampiran_new_path)) {
        // query update dengan menyertakan path lampiran baru
        $sql = "UPDATE transaksi SET tanggal = '$tanggal', kategori = '$kategori', nominal = '$nominal', keterangan = '$keterangan', tanggal_input = '$tanggal_input', lampiran = '$lampiran_new_path' WHERE id = '$id'";
        if ($koneksi->query($sql) === TRUE) {
            echo "<script>
                    alert('Data berhasil diubah');
                    window.location.href = 'tabel.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    // query update tanpa mengubah lampiran jika tidak ada file yang diupload
    $sql = "UPDATE transaksi SET tanggal = '$tanggal', kategori = '$kategori', nominal = '$nominal', keterangan = '$keterangan', tanggal_input = '$tanggal_input' WHERE id = '$id'";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = 'tabel.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}