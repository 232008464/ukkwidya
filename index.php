<?php
session_start();
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>USER</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 40px;
            text-align: center;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
            background-color: white;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: rgb(233, 77, 113);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f4f6f8;
        }
        img {
            border-radius: 6px;
            max-width: 80px;
            height: auto;
        }
        a {
            margin: 0 5px;
            color: #e94d71;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table>
        <thead>
            <tr>
                <th>KODE BUKU</th>
                <th>NO BUKU</th>
                <th>JUDUL BUKU</th>
                <th>TAHUN TERBIT</th>
                <th>NAMA PENULIS</th>
                <th>PENERBIT</th>
                <th>JUMLAH HALAMAN</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>GAMBAR BUKU</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM buku");
            if ($sql) {
                while ($data = mysqli_fetch_array($sql)) {
                    $gambar = htmlspecialchars($data['gambar_buku']);
                    if (empty($gambar)) {
                        $gambar = 'placeholder.jpg'; // ganti sesuai lokasi placeholder Anda
                    }
        ?>
            <tr>
                <td><?= htmlspecialchars($data['kode_buku']); ?></td>
                <td><?= htmlspecialchars($data['no_buku']); ?></td>
                <td><?= htmlspecialchars($data['judul_buku']); ?></td>
                <td><?= htmlspecialchars($data['tahun_terbit']); ?></td>
                <td><?= htmlspecialchars($data['nama_penulis']); ?></td>
                <td><?= htmlspecialchars($data['penerbit']); ?></td>
                <td><?= htmlspecialchars($data['jumlah_halaman']); ?></td>
                <td><?= htmlspecialchars($data['harga']); ?></td>
                <td><?= htmlspecialchars($data['stok']); ?></td>
                <td><img src="<?= $gambar; ?>" alt="Cover Buku" /></td>
                <td>
                    <a href="peminjaman.php?no_buku=<?= htmlspecialchars($data['no_buku']); ?>">peminjaman</a>
                    <a href="pengembalian.php?no_buku=<?= htmlspecialchars($data['no_buku']); ?>">pengembalian</a>
                </td>
            </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='11'>Gagal mengambil data dari database.</td></tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>

