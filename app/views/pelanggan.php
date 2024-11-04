<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <?php include __DIR__ . '/template/navbar.php'; ?>
    <div class="container mt-5 mb-5">
        <h4 class="text-left text-success mb-3">Data Pelanggan</h4>
        
        <?php if (isset($_GET['error_message'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">

    
        <?php echo htmlspecialchars($_GET['error_message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success_message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['success_message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                            <!-- Tombol Edit -->
                            <a href="index.php?page=edit_plg&id_pelanggan=<?= $item['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus yang memicu modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id_pelanggan'] ?>">
                                Hapus
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal<?= $item['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $item['id_pelanggan'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?= $item['id_pelanggan'] ?>">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus pelanggan <strong><?= $item['nama_pelanggan'] ?></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="index.php?page=delete_plg&id_pelanggan=<?= $item['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#188754" fill-opacity="1" d="M0,288L60,277.3C120,267,240,245,360,240C480,235,600,245,720,240C840,235,960,213,1080,213.3C1200,213,1320,235,1380,245.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <!-- FOOTER -->
    <?php include __DIR__ . '/template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
