<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - MiniMarket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-primary shadow">
        <div class="container-fluid">

            <span class="navbar-brand fw-bold">
                🛒 MiniMarket Admin
            </span>

            <form action="/logout" method="POST">
                @csrf

                <button type="submit" class="btn btn-light">
                    Logout
                </button>
            </form>

        </div>
    </nav>


    <!-- CONTENT -->
    <div class="container py-5">

        <h2 class="fw-bold mb-4">
            Dashboard Admin
        </h2>

        <div class="row">

            <!-- TOTAL PRODUK -->
            <div class="col-md-6 mb-4">

                <div class="card shadow border-0">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Total Produk
                        </h6>

                        <h1 class="fw-bold text-primary">
                            {{ $totalProduk }}
                        </h1>

                    </div>

                </div>

            </div>


            <!-- TOTAL STOK -->
            <div class="col-md-6 mb-4">

                <div class="card shadow border-0">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Total Stok
                        </h6>

                        <h1 class="fw-bold text-success">
                            {{ $totalStok }}
                        </h1>

                    </div>

                </div>

            </div>

        </div>


        <!-- MENU -->
        <div class="card shadow border-0 mt-3">

            <div class="card-body">

                <h5 class="fw-bold">
                    Menu Admin
                </h5>

                <p class="text-muted">
                    Kelola data produk MiniMarket melalui halaman admin.
                </p>

                <a href="/products" class="btn btn-primary">
                    📦 Lihat Produk
                </a>

            </div>

        </div>

    </div>


    <footer class="bg-dark text-white text-center py-3 mt-5">

        <p class="mb-0">
            © 2026 MiniMarket
        </p>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>