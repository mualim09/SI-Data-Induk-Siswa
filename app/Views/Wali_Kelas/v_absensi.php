<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Data Absensi - SDN Sidokerto</title>
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
                        <h2 class="mb-2 page-title">Absensi kelas <?php echo $namaSubKls; ?></h2>
                        <p class="card-text">Data absensi siswa </p>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">

                                <?php if (session()->getFlashdata('pesan_insert2')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('pesan_insert2'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->

                                        <a class="btn btn-primary float-right btn-sm" href="" data-toggle="modal" data-target="#Modalsems1">Tambah</a>

                                        <!-- Ini Modal Tambah nilai siswa -->
                                        <div class="modal fade" id="Modalsems1" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="varyModalLabel">Tambah data absensi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="/wk/nilai/data_detil/insAbsensi">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Nama Siswa</label>
                                                                <select name="nisn1" id="nisn1" class="form-control">
                                                                    <?php foreach ($listSiswa->getResultArray()  as $a) : ?>
                                                                        <option value="<?= $a['NISN']; ?>"><?= $a['NAMA_LENGKAP']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Sakit</label>
                                                                <input type="number" class="form-control" id="sakit" name="sakit"></input>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Izin</label>
                                                                <input type="number" class="form-control" id="izin" name="izin"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Alpha</label>
                                                                <input type="number" class="form-control" id="alpha" name="alpha"></input>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="smt" name="smt" value="<?php echo $KlikId; ?>"></input>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <?php $O = 1 ?>
                                                <?php foreach ($DataSemester->getResultArray() as $DataSemester) : ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link  <?php echo $KlikId ==  $DataSemester['ID_SEMESTER'] ? 'active' : ''; ?>" href="/wk/absensi/<?= $DataSemester['ID_SEMESTER']; ?>">Semester <?php echo $O ?>
                                                        </a>
                                                        <?php $O = $O + 1; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">

                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <table class="table datatables" id="dataTable-1">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Sakit</th>
                                                            <th>Izin</th>
                                                            <th>Alpha</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($Absensi->getResultArray() as $O) : ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input">
                                                                        <label class="custom-control-label"></label>
                                                                    </div>
                                                                </td>
                                                                <td><?= $O['NIS']; ?></td>
                                                                <td><?= $O['NAMA_LENGKAP']; ?></td>
                                                                <td><?= $O['SAKIT']; ?></td>
                                                                <td><?= $O['IZIN']; ?></td>
                                                                <td><?= $O['ALPA']; ?></td>
                                                                <td>
                                                                    <button data-toggle="modal" data-target="#editModal" class="btn btn-outline-primary btn-sm btn-edit" data-nisn="<?= $O['NISN']; ?>" data-nis="<?= $O['NIS']; ?>" data-nama="<?= $O['NAMA_LENGKAP']; ?>" data-sakit="<?= $O['SAKIT']; ?>" data-izin="<?= $O['IZIN']; ?>" data-alpa="<?= $O['ALPA']; ?>">Edit</button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <table class="table datatables" id="dataTable-2">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Sakit</th>
                                                            <th>Izin</th>
                                                            <th>Alpha</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($Absensi->getResultArray() as $O) : ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input">
                                                                        <label class="custom-control-label"></label>
                                                                    </div>
                                                                </td>
                                                                <td><?= $O['NIS']; ?></td>
                                                                <td><?= $O['NAMA_LENGKAP']; ?></td>
                                                                <td><?= $O['SAKIT']; ?></td>
                                                                <td><?= $O['IZIN']; ?></td>
                                                                <td><?= $O['ALPA']; ?></td>
                                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="text-muted sr-only">Action</span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Edit</a>
                                                                        <a class="dropdown-item" href="#">Remove</a>
                                                                        <a class="dropdown-item" href="#">Assign</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

            <!-- edit modal -->

            <?php foreach ($Absensi->getResultArray() as $O) : ?>
                <form action="/wk/absensi/data/update">
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" id="dokumen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <input type="hidden" class="form-control NISN" name="NISN" id="NISN" readonly="readonly">

                                    <input type="hidden" class="form-control semester" name="semester" id="semester" readonly="readonly" value="<?= $KlikId; ?>">

                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control NIS" name="NIS" id="NIS" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control NAMA_LENGKAP" name="NAMA_LENGKAP" id="NAMA_LENGKAP" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah sakit</label>
                                        <input type="number" class="form-control SAKIT" name="SAKIT" id="SAKIT" value="<?= $O['SAKIT']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Izin</label>
                                        <input type="number" class="form-control IZIN" name="IZIN" id="IZIN">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Alpha</label>
                                        <input type="number" class="form-control ALPA" name="ALPA" id="ALPA">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_barang" class="barang_id">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?><br><br><br>
            <!-- edit modal selesai -->

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
        $('#dokumen').ready(function() {
            //get Edit Product
            $('.btn-edit').on('click', function() {
                // get data from button edit
                const jnisn = $(this).data('nisn');
                const jnis = $(this).data('nis');
                const jnama = $(this).data('nama');
                const jsakit = $(this).data('sakit');
                const jizin = $(this).data('izin');
                const jalpa = $(this).data('alpa');

                // Set data to Form Edit
                $('.NISN').val(jnisn);
                $('.NIS').val(jnis);
                $('.NAMA_LENGKAP').val(jnama);
                $('.SAKIT').val(jsakit);
                $('.IZIN').val(jizin);
                $('.ALPA').val(jalpa).trigger('change');
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const idb = $(this).data('id');
                // Set data to Form Edit
                $('.barang_id').val(idb);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });
        });
    </script>

    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });

        $('#dataTable-2').DataTable({
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