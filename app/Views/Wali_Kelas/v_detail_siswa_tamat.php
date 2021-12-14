<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
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
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <!-- Navbar atas -->
        <?= $this->include('Wali_Kelas/Template_Wali/navbar_atas'); ?>

        <!-- Menu Samping -->
        <?= $this->include('Wali_Kelas/Template_Wali/menu_samping'); ?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">Detail Data Siswa</h2>
                        <p class="card-text">Detail informasi data siswa </p>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- <img src="/assets/avatars/kece.jpg" alt="gak keluar" class="float-left mx-4 my- rounded-circle " style="height:250px;"> -->

                                        <!-- table -->
                                        <?php foreach ($NilaiMapel1->getResultArray() as $O) : ?>
                                            <div class="form-row ml-4">
                                                <div class="col ml-4">
                                                    <label for="formGroupExampleInput">NISN</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="NISN" name="NISN" value="<?= $O['NISN']; ?>" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">NIS</label>
                                                    <input type="text" class="form-control col-md-10" id="NIS" name="NIS" value="<?= $O['NIS']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class=" form-row ml-4">
                                                <div class="col ml-4">
                                                    <label for="formGroupExampleInput">Nama Lengkap</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="txtNmWaliKls" name="txtNmWaliKls" value="<?= $O['NAMA_LENGKAP']; ?>" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">Jenis Kelamin</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaL" name="txtJumSiswaL" value="<?= $O['JENIS_KELAMIN']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class=" form-row ml-4">
                                                <div class=" col ml-4">
                                                    <label for="formGroupExampleInput">Agama</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaP" name="txtJumSiswaP" value="<?= $O['AGAMA']; ?>" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">Kelas</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaP" name="txtJumSiswaP" value="<?php echo $subKls; ?>" readonly>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->

                        <div class="row mt-5">
                            <div class="col-12">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/wk/data_siswa/<?= $O['NISN']; ?>">Data Siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/wk/data_siswa/ortu/<?= $O['NISN']; ?>">Orang tua siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/wk/data_siswa/mbaru/<?= $O['NISN']; ?>">Murid baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/wk/data_siswa/mpindahan/<?= $O['NISN']; ?>">Murid pindahan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link active" aria-current="page" href="/wk/data_siswa/tamat/<?= $O['NISN']; ?>">Tamat belajar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <!-- Tabs -->
                                                <h5 class="card-title">Detail siswa tamat</h5>
                                            </div>
                                        </div>

                                        <?php foreach ($dataTamat->getResultArray() as $O) : ?>
                                            <br>
                                            <div class="form-row">
                                                <div class="col ml-4">
                                                    <label for="formGroupExampleInput">Tahun tamat</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="THN_TAMAT" name="THN_TAMAT" value="<?= $O['THN_TAMAT']; ?>" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">No Ijazah</label>
                                                    <input type="text" class="form-control col-md-10" id="NO_IJAZAH_STTB" name="NO_IJAZAH_STTB" value="<?= $O['NO_IJAZAH_STTB']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class=" form-row">
                                                <div class="col ml-4">
                                                    <label for="formGroupExampleInput">Sekolah lanjutan</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="SEKOLAH_LANJUTAN" name="SEKOLAH_LANJUTAN" value="<?= $O['SEKOLAH_LANJUTAN']; ?>" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <input type="hidden" class="form-control col-md-10" id="PENDIDIKAN_IBU" name="PENDIDIKAN_IBU" readonly>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->

                        </div> <!-- .row -->
                    </div> <!-- .container-fluid -->

                    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="list-group list-group-flush my-n3">
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Package has uploaded successfull</strong></small>
                                                    <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                                    <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-download fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Widgets are updated successfull</strong></small>
                                                    <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                                    <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-inbox fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Notifications have been sent</strong></small>
                                                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                                    <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-link fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Link was attached to menu</strong></small>
                                                    <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                                </div>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div> <!-- / .list-group -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-success justify-content-center">
                                                <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Control area</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Activity</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Droplet</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Upload</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Users</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Settings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>