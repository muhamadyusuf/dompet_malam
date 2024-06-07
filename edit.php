<?php

// Edit transaksi
include 'koneksi.php';

// ambil data dari url
$id = $_GET['id'];

// query select
$sql = "SELECT * FROM transaksi WHERE id = '$id'";

// eksekusi query
$data = $koneksi->query($sql);

// ambil data
$row = $data->fetch_assoc();

?>

<html>
    <head>
        <title>Ubah Transaksi</title>
        <?php include('_head.php'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-7">
                    <div class="box">
                        <h3>Ubah Transaksi</h3>
                        <a href="tabel.php" class="btn mb-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                        <form action="aksi_edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">

                            <!-- 
                                FORM INPUT TRANSAKSI
                                - TANGGAL
                             -->
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?php echo $row['tanggal'];?>">
                            </div>
                            <!-- 
                                FORM INPUT TRANSAKSI
                                - KATEGORI
                             -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Pemasukan" <?php if($row['kategori'] == "Pemasukan"){ echo "selected='selected'"; } ?>>Pemasukan</option>
                                    <option value="Pengeluaran" <?php if($row['kategori'] == "Pengeluaran"){ echo "selected='selected'"; } ?>>Pengeluaran</option>
                                </select>
                            </div>

                            <!-- 
                                FORM INPUT TRANSAKSI
                                - NOMINAL
                             -->
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal" required value="<?php echo $row['nominal'];?>">
                            </div>

                            <!-- 
                                FORM INPUT TRANSAKSI
                                - KETERANGAN
                             -->
                             <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $row['keterangan'];?></textarea>
                            </div>

                            <!-- SUBMIT -->
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br/><br/><br/>
    </body>
</html>