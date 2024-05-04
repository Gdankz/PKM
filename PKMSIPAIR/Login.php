<html>
<head>
    <title>Login SIPAIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </script>
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
                    <form action="./cekDatabase.php" method="POST">
                        <div class="mb-3 text-center">
                            <label for="rekamMedis" class="form-label">No Rekam Medis</label>
                            <input type="text" class="form-control" id="rekamMedis" name="rekamMedis" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <br>
                            <a href="buatAkun.php" class="btn btn-link">Belum Terdaftar? Buat Akun</a>
                        </div>
                    </form>
                    <?php
                    if(isset($_GET['error']) && $_GET['error'] == 'not_registered') {
                        echo '<div class="alert alert-danger mt-3" role="alert">Nomor rekam medis belum terdaftar!</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>