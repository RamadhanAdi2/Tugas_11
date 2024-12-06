<?php
include("koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>
<body>
<div class="container">
    <h1>Data Barang</h1>
    <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data</a>
    <div class="main">
        <table class="table table-striped-columns">
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result): ?>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><img src="<?= $row['gambar'];?>" alt="<?= $row['nama'];?>" width="100"></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['kategori'];?></td>
                        <td>RP.<?= $row['harga_jual'];?></td>
                        <td>RP.<?= $row['harga_beli'];?></td>
                        <td><?= $row['stok'];?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
</body>
</html>
