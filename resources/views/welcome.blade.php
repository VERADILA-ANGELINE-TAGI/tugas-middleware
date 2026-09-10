<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ONESR - Minimarket</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                🛒 ONESR
            </a>

            <div>
                <a href="/login" class="btn btn-light">
                    Login
                </a>
            </div>

        </div>
    </nav>


    <!-- FRONTEND -->
    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="display-4 fw-bold">
                    Selamat Datang di ONESR
                </h1>

                <p class="lead">
                    Minimarket online untuk memenuhi kebutuhan
                    sehari-hari dengan mudah dan praktis.
                </p>

                <a href="/products" class="btn btn-primary btn-lg">
                    Lihat Produk
                </a>

                <a href="/login" class="btn btn-outline-primary btn-lg">
                    Login
                </a>

            </div>

            <div class="col-md-6 text-center">

                <div style="font-size: 150px;">
                    🛒
                </div>

                <h2 class="fw-bold">
                    ONESR Minimarket
                </h2>

                <p class="text-muted">
                    Belanja mudah, cepat, dan praktis.
                </p>

            </div>

        </div>


        <!-- PRODUK -->
        <hr class="my-5">

        <h2 class="text-center fw-bold mb-4">
            Produk Pilihan
        </h2>

        <div class="row">

            <!-- Produk 1 -->
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body text-center">

                        <div style="font-size: 70px;">
                            🍚
                        </div>

                        <h5 class="card-title">
                            Beras
                        </h5>

                        <p class="text-muted">
                            Beras berkualitas untuk kebutuhan sehari-hari.
                        </p>

                        <h5 class="text-primary">
                            Rp15.000
                        </h5>

                    </div>

                </div>

            </div>


            <!-- Produk 2 -->
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body text-center">

                        <div style="font-size: 70px;">
                            🥤
                        </div>

                        <h5 class="card-title">
                            Minuman
                        </h5>

                        <p class="text-muted">
                            Berbagai macam minuman untuk menemani aktivitas.
                        </p>

                        <h5 class="text-primary">
                            Rp5.000
                        </h5>

                    </div>

                </div>

            </div>


            <!-- Produk 3 -->
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body text-center">

                        <div style="font-size: 70px;">
                            🍪
                        </div>

                        <h5 class="card-title">
                            Snack
                        </h5>

                        <p class="text-muted">
                            Camilan lezat untuk menemani waktu santai.
                        </p>

                        <h5 class="text-primary">
                            Rp8.000
                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4">

        <p class="mb-0">
            © 2026 ONESR Minimarket
        </p>

    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>