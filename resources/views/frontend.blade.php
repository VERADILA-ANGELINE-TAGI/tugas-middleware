<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MiniMart - Minimarket Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                🛒 MiniMart
            </a>

            <div>
                <a href="/login" class="btn btn-light">
                    Login
                </a>
            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="bg-light py-5">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h1 class="display-4 fw-bold">
                        Selamat Datang di MiniMart
                    </h1>

                    <p class="lead">
                        Belanja kebutuhan sehari-hari dengan mudah,
                        cepat, dan praktis.
                    </p>

                    <a href="/products" class="btn btn-primary btn-lg">
                        Lihat Produk
                    </a>

                    <a href="/login" class="btn btn-outline-primary btn-lg">
                        Login
                    </a>

                </div>

                <div class="col-md-6 text-center">

                    <div class="display-1">
                        🛒
                    </div>

                    <h3>
                        MiniMart
                    </h3>

                    <p class="text-muted">
                        Minimarket Online
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- PRODUK -->
    <section class="py-5">

        <div class="container">

            <h2 class="text-center fw-bold mb-4">
                Produk Pilihan
            </h2>

            <div class="row">


                <!-- PRODUK 1 -->
                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body text-center">

                            <div class="display-3">
                                🍚
                            </div>

                            <h5 class="card-title">
                                Beras
                            </h5>

                            <p class="text-muted">
                                Beras berkualitas untuk kebutuhan keluarga.
                            </p>

                            <h5 class="text-primary">
                                Rp15.000
                            </h5>

                        </div>

                    </div>

                </div>


                <!-- PRODUK 2 -->
                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body text-center">

                            <div class="display-3">
                                🥤
                            </div>

                            <h5 class="card-title">
                                Minuman
                            </h5>

                            <p class="text-muted">
                                Berbagai pilihan minuman segar.
                            </p>

                            <h5 class="text-primary">
                                Rp5.000
                            </h5>

                        </div>

                    </div>

                </div>


                <!-- PRODUK 3 -->
                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body text-center">

                            <div class="display-3">
                                🍪
                            </div>

                            <h5 class="card-title">
                                Makanan Ringan
                            </h5>

                            <p class="text-muted">
                                Camilan untuk menemani aktivitasmu.
                            </p>

                            <h5 class="text-primary">
                                Rp8.000
                            </h5>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4">

        <p class="mb-0">
            © 2026 MiniMart. All Rights Reserved.
        </p>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>