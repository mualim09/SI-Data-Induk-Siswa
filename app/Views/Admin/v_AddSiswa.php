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

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Form Pendaftaran Siswa Baru</h2>
                        <!-- <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p> -->
                        <div class="card shadow mb-4">
                            <form action="/C_Admin/SaveSiswa" method="POST" enctype="multipart/form-data">
                                <div class="card-header">
                                    <strong class="card-title">Data Diri</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="txtNisn">NISN</label>
                                                <input type="text" id="txtNisn" name="txtNisn" class="form-control txtNisn <?= ($validation->hasError('txtNisn')) ? 'is-invalid' : ''; ?>" value="<?= old('txtNisn'); ?>">
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('txtNisn'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtNamaL">Nama Lengkap</label>
                                                <input type="text" id="txtNamaL" name="txtNamaL" class="form-control txtNamaL" placeholder="" value="<?= old('txtNamaL'); ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtJK">Jenis Kelamin</label>
                                                <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                    <option value="Laki - laki">Laki - laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtAgama">Agama</label>
                                                <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtTempatTingal">Jenis Tempat Tinggal</label>
                                                <input type="text " id="txtTempatTingal" name="txtTempatTingal" class="form-control" placeholder="" value="<?= old('txtTempatTingal'); ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtAlamat">Alamat </label>
                                                <textarea type="text " id="txtAlamat" name="txtAlamat" rows="5" class="form-control" placeholder="" value="<?= old('txtAlamat'); ?>"><?= old('txtAlamat'); ?></textarea>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="txtNis">Nomor Induk Siswa</label>
                                                <input type="text" id="txtNis" name="txtNis" class="form-control txtNis <?= ($validation->hasError('txtNis')) ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('txtNis'); ?>">

                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('txtNis'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtNamaP">Nama Panggilan</label>
                                                <input type="text" id="txtNamaP" name="txtNamaP" class="form-control txtNamaP " placeholder="" value="<?= old('txtNamaP'); ?>">
                                            </div>
                                            <!-- <div class="form-group mb-3">
                                                <label for="txtAgama">Agama</label>
                                                <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div> -->

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtTempatLahir">Tempat Lahir</label>
                                                        <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" placeholder="" value="<?= old('txtTempatLahir'); ?>">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtTglLahir">Tanggal Lahir</label>
                                                        <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= old('txtTglLahir'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtKewarganegaraan">Kewarganegaraan : </label>
                                                        <input type="text" class="form-control txtKewarganegaraan" id="txtKewarganegaraan" name="txtKewarganegaraan" value="<?= old('txtTempatLahir'); ?>" placeholder="">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtBahasa">Bahasa</label>
                                                        <input type="text" class="form-control txtBahasa" id="txtBahasa" name="txtBahasa" value="<?= old('txtBahasa'); ?>" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtJumlahSaudara">Jumlah Saudara : </label>
                                                        <input type="number" class="form-control txtJumlahSaudara" id="txtJumlahSaudara" name="txtJumlahSaudara" value="<?= old('txtJumlahSaudara'); ?>" placeholder="">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtTglMasuk">Tanggal Masuk</label>
                                                        <input type="Date" class="form-control txtTglMasuk" id="txtTglMasuk" name="txtTglMasuk" value="<?= old('txtTglMasuk'); ?>" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtJarakSekolah">Jarak Ke Sekolah : </label>
                                                        <input type="text" class="form-control txtJarakSekolah" id="txtJarakSekolah" name="txtJarakSekolah" value="<?= old('txtTempatLahir'); ?>" placeholder="">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtNoWali">No. Telp Wali</label>
                                                        <input type="Number " class="form-control txtNoWali" id="txtNoWali" name="txtNoWali" value="<?= old('txtNoWali'); ?>" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <label for="txtGolDar">Golongan Darah</label>
                                                        <input type="Number " class="form-control txtGolDar" id="txtGolDar" name="txtGolDar" value="<?= old('txtGolDar'); ?>" placeholder="">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label for="fotoSiswa">Foto Siswa</label>
                                                        <input type="file" class="form-control-file <?= ($validation->hasError('fotoSiswa')) ? 'is-invalid' : ''; ?>" id="fotoSiswa" name="fotoSiswa">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('fotoSiswa'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>

                                    <input type="hidden" id="txtSubKelas" name="txtSubKelas" class="form-control txtSubKelas" value="<?= $idSub; ?>" placeholder="">
                                    <div class="mx-auto mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Data Siswa</button>
                                    </div>

                            </form>
                        </div>
                    </div>

                </div> <!-- / .card -->



            </div> <!-- .col-12 -->
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    </main> <!-- main -->
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