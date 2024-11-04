<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">


    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="index.php?page=home">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li><a href="index.php?page=barang" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'barang') ? 'active' : ''; ?>">Barang</a></li>
                    <li><a href="index.php?page=pelanggan" class="nav-link text-white fw-bold <?php echo (isset($_GET['page']) && $_GET['page'] == 'pelanggan') ? 'active' : ''; ?>">Pelanggan</a></li>
                    <li><a href="index.php?page=transaksi" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaksi') ? 'active' : ''; ?>">Transaksi</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5 mb-5">
        <h4 class="text-left text-success mb-3">Data Pelanggan</h4>
        
        <?php if (isset($_GET['error_message'])): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($_GET['error_message']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success_message'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_GET['success_message']); ?>
            </div>
        <?php endif; ?>
        
        <a href="index.php?page=tambah_plg" class="btn btn-info btn-sm bg-success text-white mb-3">Tambahkan Data</a>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        if (isset($pelanggan) && is_array($pelanggan)) { 
                            foreach ($pelanggan as $item) { 
                    ?>
                    <tr>
                        <th scope="row"><?php echo $nomor++; ?></th>
                        <td><?php echo $item["id_pelanggan"]; ?></td>
                        <td><?php echo $item["nama_pelanggan"]; ?></td>
                        <td><?php echo $item["alamat"]; ?></td>
                        <td>
                            <a href="index.php?page=edit_plg&id_pelanggan=<?= $item['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?page=delete_plg&id_pelanggan=<?= $item['id_pelanggan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Tidak ada data pelanggan ditemukan.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <footer class="bg-success text-center text-white py-3 mt-auto">
        <div class="container">
            <p class="mb-1">© <?php echo date("Y"); ?> Khamdanu Syakir. All rights reserved.</p>
            <small>NIM: 23.240,0046</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
