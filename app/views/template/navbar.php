<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Pastikan untuk menghubungkan Bootstrap CSS -->
    <style>
        .nav-link {
            font-weight: normal; /* Default font weight */
            transition: font-weight 0.3s; /* Animasi transisi untuk efek hover */
        }

        .nav-link:hover,
        .nav-link.active {
            font-weight: bold; /* Bold on hover and when active */
        }
    </style>
    <title>Navbar Example</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="index.php?page=home">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li><a href="index.php?page=barang" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'barang') ? 'active' : ''; ?>">Barang</a></li>
                <li><a href="index.php?page=pelanggan" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'pelanggan') ? 'active' : ''; ?>">Pelanggan</a></li>
                <li><a href="index.php?page=transaksi" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaksi') ? 'active' : ''; ?>">Transaksi</a></li>
            </ul>
        </div>
    </div>
</nav>

<script src="path/to/bootstrap.bundle.js"></script> <!-- Pastikan untuk menghubungkan Bootstrap JS -->
</body>
</html>
