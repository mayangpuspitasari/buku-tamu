<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $keperluan = $_POST['keperluan'];
    $instansi = $_POST['instansi'];
    $nohp = $_POST['nohp'];
    
    $update = mysqli_query($koneksi, "UPDATE tbl_tamu SET nama = '$nama', alamat = '$alamat', keperluan = '$keperluan', instansi = '$instansi', nohp = '$nohp' WHERE id = '$id'");

    if ($update) {
        header("Location: rekapitulasi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Pengunjung</title>

    <!-- Menghubungkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    
    <style>
        body {
            background: #121212; /* Background Gelap */
            font-family: 'Nunito', sans-serif;
        }
        .card {
            background-color: #1e1e2f;
            border-radius: 15px;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }
        .card-header {
            background-color: #0062cc;
            color: white;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            background-color: #25274d;
        }
        .btn {
            border-radius: 10px;
            font-weight: bold;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .form-control {
            border-radius: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card shadow-lg">
    <div class="card-header text-center">
        <h4><i class="fa fa-edit"></i> Edit Data Pengunjung</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pengunjung</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data['alamat'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input type="text" name="keperluan" id="keperluan" class="form-control" value="<?= $data['keperluan'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="instansi" class="form-label">Instansi</label>
                <input type="text" name="instansi" id="instansi" class="form-control" value="<?= $data['instansi'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $data['nohp'] ?>" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" name="update" class="btn btn-success">Update Data</button>
                <a href="rekapitulasi.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
