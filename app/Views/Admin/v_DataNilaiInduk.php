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
                        <h2 class="page-title">Nilai </h2>

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

                        <div class="row">
                            <!-- simple table -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class=" nav-link disabled">Semester</a>
                                            </li>

                                            <?php foreach ($DataSemester->getResultArray()  as $DataSemester) : ?>
                                                <li class="nav-item ">
                                                    <a class="nav-link <?php echo $id_semester ==  $DataSemester['ID_SEMESTER'] ? 'active' : ''; ?>" href="/adm/nilai/<?= $DataSemester['ID_SEMESTER']; ?>/MP22518"><?= $DataSemester['ID_SEMESTER']; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-12 my-4">
                                <div class="card shadow">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-10">
                                                <h4 class="card-title">Data Nilai</h4>
                                                <h5 class="card-title"><?= $DataNilai2; ?></h5>
                                            </div>
                                            <div class="col">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Mata Pelajaran
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <?php foreach ($DataPaketAjar->getResultArray()  as $DataPaketAjar) : ?>
                                                            <a class="dropdown-item" type="button" href="/adm/nilai/<?= $id_semester; ?>/<?= $DataPaketAjar['ID_DETAIL_MAPEL']; ?>"><?= $DataPaketAjar['NAMA_MAPEL']; ?></a>
                                                        <?php endforeach; ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>

                                        <table class="table table-hover" id="dataTable-1">
                                            <thead>
                                                <tr>
                                                    <th>NISN</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>TUGAS</th>
                                                    <th>UTS</th>
                                                    <th>UAS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataNilai->getResultArray()  as $DataNilai) : ?>
                                                    <tr>
                                                        <td><?= $DataNilai['NISN']; ?></td>
                                                        <td><?= $DataNilai['NAMA_LENGKAP']; ?></td>
                                                        <td><?= $DataNilai['NAMA_SUB_KELAS']; ?></td>
                                                        <td><?= $DataNilai['NAMA_MAPEL']; ?></td>
                                                        <td><?= $DataNilai['TUGAS']; ?></td>
                                                        <td><?= $DataNilai['UTS']; ?></td>
                                                        <td><?= $DataNilai['UAS']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->

                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

        </main> <!-- main -->


    </div> <!-- .wrapper -->
    <script src=" /js/jquery.min.js"></script>
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