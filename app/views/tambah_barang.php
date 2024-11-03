
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="index.php?page=home">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
    <li><a href="index.php?page=barang" class="nav-link text-white ms-3 <?php echo (isset($_GET['page']) && $_GET['page'] == 'barang') ? 'active' : ''; ?>">Barang</a></li>
    <li><a href="index.php?page=pelanggan" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'pelanggan') ? 'active' : ''; ?>">Pelanggan</a></li>
    <li><a href="index.php?page=transaksi" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaksi') ? 'active' : ''; ?>">Transaksi</a></li>
</ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Tambah Barang</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" class="form-control" name="id_barang" required>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php?page=barang" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
