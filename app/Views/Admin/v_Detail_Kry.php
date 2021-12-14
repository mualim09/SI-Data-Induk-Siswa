<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= $title; ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/css/app-light.css" id="lightTheme">
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <!-- Navbar atas -->
        <?= $this->include('Admin/Template_Admin/navbar_atas'); ?>

        <!-- Menu Samping -->
        <?= $this->include('Admin/Template_Admin/menu_samping'); ?>



        <?php foreach ($Q_DKaryawan->getResultArray()  as $Q_DKaryawan) : ?>
            <main role="main" class="main-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="page-title">Data Karyawan (<?= $Q_DKaryawan['NAMA_KRY']; ?>)</h2>

                            <br>
                            <!-- <div class="col-md-12"> -->
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach ($Q_DKaryawan2->getResultArray()  as $Q_DKaryawan2) : ?>
                                            <div class="col-5">
                                                <br>
                                                <center>
                                                    <img src="/assets/image/FotoKry/<?= $Q_DKaryawan2['FOTO_KRY']; ?>" style="width: 200px; height:200px;" alt="..." class="avatar-img rounded-circle">
                                                </center>
                                            </div>
                                            <div class="col">
                                                <center>
                                                    <label for="formGroupExampleInput">Nama</label>
                                                    <input type="text" class="form-control col-md-12 mb-4" id="" name="" style="text-align: center;" value="<?= $Q_DKaryawan2['NAMA_KRY']; ?>" readonly>
                                                    <label for="formGroupExampleInput">NIP</label>
                                                    <input type="text" class="form-control col-md-12 mb-4" id="" name="" style="text-align: center;" value="<?= $Q_DKaryawan2['NIP']; ?>" readonly>
                                                    <label for="formGroupExampleInput">NIK</label>
                                                    <input type="text" class="form-control col-md-12 mb-4" id="" name="" style="text-align: center;" value="<?= $Nik; ?>" readonly>
                                                </center>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <br>
                            <!-- <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p> -->
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Data Diri</strong>
                                </div>
                                <div class="card-body">
                                    <form action="/C_Admin/UpdtKry" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="TxtNip">NIP</label>
                                                    <input type="text" id="TxtNip" name="TxtNip" class="form-control TxtNip " value="<?= $Q_DKaryawan['NIP']; ?>" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtNamaLengkap">Nama Lengkap</label>
                                                    <input type="text txtNamaLengkap" id="txtNamaLengkap" name="txtNamaLengkap" class="form-control" value="<?= $Q_DKaryawan['NAMA_KRY']; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtNamaLengkap">Jenis Kelamin</label>
                                                    <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                        <option <?php echo 'pria' ==  $Q_DKaryawan['JK_KRY'] ? 'selected' : ''; ?> value="pria">Pria</option>
                                                        <option <?php echo 'wanita' ==  $Q_DKaryawan['JK_KRY'] ? 'selected' : ''; ?> value="wanita">Wanita</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtAlamat">Alamat Lengkap</label>
                                                    <textarea class="form-control txtAlamat" id="txtAlamat" name="txtAlamat" rows="4"><?= $Q_DKaryawan['ALAMAT_KRY']; ?></textarea>
                                                </div>
                                            </div> <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="txtNik">Nomor Induk Kependudukan (NIK)</label>
                                                    <input type="text" id="Txtnik" name="Txtnik" class="form-control Txtnik" value="<?= $Nik; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtAgama">Agama</label>
                                                    <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                        <option <?php echo 'Islam' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Islam">Islam</option>
                                                        <option <?php echo 'Kristen' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Kristen">Kristen</option>
                                                        <option <?php echo 'Katolik' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Katolik">Katolik</option>
                                                        <option <?php echo 'Hindu' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Hindu">Hindu</option>
                                                        <option <?php echo 'Buddha' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Buddha">Buddha</option>
                                                        <option <?php echo 'Konghucu' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
                                                        <option <?php echo 'Protestan' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Konghucu">Protestan</option>
                                                        <option <?php echo 'Lain-lain' ==  $Q_DKaryawan['AGAMA_KRY'] ? 'selected' : ''; ?> value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtTempatLahir">Tempat Lahir</label>
                                                            <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" value="<?= $Q_DKaryawan['TEMPAT_LAHIR_KRY']; ?>">
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtTglLahir">Tanggal Lahir</label>
                                                            <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= $Q_DKaryawan['TANGGAL_LAHIR_KRY']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtEmail">Email : </label>
                                                            <input type="text" class="form-control txtEmail" id="txtEmail" name="txtEmail" value="<?= $Q_DKaryawan['EMAIL_KRY']; ?>">
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtNoTelp">Nomor Telp</label>
                                                            <input type="number" class="form-control txtNoTelp" id="txtNoTelp" name="txtNoTelp" value="<?= $Q_DKaryawan['TELP_KRY']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Foto Karyawan</label>
                                                    <input type="file" class="form-control-file fotokry" id="fotokry" name="fotokry">
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="txtAlamat">Pendidikan Terakhir</label>
                                                    <textarea class="form-control txtPendidikanTerakir" id="txtPendidikanTerakir" name="txtPendidikanTerakir" rows="4"><?= $Q_DKaryawan['PENDIDIKAN_TERAKIR']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <h5>Data Login</h5>
                                        <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, obcaecati blanditiis? Quo, praesentium. Reprehenderit voluptatum unde fugiat, doloremque nam veniam quas eaque magnam voluptates porro illo fugit libero id dolor.</p> -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtIdKry">ID Karyawan</label>
                                                            <input type="text" id="txtIdKry" name="txtIdKry" minlength="4" class="form-control txtIdKry" value="<?= $Q_DKaryawan['ID_KARYAWAN']; ?>" readonly>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtPwKry">Password : </label>
                                                            <input type="text" id="txtPwKry" name="txtPwKry" minlength="8" class="form-control txtPwKry" value="<?= $Q_DKaryawan['PASSWORD_KARYAWAN']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="txtIdJab" name="txtIdJab" class="form-control txtIdJab" value="<?= $Q_DKaryawan['ID_JABATAN']; ?>" placeholder="Masukan ID Unik (Min 4 Digit)">
                                        <input type="text" id="FOTO_KRY" name="FOTO_KRY" class="form-control FOTO_KRY" value="<?= $Q_DKaryawan['FOTO_KRY']; ?>" placeholder="Masukan ID Unik (Min 4 Digit)">
                                        <div class="mx-auto mt-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Perubahan Data Karyawan</button>
                                        </div>
                                        <div class="mx-auto mt-3">
                                            <a href="/adm/snk/hapussiswa/" class="btn btn-danger btn-lg btn-block">Hapus</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- / .card -->



                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    </main> <!-- main -->
<?php endforeach; ?>
</div> <!-- .wrapper -->
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src='/js/daterangepicker.js'></script>
<script src='/js/jquery.stickOnScroll.js'></script>
<script src="/js/tinycolor-min.js"></script>
<script src="/js/config.js"></script>
<script src="/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>

</html>