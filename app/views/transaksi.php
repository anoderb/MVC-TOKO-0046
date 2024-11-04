<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <?php include __DIR__ . '/template/navbar.php'; ?>
    <div class="container mt-5 flex-fill">
        <h4 class="text-left text-success mb-3">Data Transaksi</h4>
        
        <a href="index.php?page=tambah_transaksi" class="btn btn-info btn-sm bg-success text-white mb-3">Tambahkan Data</a>

        <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        if (isset($transaksiList) && is_array($transaksiList)) {
                            foreach ($transaksiList as $item) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $nomor++; ?></th>
                        <td><?php echo $item["id_transaksi"]; ?></td>
                        <td><?php echo $item["id_pelanggan"]; ?></td>
                        <td><?php echo $item["id_barang"]; ?></td>
                        <td><?php echo $item["jumlah"]; ?></td>
                        <td>Rp <?php echo number_format($item["harga_total"], 0, ',', '.'); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($item["tanggal"])); ?></td>
                        <td>
                            <a href="index.php?page=delete_transaksi&id_transaksi=<?= $item['id_transaksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Tidak ada data transaksi ditemukan.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#188754" fill-opacity="1" d="M0,288L60,277.3C120,267,240,245,360,240C480,235,600,245,720,240C840,235,960,213,1080,213.3C1200,213,1320,235,1380,245.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <!-- FOOTER -->
    <?php include __DIR__ . '/template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
