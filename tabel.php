<html>
    <head>
        <title>Daftar Transaksi</title>
        <?php include('_head.php'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-7">
                    <div class="box">
                        <h3>Daftar Transaksi</h3>
                        <div class="btn-group noPrint" role="group" aria-label="Basic example">
                            <a href="add.php" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Transaksi</a>
                            <a onclick="window.print()" class="btn btn-secondary mb-2"><i class="fa-solid fa-print"></i> Cetak</a>
                        </div>
                        <table class="table table-striped-columns mt-1">
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI</th>
                                <th>NOMINAL</th>
                                <th>TANGGAL INPUT</th>
                                <th class="noPrint">AKSI</th>
                            </tr>
                            <?php
                            include 'koneksi.php';
                            $no = 1;
                            $sql = "SELECT * FROM transaksi";
                            $data = $koneksi->query($sql);

                            // cek jumlah data
                            if ($data->num_rows == 0) {
                                echo "<tr><td colspan='6' align='center'>Tidak ada data.</td></tr>";
                            }else{

                                // menmapilkan data
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td>".$row['tanggal']."</td>";
                                    echo "<td>".$row['kategori']."</td>";
                                    echo "<td>".$row['nominal']."</td>";
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