<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - MINIGIRL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-danger-subtle">

    <div class="container">

        <div class="row justify-content-center align-items-center"
            style="min-height: 100vh;">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-body p-5">

                        <h2 class="text-center fw-bold">
                            🛒 MINIGIRL
                        </h2>

                        <p class="text-center text-muted mb-4">
                            Silakan Login
                        </p>

                        <form action="/login" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>

                            </div>

                            <button type="submit"
                                class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                        <div class="text-center mt-3">

                            <a href="/">
                                ← Kembali ke Frontend
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>