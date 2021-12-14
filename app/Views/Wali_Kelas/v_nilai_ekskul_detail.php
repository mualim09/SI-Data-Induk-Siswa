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
                        <?php if (session()->getFlashdata('pesan_insert')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pesan_insert'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <h2 class="mb-2 page-title">Detail nilai ekskul</h2>
                        <p class="card-text">Detail nilai ekstrakuliler siswa </p>

                        <div class="row">
                            <!-- Striped rows -->
                            <!-- Tabel Jabatan -->
                            <div class="col-md-6 my-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Semester 1</h5>
                                            </div>
                                            <div class="col">
                                                <a class="btn mb-2 btn-primary btn-sm float-right" href="" data-toggle="modal" data-target="#Modalsems1" data-whatever="@mdo">Tambah Nilai ekskul</a>

                                                <!-- Ini Modal Input sems 1 -->
                                                <div class="modal fade" id="Modalsems1" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Tambah nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form action="/wk/nilai_ekskul/data_detil/insert">
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control" id="nisn1" name="nisn1" value="<?php echo $nisn; ?>" readonly="readonly">

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama Ekskul</label>
                                                                        <select name="idEksulS1" id="idEksulS1" class="form-control" required>
                                                                            <?php foreach ($listEkskul1->getResultArray()  as $listEkskul) : ?>
                                                                                <option value="<?= $listEkskul['ID_EKSUL']; ?>"><?= $listEkskul['NAMA_EKSUL']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nilai Ekskul</label>
                                                                        <input class="form-control" id="niEksulS1" name="niEksulS1"></input>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Keterangan Ekskul</label>
                                                                        <textarea class="form-control" id="ketEksulS1" name="ketEksulS1"></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="card-text">Nilai ekstrakuliler siswa semester 1.</p>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Siswa</th>
                                                    <th>Nama Ekskul</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($NilaiEkskul1->getResultArray() as $i) :  ?>
                                                    <tr>
                                                        <td><?= $i['NAMA_LENGKAP']; ?></td>
                                                        <td><?= $i['NAMA_EKSUL']; ?></td>
                                                        <td><?= $i['NILAI_EKSUL']; ?></td>
                                                        <td><?= $i['KETERANGAN_EKSUL']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">

                                                                    <button class="dropdown-item btn-editEksS1 btn-sm" data-smts="<?php echo $smt1; ?>" data-nisns="<?= $i['NISN']; ?>" data-idekskuls="<?= $i['ID_EKSUL']; ?>" data-nekskuls="<?= $i['NAMA_EKSUL']; ?>" data-nsiswas="<?= $i['NAMA_LENGKAP']; ?>" data-nilais="<?= $i['NILAI_EKSUL']; ?>" data-kets="<?= $i['KETERANGAN_EKSUL']; ?>" data-toggle="modal" data-target="#eksulS1lUpdate" href="#">Edit</button>

                                                                    <button class="dropdown-item btn-deleteEksS1" data-toggle="modal" data-target="#eksulS1lDelete" data-smts="<?php echo $smt1; ?>" data-nisns="<?= $i['NISN']; ?>" data-idekskuls="<?= $i['ID_EKSUL']; ?>" href="">Hapus</button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                <!-- Ini Modal delete ekskul sems 1-->
                                                <div class="modal fade" id="eksulS1lDelete" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Hapus Nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/wk/nilai_ekskul/data_detil/delete">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control nisn1" id="nisn1" name="nisn1" readonly='readonly'>
                                                                        <input type="hidden" class="form-control smt1" id="smt1" name="smt1" readonly='readonly'>
                                                                        <input type="hidden" class="form-control idEkskulS1" id="idEkskulS1" name="idEkskulS1" readonly='readonly'>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Ini Modal Update ekskul sems 1-->
                                                <div class="modal fade" id="eksulS1lUpdate" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Edit Nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/wk/nilai_ekskul/data_detil/update">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control nisn1" id="nisn1" name="nisn1" readonly='readonly'>
                                                                        <input type="hidden" class="form-control smt1" id="smt1" name="smt1" readonly='readonly'>
                                                                        <input type="hidden" class="form-control idEkskulS1" id="idEkskulS1" name="idEkskulS1" readonly='readonly'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama siswa</label>
                                                                        <input type="text" class="form-control nSiswaS1" id="nSiswaS1" name="nSiswaS1" readonly='readonly'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama Ekskul</label>
                                                                        <select name="nmIdEkskulS1" id="nmIdEkskulS1" class="form-control">
                                                                            <?php foreach ($listEkskul1->getResultArray()  as $listEkskul) : ?>
                                                                                <option value="<?= $listEkskul['ID_EKSUL']; ?>"><?= $listEkskul['NAMA_EKSUL']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nilai</label>
                                                                        <input class="form-control niEkskulS1" id="niEkskulS1" name="niEkskulS1"></input>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Keterangan ekskul</label>
                                                                        <input class="form-control ketEkskulS1" id="ketEkskulS1" name="ketEkskulS1"></input>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->

                            <!-- table MataPelajaran-->
                            <div class="col-md-6 my-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Semester 2</h5>
                                            </div>
                                            <div class="col">
                                                <a class="btn mb-2 btn-primary btn-sm float-right" href="" data-toggle="modal" data-target="#Modalsems2" data-whatever="@mdo">Tambah Nilai ekskul</a>

                                                <!-- Ini Modal Input sems 2 -->
                                                <div class="modal fade" id="Modalsems2" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Edit nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form action="/wk/nilai_ekskul/data_detil/insert">
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control" id="nisn1" name="nisn1" value="<?php echo $nisn; ?>" readonly="readonly">

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama Ekskul</label>
                                                                        <select name="idEksulS2" id="idEksulS2" class="form-control" required>
                                                                            <?php foreach ($listEkskul1->getResultArray()  as $listEkskul) : ?>
                                                                                <option value="<?= $listEkskul['ID_EKSUL']; ?>"><?= $listEkskul['NAMA_EKSUL']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nilai Ekskul</label>
                                                                        <input class="form-control" id="niEksulS2" name="niEksulS2"></input>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Keterangan Ekskul</label>
                                                                        <textarea class="form-control" id="ketEksulS2" name="ketEksulS2"></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="card-text">Nilai ekstrakuliler siswa semester 2</p>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Siswa</th>
                                                    <th>Nama Ekskul</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($NilaiEkskul2->getResultArray() as $i) :  ?>
                                                    <tr>
                                                        <td><?= $i['NAMA_LENGKAP']; ?></td>
                                                        <td><?= $i['NAMA_EKSUL']; ?></td>
                                                        <td><?= $i['NILAI_EKSUL']; ?></td>
                                                        <td><?= $i['KETERANGAN_EKSUL']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                                    <button class="dropdown-item btn-editEksS2 btn-sm" data-smtss="<?php echo $smt2; ?>" data-idekskulss="<?= $i['ID_EKSUL']; ?>" data-nisnss="<?= $i['NISN']; ?>" data-nekskulss="<?= $i['NAMA_EKSUL']; ?>" data-nsiswass="<?= $i['NAMA_LENGKAP']; ?>" data-nilaiss="<?= $i['NILAI_EKSUL']; ?>" data-ketss="<?= $i['KETERANGAN_EKSUL']; ?>" data-toggle="modal" data-target="#eksulS2lUpdate" href="#">Edit</button>

                                                                    <button class="dropdown-item btn-deleteEksS2" data-toggle="modal" data-target="#eksulS2lDelete" data-smtss="<?php echo $smt2; ?>" data-nisnss="<?= $i['NISN']; ?>" data-idekskulss="<?= $i['ID_EKSUL']; ?>" href="">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                <!-- Ini Modal delete ekskul sems 2-->
                                                <div class="modal fade" id="eksulS2lDelete" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Hapus Nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/wk/nilai_ekskul/data_detil/delete">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control nisn1" id="nisn1" name="nisn1" readonly='readonly'>
                                                                        <input type="hidden" class="form-control smt2" id="smt2" name="smt2" readonly='readonly'>
                                                                        <input type="hidden" class="form-control idEkskulS2" id="idEkskulS2" name="idEkskulS2" readonly='readonly'>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Ini Modal Update sems 2-->
                                                <div class="modal fade" id="eksulS2lUpdate" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Edit Nilai ekskul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/wk/nilai_ekskul/data_detil/update">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control nisn2" id="nisn2" name="nisn2" readonly='readonly'>
                                                                        <input type="hidden" class="form-control smt2" id="smt2" name="smt2" readonly='readonly'>
                                                                        <input type="hidden" class="form-control idEkskulS2" id="idEkskulS2" name="idEkskulS2" readonly='readonly'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama siswa</label>
                                                                        <input type="text" class="form-control nSiswaS2" id="nSiswaS2" name="nSiswaS2" readonly='readonly'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Nama Ekskul</label>
                                                                        <select name="nmIdEkskulS2" id="nmIdEkskulS2" class="form-control">
                                                                            <?php foreach ($listEkskul1->getResultArray()  as $listEkskul) : ?>
                                                                                <option value="<?= $listEkskul['ID_EKSUL']; ?>"><?= $listEkskul['NAMA_EKSUL']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <!-- <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nama ekskul</label>
                                                                        <input class="form-control nmEkskulS2" id="nmEkskulS2" name="nmEkskulS2"></input>
                                                                    </div> -->

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nilai</label>
                                                                        <input class="form-control niEkskulS2" id="niEkskulS2" name="niEkskulS2"></input>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Keterangan ekskul</label>
                                                                        <input class="form-control ketEkskulS2" id="ketEkskulS2" name="ketEkskulS2"></input>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->

                        </div> <!-- end section -->

                    </div> <!-- .col-12 -->
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

    <script>
        $(document).ready(function() {
            //get Edit Product
            $('.btn-editEksS1').on('click', function() {
                // get data from button edit
                const jsmts = $(this).data('smts');
                const jnisn = $(this).data('nisns');
                const jidekskul = $(this).data('idekskuls');
                const jnekskul = $(this).data('nekskuls');
                const jnsiswa = $(this).data('nsiswas');
                const jnilai = $(this).data('nilais');
                const jket = $(this).data('kets');

                // Set data to Form Edit
                $('.smt1').val(jsmts);
                $('.nisn1').val(jnisn);
                $('.idEkskulS1').val(jidekskul);
                $('.nSiswaS1').val(jnsiswa);
                $('.nmEkskulS1').val(jnekskul);
                $('.ketEkskulS1').val(jket);
                $('.niEkskulS1').val(jnilai).trigger('change');

                // Call Modal Edit
                $('#JabatanModelUpdate').modal('show');
            });

            $('.btn-deleteEksS1').on('click', function() {
                // get data from button edit
                const jsmts = $(this).data('smts');
                const jnisn = $(this).data('nisns');
                const jidekskul = $(this).data('idekskuls');
                // const jnekskul = $(this).data('nekskuls');
                // const jnsiswa = $(this).data('nsiswas');
                // const jnilai = $(this).data('nilais');
                // const jket = $(this).data('kets');

                // Set data to Form Edit
                $('.smt1').val(jsmts);
                $('.nisn1').val(jnisn);
                $('.idEkskulS1').val(jidekskul).trigger('change');
                // $('.nSiswaS1').val(jnsiswa);
                // $('.nmEkskulS1').val(jnekskul);
                // $('.ketEkskulS1').val(jket);
                // $('.niEkskulS1').val(jnilai).trigger('change');

                // Call Modal Edit
                $('#JabatanModelUpdate').modal('show');
            });

            $('.btn-deleteEksS2').on('click', function() {
                // get data from button edit
                const jsmts = $(this).data('smtss');
                const jnisn = $(this).data('nisnss');
                const jidekskul = $(this).data('idekskulss');
                // const jnekskul = $(this).data('nekskuls');
                // const jnsiswa = $(this).data('nsiswas');
                // const jnilai = $(this).data('nilais');
                // const jket = $(this).data('kets');

                // Set data to Form Edit
                $('.smt2').val(jsmts);
                $('.nisn1').val(jnisn);
                $('.idEkskulS2').val(jidekskul).trigger('change');
                // $('.nSiswaS1').val(jnsiswa);
                // $('.nmEkskulS1').val(jnekskul);
                // $('.ketEkskulS1').val(jket);
                // $('.niEkskulS1').val(jnilai).trigger('change');

                // Call Modal Edit
                $('#JabatanModelUpdate').modal('show');
            });

            //get Edit Product
            $('.btn-editEksS2').on('click', function() {
                // get data from button edit
                const jsmts = $(this).data('smtss');
                const jnisn = $(this).data('nisnss');
                const jidekskul = $(this).data('idekskulss');
                const jnsiswa = $(this).data('nsiswass');
                const jnekskul = $(this).data('nekskulss');
                const jnilai = $(this).data('nilaiss');
                const jket = $(this).data('ketss');

                // Set data to Form Edit
                $('.smt2').val(jsmts);
                $('.nisn2').val(jnisn);
                $('.idEkskulS2').val(jidekskul);
                $('.nSiswaS2').val(jnsiswa);
                $('.nmEkskulS2').val(jnekskul);
                $('.niEkskulS2').val(jnilai);
                $('.ketEkskulS2').val(jket).trigger('change');

                // $('#MapelModelUpdate').modal('show');
            });

            //get Edit Product
            $('.btn-editEkskul').on('click', function() {
                // get data from button edit
                const v1 = $(this).data('ideksul');
                const v2 = $(this).data('nmeksul');
                const v3 = $(this).data('nmpembina');
                const v4 = $(this).data('deseksul');
                const v5 = $(this).data('jadwaleksul');
                // Set data to Form Edit
                $('.txtIdEksulU').val(v1);
                $('.txtIdNamaEksulU').val(v2);
                $('.txtNamaPembinaEksulU').val(v3);
                $('.txtDeskripsiEksulU').val(v4);
                $('.txtJadwalEksulU').val(v5).trigger('change');
                // Call Modal Edit
                $('#EkskulModelUpdate').modal('show');
            });

            // get Delete Product
            // $('.btn-delete').on('click', function() {
            //     // get data from button edit
            //     const idb = $(this).data('id');
            //     // Set data to Form Edit
            //     $('.barang_id').val(idb);
            //     // Call Modal Edit
            //     $('#deleteModal').modal('show');
            // });
        });


        // $("#menu-toggle").click(function(e) {
        //     e.preventDefault();
        //     $("#wrapper").toggleClass("toggled");
        // });
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