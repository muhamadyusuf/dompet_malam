<?php
include('koneksi.php');

// Periksa apakah data dari URL tersedia dan valid
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    echo "Data dari URL tersedia dan valid.<br>";

    // Ambil data dari URL
    $id_transaksi = intval($_GET['id']);
    echo "ID Transaksi: $id_transaksi<br>";

    // Query untuk mendapatkan path lampiran
    $sql_select = "SELECT lampiran FROM transaksi WHERE id = '$id_transaksi'";
    $result = $koneksi->query($sql_select);

    // Periksa apakah query berhasil dieksekusi
    if ($result && $result->num_rows > 0) {
        echo "Query select berhasil.<br>";
        $row = $result->fetch_assoc();
        $lampiranLama = $row['lampiran'];
        echo "Lampiran Lama: $lampiranLama<br>";

        // Debugging tambahan: cek apakah file benar-benar ada
        if (file_exists($lampiranLama)) {
            echo "File exists: $lampiranLama<br>";

            // Hapus lampiran dari server
            if (unlink($lampiranLama)) {
                echo "Lampiran lama berhasil dihapus dari server.<br>";

                // Update path lampiran dalam database
                $sql_update = "UPDATE transaksi SET lampiran = NULL WHERE id = '$id_transaksi'";
                if ($koneksi->query($sql_update) === TRUE) {
                    echo "Path lampiran berhasil dihapus dalam database.<br>";
                    echo "<script>
                            alert('Lampiran berhasil dihapus');
                            window.location.href = 'tabel.php';
                          </script>";
                } else {
                    echo "Error updating record: " . $koneksi->error;
                }
            } else {
                echo "Gagal menghapus lampiran lama dari server.";
            }
        } else {
            echo "Lampiran lama tidak ditemukan atau sudah dihapus.";
        }
    } else {
        echo "Error fetching old attachment: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap atau tidak valid.";
}
?>
