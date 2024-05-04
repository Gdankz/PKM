<html>
<head>
    <title>Login SIPAIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container-fluid"></div>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <img src="logo%20pkm-kc.png" alt="SIPAIR LOGO" >
            </div>
            <div class="card-body">
                <form action="./inputProcess.php" method="POST">
                    <div class="mb-3 text-center">
                        <label for="rekamMedis" class="form-label">Masukkan No Rekam Medis</label>
                        <input type="text" class="form-control" id="rekamMedis" name="rekamMedis" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="nama" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambah Data Pasien</button>
                        <a href="Login.php" class="btn btn-danger">Kembali ke Halaman Awal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
