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
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/css/app-light.css" id="lightTheme">


    <style>
        @media print {

            .aku .deskripsi,
            .btn,
            .nav,
            .tabel-card {
                display: none;
            }

            /* .cb1 {
                display: none;
            } */

            .navbarku233 {
                display: none;
            }

            #debug-icon-link {
                display: none;
            }
        }
    </style>
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
                        <h2 class="mb-2 page-title">Detail Data Siswa </h2>
                        <?php $thn_ini = date('Y'); ?>
                        <?php $thn_dtg = date('Y', strtotime('+1 year')); ?>
                        <h4>Periode tahun <?php echo $thn_ini; ?> - <?php echo $thn_dtg; ?></h4>
                        <!-- <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p> -->
                        <?php if (session()->getFlashdata('pesan_insert')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pesan_insert'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('pesan_Update')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pesan_Update'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Alret Delete -->
                        <?php if (session()->getFlashdata('pesan_hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan_hapus'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Detail Data Kelas -->
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <?php foreach ($dataDiri->getResultArray()  as $dataDiri) : ?>
                                            <div class="row">
                                                <div class="col-5">
                                                    <br>
                                                    <center>
                                                        <img src="/assets/image/FotoSiswa/<?= $dataDiri['FOTO_SISWA']; ?>" style="width: 200px; height:200px;" alt="..." class="avatar-img rounded-circle">
                                                    </center>
                                                </div>
                                                <div class="col">
                                                    <center>
                                                        <label for="formGroupExampleInput">Nama Lengkap</label>
                                                        <input type="text" class="form-control col-md-12 mb-4" id="txtNmKelas" name="txtNmKelas" style="text-align: center;" value="<?= $dataDiri['NAMA_LENGKAP']; ?>" readonly>
                                                        <label for="formGroupExampleInput">NISN</label>
                                                        <input type="text" class="form-control col-md-12 mb-4" id="txtNmKelas" name="txtNmKelas" style="text-align: center;" value="<?= $dataDiri['NISN']; ?>" readonly>
                                                        <label for="formGroupExampleInput">NIS</label>
                                                        <input type="text" class="form-control col-md-12 mb-4" id="txtNmKelas" name="txtNmKelas" style="text-align: center;" value="<?= $dataDiri['NIS']; ?>" readonly>
                                                    </center>
                                                </div>
                                            </div>
                                            <?php $nisnku = $dataDiri['NISN']; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Menu Siswa -->
                        <?= $this->include('Admin/Detail_Siswa/Menu_Detail'); ?>

                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <!-- Tabs -->
                                                <h5 class="card-title">Data Siswa Kelas</h5>
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                            </div>

                                            <div class="col">
                                                <a type="button" href="/adm/cetak/BukuInduk/<?= $nisnku; ?>" class="btn mb-2 btn-secondary btn-sm mr-1"><span class="fe fe-printer fe-16 mr-2"></span>Cetak Buku Induk</a>
                                                <a type="button" href="/adm/snk/hapussiswa/<?= $nisnku; ?>" class="btn mb-2 btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data siswa ? \n data nilai,absensi,data kesehatan akan ikut di hapus.')"><span class="fe fe-trash-2 fe-16 mr-2"></span>Hapus Data Siswa</a>
                                                <!-- <button type="button" class="btn mb-2 btn-secondary btn-sm ml-1" onclick="window.print()"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</button> -->
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <?php foreach ($DataSiswa->getResultArray()  as $DataSiswa) : ?>
                                                    <form action="/C_Admin/UpdtSiswa" method="POST" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtNisn">NISN</label>
                                                                        <input type="text" id="txtNisn" name="txtNisn" class="form-control txtNisn <?= ($validation->hasError('txtNisn')) ? 'is-invalid' : ''; ?>" value="<?= $DataSiswa['NISN']; ?>" readonly>
                                                                        <div class=" invalid-feedback">
                                                                            <?= $validation->getError('txtNisn'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtNamaL">Nama Lengkap</label>
                                                                        <input type="text" id="txtNamaL" name="txtNamaL" class="form-control txtNamaL" placeholder="" value="<?= $DataSiswa['NAMA_LENGKAP']; ?>">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtJK">Jenis Kelamin</label>
                                                                        <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                                            <option <?php echo 'Laki - laki' ==  $DataSiswa['JENIS_KELAMIN'] ? 'selected' : ''; ?> value="Laki - laki">Laki - laki</option>
                                                                            <option <?php echo 'Perempuan' ==  $DataSiswa['JENIS_KELAMIN'] ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtAgama">Agama</label>
                                                                        <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                                            <option <?php echo 'Islam' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Islam">Islam</option>
                                                                            <option <?php echo 'Kristen' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Kristen">Kristen</option>
                                                                            <option <?php echo 'Katolik' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Katolik">Katolik</option>
                                                                            <option <?php echo 'Hindu' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Hindu">Hindu</option>
                                                                            <option <?php echo 'Buddha' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Buddha">Buddha</option>
                                                                            <option <?php echo 'Konghucu' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
                                                                            <option <?php echo 'Protestan' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Konghucu">Protestan</option>
                                                                            <option <?php echo 'Lain-lain' ==  $DataSiswa['AGAMA'] ? 'selected' : ''; ?> value="Lain-lain">Lain-lain</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtTempatTingal">Jenis Tempat Tinggal</label>
                                                                        <input type="text " id="txtTempatTingal" name="txtTempatTingal" class="form-control" placeholder="" value="<?= $DataSiswa['JENIS_TEMPAT_TINGGAL']; ?>">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtAlamat">Alamat </label>
                                                                        <textarea type="text " id="txtAlamat" name="txtAlamat" rows="5" class="form-control" placeholder=""><?= $DataSiswa['ALAMAT_SISWA']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <div class="col-md-7">
                                                                            <label for="fotoSiswa">Foto Siswa</label>
                                                                            <input type="file" class="form-control-file <?= ($validation->hasError('fotoSiswa')) ? 'is-invalid' : ''; ?>" id="fotoSiswa" name="fotoSiswa">
                                                                            <div class="invalid-feedback">
                                                                                <?= $validation->getError('fotoSiswa'); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- /.col -->
                                                                <div class=" col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtNis">Nomor Induk Siswa</label>
                                                                        <input type="text" id="txtNis" name="txtNis" class="form-control txtNis " value="<?= $DataSiswa['NIS']; ?>">

                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtNamaP">Nama Panggilan</label>
                                                                        <input type="text" id="txtNamaP" name="txtNamaP" class="form-control txtNamaP " placeholder="" value="<?= $DataSiswa['NAMA_PANGGILAN']; ?>">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="txtSubKelas">Kelas</label>
                                                                        <select class="form-control txtSubKelas" id="txtSubKelas" name="txtSubKelas">
                                                                            <?php foreach ($DataSubkelas->getResultArray()  as $DataSubkelas) : ?>
                                                                                <option <?php echo $DataSiswa['ID_SUB_KLS'] ==  $DataSubkelas['ID_SUB_KLS'] ? 'selected' : ''; ?> value="<?= $DataSubkelas['ID_SUB_KLS']; ?>"><?= $DataSubkelas['NAMA_SUB_KELAS']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <label for="txtTempatLahir">Tempat Lahir</label>
                                                                                <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" placeholder="" value="<?= $DataSiswa['TEMPAT_LAHIR']; ?>">
                                                                            </div>
                                                                            <div class="col-md">
                                                                                <label for="txtTglLahir">Tanggal Lahir</label>
                                                                                <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= $DataSiswa['TANGGAL_LAHIR']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <label for="txtKewarganegaraan">Kewarganegaraan : </label>
                                                                                <input type="text" class="form-control txtKewarganegaraan" id="txtKewarganegaraan" name="txtKewarganegaraan" value="<?= $DataSiswa['KEWARGANEGARAAN']; ?>" placeholder="">
                                                                            </div>
                                                                            <div class="col-md">
                                                                                <label for="txtBahasa">Bahasa</label>
                                                                                <input type="text" class="form-control txtBahasa" id="txtBahasa" name="txtBahasa" value="<?= $DataSiswa['BAHASA']; ?>" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <label for="txtJumlahSaudara">Jumlah Saudara : </label>
                                                                                <input type="number" class="form-control txtJumlahSaudara" id="txtJumlahSaudara" name="txtJumlahSaudara" value="<?= $DataSiswa['JUMLAH_SAUDARA']; ?>" placeholder="">
                                                                            </div>
                                                                            <div class="col-md">
                                                                                <label for="txtTglMasuk">Tanggal Masuk</label>
                                                                                <input type="text" class="form-control txtTglMasuk" id="txtTglMasuk" name="txtTglMasuk" value='23/02/2018' placeholder="" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <label for="txtJarakSekolah">Jarak Ke Sekolah : </label>
                                                                                <input type="text" class="form-control txtJarakSekolah" id="txtJarakSekolah" name="txtJarakSekolah" value="<?= $DataSiswa['JARAL_SEKOLAH']; ?>" placeholder="">
                                                                            </div>
                                                                            <div class="col-md">
                                                                                <label for="txtNoWali">No. Telp Wali</label>
                                                                                <input type="Number " class="form-control txtNoWali" id="txtNoWali" name="txtNoWali" value="<?= $DataSiswa['NO_TELP']; ?>" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md">
                                                                                <label for="txtGolDar">Golongan Darah</label>
                                                                                <input type="Number " class="form-control txtGolDar" id="txtGolDar" name="txtGolDar" value="<?= $DataSiswa['GOLONGAN_DARAH']; ?>" placeholder="">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <hr>
                                                            <center>
                                                                <h5 class="card-title mb-4"> Orang tua Murid & Wali Murid</h5>
                                                            </center>
                                                            <!-- Nama -->
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <?php foreach ($DataOrtu->getResultArray()  as $DataOrtu) : ?>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nama Ayah</label>
                                                                                <input type="text" class="form-control txtnamaayah" id="txtnamaayah" name='txtnamaayah' value="<?= $DataOrtu['NAMA_AYAH']; ?>">
                                                                            </div>
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nama Ibu</label>
                                                                                <input type="text" class="form-control txtnamaibu" id="txtnamaibu" name='txtnamaibu' value="<?= $DataOrtu['NAMA_IBU']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <!-- Pendidikan -->
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pedndidikan Ayah</label>
                                                                                <input type="text" class="form-control txtpendidikanayah" id="txtpendidikanayah" name='txtpendidikanayah' value="<?= $DataOrtu['PENDIDIKAN_AYAH']; ?>">
                                                                            </div>
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pedndidikan Ibu</label>
                                                                                <input type="text" class="form-control txtpendidikanibu" id="txtpendidikanibu" name='txtpendidikanibu' value="<?= $DataOrtu['PENDIDIKAN_IBU']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <!-- Pekerjaan -->
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pekerjaan Ayah</label>
                                                                                <input type="text" class="form-control txtpekerjaanayah" id="txtpekerjaanayah" name='txtpekerjaanayah' value="<?= $DataOrtu['PEKERJAAN_AYAH']; ?>">
                                                                            </div>
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pekerjaan Ibu</label>
                                                                                <input type="text" class="form-control txtpekerjaanibu" id="txtpekerjaanibu" name='txtpekerjaanibu' value="<?= $DataOrtu['PEKERJAAN_IBU']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="col" style="border-left: 0.1px solid #ebe4e4;">
                                                                    <?php foreach ($DataWali->getResultArray()  as $DataWali) : ?>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nama Wali Murid</label>
                                                                                <input type="text" class="form-control txtNamaWali" name="txtNamaWali" id="txtNamaWali" value="<?= $DataWali['NAMA_WALIMURID']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pendidikan Wali Murid</label>
                                                                                <input type="text" class="form-control txtPendidikanWali" name="txtPendidikanWali" id="txtPendidikanWali" value="<?= $DataWali['PENDIDIKAN_WALIMURID']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Hubungan Keuarga </label>
                                                                                <input type="text" class="form-control txtHubunganWali" name="txtHubunganWali" id="txtHubunganWali" value="<?= $DataWali['HUBUNGAN_KELUARGA_WALIMURID']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Pekerjaan Wali Murid</label>
                                                                                <input type="text" class="form-control txtPekerjaanWali" name="txtPekerjaanWali" id="txtPekerjaanWali" value="<?= $DataWali['PEKERJAAN_WALIMURID']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <center>
                                                                <h5 class="card-title mb-4"> Pendidikan Sebelumnya</h5>
                                                            </center>
                                                            <div class="row">
                                                                <?php foreach ($DataMuridBaru->getResultArray()  as $DataMuridBaru) : ?>
                                                                    <div class="col">
                                                                        <h6 class="card-title"> Masuk Menjadi Murid Baru Tingkat 1</h6>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Asal Murid</label>
                                                                                <input type="text" class="form-control txtAsalMurid" name="txtAsalMurid" id="txtAsalMurid" value="<?= $DataMuridBaru['ASAL_MURID']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nama Taman Kanak-Kanak</label>
                                                                                <input type="text" class="form-control txtnmTK" name="txtnmTK" id="txtnmTK" value="<?= $DataMuridBaru['NAMA_TK']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nomor STTB</label>
                                                                                <input type="text" class="form-control txtsttbbaru" name="txtsttbbaru" id="txtsttbbaru" value="<?= $DataMuridBaru['NOMOR_STTB']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>

                                                                <?php foreach ($DataMuridPindahan->getResultArray()  as $DataMuridPindahan) : ?>
                                                                    <div class="col">
                                                                        <h6 class="card-title">Pindahan Dari Sekolah Lain</h6>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Nama Sekolah Asal</label>
                                                                                <input type="text" class="form-control txtsekolahasalpindah" name="txtsekolahasalpindah" id="txtsekolahasalpindah" value="<?= $DataMuridPindahan['ASAL_SEKOLAH']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Dari Tinggkat</label>
                                                                                <input type="text" class="form-control txttinggkatpindah" name="txttinggkatpindah" id="txttinggkatpindah" value="<?= $DataMuridPindahan['TINGKAT_KELAS']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Diterima Tanggal</label>
                                                                                <input type="date" class="form-control txttglpindah" name="txttglpindah" id="txttglpindah" value="<?= $DataMuridPindahan['TGL_PENERIMAAN']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <hr>
                                                            <center>
                                                                <h5 class="card-title mb-4"> Meninggalkan Sekolah</h5>
                                                            </center>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <?php foreach ($tamat_belajar->getResultArray()  as $tamat_belajar) : ?>
                                                                        <h6 class="card-title">Tamat Belajar</h6>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Tanggal Tamat Belajar</label>
                                                                                <input type="date" class="form-control tbtahuntamat" name="tbtahuntamat" id="tbtahuntamat" value="<?= $tamat_belajar['THN_TAMAT']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">No.Ijazah/STTB</label>
                                                                                <input type="text" class="form-control tbnoijazah" name="tbnoijazah" id="tbnoijazah" value="<?= $tamat_belajar['NO_IJASAH_STTB']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Melanjutkan Ke Sekolah</label>
                                                                                <input type="text" class="form-control tblajutsekolah" name="tblajutsekolah" id="tblajutsekolah" value="<?= $tamat_belajar['SEKOLAH_LANJUTAN']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="col">

                                                                    <?php foreach ($pindah_sekolah->getResultArray()  as $pindah_sekolah) : ?>
                                                                        <h6 class="card-title">Pindah Sekolah</h6>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Dari Tingkat</label>
                                                                                <input type="text" class="form-control psdaritinggkat" name="psdaritinggkat" id="psdaritinggkat" value="<?= $pindah_sekolah['DARI_TINGGKAT']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Ke Sekolah</label>
                                                                                <input type="text" class="form-control pskesekolah" name="pskesekolah" id="pskesekolah" value="<?= $pindah_sekolah['KE_SEKOLAH']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Ke Tinggkat</label>
                                                                                <input type="text" class="form-control psketinggkat" name="psketinggkat" id="psketinggkat" value="<?= $pindah_sekolah['KE_TINGGKAT']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Tanggal Pindah</label>
                                                                                <input type="date" class="form-control pstglpindah" name="pstglpindah" id="pstglpindah" value="<?= $pindah_sekolah['TGL_PINDAH_SEKOLAH']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="col">

                                                                    <?php foreach ($keluar_sekolah->getResultArray()  as $keluar_sekolah) : ?>
                                                                        <h6 class="card-title">Keluar Sekolah</h6>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Tanggal Keluar Sekolah</label>
                                                                                <input type="Date" class="form-control kstanggalkeluarsekolah" name="kstanggalkeluarsekolah" id="kstanggalkeluarsekolah" value="<?= $keluar_sekolah['TANGGAL_KELUAR']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md">
                                                                                <label for="inputCity">Alasan</label>
                                                                                <textarea type="text" class="form-control ksalasankeluar" name="ksalasankeluar" id="ksalasankeluar" cols="30" rows="8.8"><?= $keluar_sekolah['ALASAN']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
















                                                            <input type="Hidden" class="form-control txtNamaFoto" id="txtNamaFoto" name="txtNamaFoto" value="<?= $DataSiswa['FOTO_SISWA']; ?>" placeholder="">

                                                            <div class="mx-auto mt-3">
                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Perubahan</button>
                                                            </div>
                                                            <div class="mx-auto mt-3">
                                                                <a href="/adm/snk/hapussiswa/<?= $nisnku; ?>" class="btn btn-danger btn-lg btn-block">Hapus</a>
                                                            </div>

                                                    </form>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->

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
    <script src='/js/jquery.dataTables.min.js'></script>
    <script src='/js/dataTables.bootstrap4.min.js'></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
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


    <script>
        $('#dokumen').ready(function() {
            // get Delete Product
            $('.btn-editKelas').on('click', function() {
                // get data from button edit
                const idb = $(this).data('id');
                // Set data to Form Edit
                $('.barang_id').val(idb);
                // Call Modal Edit
                $('#ModalEditKelas').modal('show');
            });
        });
    </script>
</body>

</html>