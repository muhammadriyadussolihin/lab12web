<?php
include("../class/koneksi.php");
require('../template/header.php');

// Query to retrieve data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #3498db;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff; /* Warna putih */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db; /* Warna biru */
            border-bottom: 2px solid #e44d26; /* Warna merah */
            padding-bottom: 5px;
        }

        .main {
            margin-top: 20px;
        }

        p {
            color: #555;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            color: #333;
        }

        a {
            color:  #3498db; /* Warna biru */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color:  #3498db; /* Warna biru */
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #3498db; /* Warna biru */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db; /* Warna biru */
            color: #fff; /* Warna putih */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Perubahan warna teks "Tambah Barang" menjadi putih */
        .main a {
            color: #3498db; /* Warna biru */
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>DATA BARANG</h3>
        <div class="main">
            <a href="tambah.php">Tambah Barang</a>
            <table>
                <!-- Table header -->
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>

                <!-- Display data from the database -->
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td><?= $row['harga_beli']; ?></td>
                            <td><?= $row['harga_jual']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                                <a href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
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
    <?php require('../template/footer.php') ?>
</body>

</html>
