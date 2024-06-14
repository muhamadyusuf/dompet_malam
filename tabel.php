<?php

$search = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
}

include 'koneksi.php';
$no = 1;
$sql = "SELECT
            transaksi.*,
            kategori.nama as nama_kategori
        FROM
            transaksi
        INNER JOIN kategori ON transaksi.kategori_id = kategori.id";

if($search != "")
    $sql .= " WHERE transaksi.keterangan LIKE '%$search%' OR kategori.nama LIKE '%$search%' OR transaksi.tanggal LIKE '%$search%' OR transaksi.nominal LIKE '%$search%'";

$data = $koneksi->query($sql);

?>
<html>
    <head>
        <title>Daftar Transaksi</title>
        <?php include('_head.php'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-10">
                    <div class="box">
                        <h3>Daftar Transaksi</h3>
                        <div class="row">
                            <div class="col">
                                <div class="btn-group noPrint" role="group" aria-label="Basic example">
                                    <a href="add.php" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Transaksi</a>
                                    <a onclick="window.print()" class="btn btn-secondary mb-2"><i class="fa-solid fa-print"></i> Cetak</a>
                                </div>
                            </div>
                            <div class="col">
                                <form action="tabel.php" method="POST">
                                    <div class="input-group mb-3">
                                        <input name="search" id="search" value="<?php echo $search; ?>" type="text" class="form-control" placeholder="Cari Transaksi." aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class='fa fa-search'></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped-columns mt-1">
                            <tr>
                                <th width="2%">NO</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI</th>
                                <th>NOMINAL</th>
                                <th>KETERANGAN</th>
                                <th>TANGGAL INPUT</th>
                                <th width="120px" class="noPrint">AKSI</th>
                            </tr>
                            <?php

                            // cek jumlah data
                            if ($data->num_rows == 0) {
                                echo "<tr><td colspan='6' align='center'>Tidak ada data.</td></tr>";
                            }else{

                                // menmapilkan data
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td>".$row['tanggal']."</td>";
                                    echo "<td>".$row['nama_kategori']."</td>";
                                    echo "<td>Rp. ".number_format($row['nominal'], 0, ',', '.')."</td>"; 
                                    echo "<td>".$row['keterangan']."</td>";
                                    echo "<td>".$row['tanggal_input']."</td>";

                                    $confim = "onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'";
                                    echo "<td class='noPrint'>
                                            <a href='edit.php?id=".$row['id']."' class='btn btn-warning'><i class='fa-regular fa-pen-to-square'></i></a>
                                            <a href='aksi_delete.php?id=".$row['id']."' ".$confim." class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                                } 
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br/><br/><br/>
    </body>
</html>