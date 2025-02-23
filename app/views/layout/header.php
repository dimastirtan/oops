<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1;
        }
        footer {
            background: #333;
            padding: 15px;
            text-align: center;
            width: 100%;
            color: #fff;
        }
    </style>

</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light ms-3" href="?page=home">Inventory</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link text-light" href="?page=pelanggan">Pelanggan</a>
            <a class="nav-link text-light" href="?page=produk">Produk</a>
            <a class="nav-link text-light" href="?page=penjualan">Penjualan</a>
        </div>
        </div>
    </div>
    </nav>
    </header>
    <main>
    <div class="container">