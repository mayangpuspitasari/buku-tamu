<?php include "header.php"; ?>

<?php
    if (isset($_POST['bsimpan'])) {
        $tgl = date('Y-m-d');
        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
        $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
        $instansi = htmlspecialchars($_POST['instansi'], ENT_QUOTES);
        $nohp = htmlspecialchars($_POST['nohp'], ENT_QUOTES);

        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_tamu VALUES ('','$tgl', '$nama', '$alamat', '$keperluan', '$instansi', '$nohp')");

        if ($simpan) {
            echo "<script>alert('Simpan Data Sukses, Terima Kasih..!');document.location='?'</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal!');document.location='?'</script>";
        }
    }
?>

<?php
// Koneksi ke database
include 'koneksi.php';

// Hari ini
$hari_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE DATE(tanggal) = CURDATE()"))['jumlah'];

// Kemarin
$kemarin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE DATE(tanggal) = CURDATE() - INTERVAL 1 DAY"))['jumlah'];

// Minggu ini
$minggu_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE WEEK(tanggal) = WEEK(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())"))['jumlah'];

// Bulan ini
$bulan_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())"))['jumlah'];

// Keseluruhan
$keseluruhan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu"))['jumlah'];
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Statistik Pengunjung -->
        <div class="col-lg-12 mb-3">
    <div class="card shadow-lg border-0" style="background-color: #2d2f45; margin-top: 20px;">
        <div class="card-body text-white rounded" style="padding: 20px;">
            <div class="text-center mb-4">
                <h1 class="h4 font-weight-bold" style="color: #4e73df;">Statistik Pengunjung</h1>
                <p class="text-muted">Data jumlah pengunjung berdasarkan periode waktu</p>
            </div>
            <div class="d-flex justify-content-around text-center">
                <div>
                    <i class="fas fa-calendar-alt fa-2x mb-2" style="color: #1cc88a;"></i>
                    <h6>Hari ini</h6>
                    <span class="badge badge-success p-2" style="font-size: 1.1em;"><?= $hari_ini; ?></span>
                </div>
                <div>
                    <i class="fas fa-business-time fa-2x mb-2" style="color: #36b9cc;"></i>
                    <h6>Kemarin</h6>
                    <span class="badge badge-info p-2" style="font-size: 1.1em;"><?= $kemarin; ?></span>
                </div>
                <div>
                    <i class="fas fa-book fa-2x mb-2" style="color: #4e73df;"></i>
                    <h6>Minggu ini</h6>
                    <span class="badge badge-primary p-2" style="font-size: 1.1em;"><?= $minggu_ini; ?></span>
                </div>
                <div>
                    <i class="fas fa-industry fa-2x mb-2" style="color: #f6c23e;"></i>
                    <h6>Bulan ini</h6>
                    <span class="badge badge-warning p-2" style="font-size: 1.1em;"><?= $bulan_ini; ?></span>
                </div>
                <div>
                    <i class="fas fa-chart-bar fa-2x mb-2" style="color: #e74a3b;"></i>
                    <h6>Keseluruhan</h6>
                    <span class="badge badge-danger p-2" style="font-size: 1.1em;"><?= $keseluruhan; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>



<div class="container mt-4">
    
<!-- Tombol untuk Membuka Modal -->
<div class="d-flex justify-content-center mt-3">
    <button type="button" class="btn btn-primary btn-lg font-weight-bold shadow" data-toggle="modal" data-target="#inputDataModal" style="margin-bottom: 20px;">
        <i class="fas fa-user-plus"></i> Input Data Pengunjung
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="inputDataModal" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="inputDataModalLabel"><i class="fas fa-user-plus"></i> Input Data Pengunjung</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Input Data -->
                <form class="user" method="POST" action="">
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Pengunjung</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <label for="keperluan" class="font-weight-bold">Keperluan</label>
                        <input type="text" class="form-control form-control-user" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <label for="instansi" class="font-weight-bold">Asal Instansi</label>
                        <input type="text" class="form-control form-control-user" id="instansi" name="instansi" placeholder="Masukkan Asal Instansi" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp" class="font-weight-bold">No. HP</label>
                        <input type="tel" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Masukkan No. HP Pengunjung" pattern="[0-9]+" required>
                    </div>
                    <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block mt-3 shadow">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>



    <!-- DataTables Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark text-black">
        <h6 class="m-0 font-weight-bold">Data Pengunjung Hari Ini [<?= date('d-m-Y'); ?>]</h6>
    </div>
    <div class="card-body bg-light">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pengunjung</th>
                        <th>Alamat</th>
                        <th>Keperluan</th>
                        <th>Instansi</th>
                        <th>No.HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tgl = date('Y-m-d');
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE tanggal LIKE '%$tgl%' ORDER BY id DESC");
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['keperluan'] ?></td>
                            <td><?= $data['instansi'] ?></td>
                            <td><?= $data['nohp'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<?php include "footer.php"; ?>
