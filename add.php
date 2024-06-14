<?php
include('koneksi.php');

// Menampilkan kategori berdasarkan tabel kategori
$query = "SELECT * FROM kategori";
$data = mysqli_query($koneksi, $query); ?>
<html>
    <head>
        <title>Tambah Transaksi</title>
        <?php include('_head.php'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-7">
                    <div class="box">
                        <h3>Tambah Transaksi</h3>
                        <a href="tabel.php" class="btn mb-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                        <form action="aksi_add.php" method="POST" enctype="multipart/form-data">
                            <!-- 
                                FORM INPUT TRANSAKSI
                                - TANGGAL
                             -->
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <!-- 
                                FORM INPUT TRANSAKSI
                                - KATEGORI
                             -->
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori_id" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($data as $kategori) { ?>
                                    <option value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- 
                                FORM INPUT TRANSAKSI
                                - NOMINAL
                             -->
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal" required>
                            </div>

                            <!-- 
                                FORM INPUT TRANSAKSI
                                - KETERANGAN
                             -->
                             <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                            </div>

                            <!-- FORM INPUT TRANSAKSI - LAMPIRAN -->
                            <div class="mb-3">
                                <label for="lampiran" class="form-label">Lampiran</label>
                                <input type="file" class="form-control" id="lampiran" name="lampiran">
                            </div>
                            
                            <!-- SUBMIT -->
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br/><br/><br/>
    </body>
</html>