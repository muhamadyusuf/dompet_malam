<html>
    <head>
        <title>Daftar Transaksi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">

        <script src="https://kit.fontawesome.com/e8fdade9e2.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-7">
                    <div class="box">
                        <h3>Daftar Transaksi</h3>
                        <a href="add.php" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Transaksi</a>
                        <table class="table table-striped-columns">
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI</th>
                                <th>NOMINAL</th>
                                <th>TANGGAL INPUT</th>
                                <th>AKSI</th>
                            </tr>
                            <?php
                            include 'koneksi.php';
                            $no = 1;
                            $sql = "SELECT * FROM transaksi";
                            $data = $koneksi->query($sql);

                            // menmapilkan data
                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".$row['tanggal']."</td>";
                                echo "<td>".$row['kategori']."</td>";
                                echo "<td>".$row['nominal']."</td>";
                                echo "<td>".$row['tanggal_input']."</td>";
                                echo "<td>
                                        <a href='edit.php?id=".$row['id']."' class='btn btn-warning'><i class='fa-regular fa-pen-to-square'></i></a>
                                        <a href='delete.php?id=".$row['id']."' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br/><br/><br/>
    </body>
</html>