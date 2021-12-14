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
                                    <div class="card-body aku">
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
                                        <?php endforeach; ?>


                                    </div>
                                </div>
                            </div>


                        </div>


                        <!-- Menu Siswa -->
                        <div class="navbarku233">


                            <?= $this->include('Admin/Detail_Siswa/Menu_Detail'); ?>
                        </div>



                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <!-- Tabs -->
                                                <h5 class="card-title">Nilai Siswa Semester <?= $idSemesterPilih; ?> </h5>
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <!-- <button type="button" class="btn mb-2 btn-secondary btn-sm ml-5"  onclick="window.print()"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</button> -->
                                                    <a type="button" href="/adm/cetak/CetakNIlai/<?= $idNISN; ?>/<?= $idSemesterPilih; ?>" class="btn mb-2 btn-secondary btn-sm ml-5"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered table-hover">
                                                    <thead class="thead-dark">
                                                        <tr class="d-flex">
                                                            <th class="col-1">No.</th>
                                                            <th class="col-6">Mata Pelajaran</th>
                                                            <th class="col">Tugas</th>
                                                            <th class="col">UTS</th>
                                                            <th class="col">UAS</th>
                                                            <th class="col">Nilai Akhir</th>
                                                            <th class="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($datanilai2->getResultArray()  as $datanilai) : ?>
                                                            <tr class="d-flex">
                                                                <td class="col-sm-1"><?= $i++; ?></td>
                                                                <td class="col-sm-6"><?= $datanilai['NAMA_MAPEL'];  ?> </td>
                                                                <td class="col"><?= $datanilai['TUGAS']; ?></td>
                                                                <td class="col"><?= $datanilai['UTS']; ?></td>
                                                                <td class="col"><?= $datanilai['UAS']; ?></td>
                                                                <td class="col"><?= ($datanilai['TUGAS'] * 0.5) + ($datanilai['UTS'] * 0.25) + ($datanilai['UAS'] * 0.25) ?></td>

                                                                <td class="col"><button type="button" data-nmmapel="<?= $datanilai['NAMA_MAPEL']; ?>" data-idmapel="<?= $datanilai['ID_DETAIL_MAPEL']; ?>" data-tugas="<?= $datanilai['TUGAS']; ?>" data-uts="<?= $datanilai['UTS']; ?>" data-uas="<?= $datanilai['UAS']; ?>" data-nisn="<?= $datanilai['NISN']; ?>" data-idsemester="<?= $datanilai['ID_SEMESTER']; ?>" class="btn btn-secondary btn-sm btn_ubah_nilai">Ubah</button></td>
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
            <!-- Large modal -->


            <!-- Modal -->
            <div class="modal fade" id="ModalUbahNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Nilai Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/C_ADMIN/Updt_Nilai">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="txtnmmapel">Mata Pelajaran</label>
                                    <input type="text" class="form-control txtnmmapel" id="txtnmmapel" name="txtnmmapel" readonly>
                                </div>
                                <hr>
                                <h5><u>Tugas Harian</u></h5>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Tugas Harian 1</label>
                                        <input type="number" class="form-control tgs1" id="tgs1" name="tgs1" min="0" max="100" value=0>
                                        <input type="hidden" class="form-control jumlah" id="jumlah" name="jumlah" value='1'>
                                        <div class="sini" id="sini"></div>
                                        <br>
                                        <center>
                                            <button type="button" id="idname" onclick="fun()" class="btn btn-secondary">Tambah</button>
                                        </center>
                                    </div>
                                </div>

                                <Hr>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Tugas</label>
                                        <input type="text" class="form-control txttugas" id="txttugas" name="txttugas" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">UTS </label>
                                        <input type="text" class="form-control txtuts" id="txtuts" name="txtuts" <?php echo $StatusUTS ==  '1' ? ' ' : ''; ?>>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">UAS </label>
                                        <input type="text" class="form-control txtuas" id="txtuas" name="txtuas" <?php echo $StatusUAS ==  '1' ? ' ' : ''; ?>>
                                        <input type="hidden" class="form-control txtsmt" id="txtsmt" name="txtsmt" value="<?= $idSemesterPilih; ?>">
                                        <input type="hidden" class="form-control txtnisn" id="txtnisn" name="txtnisn" value="<?= $idNISN; ?>">
                                        <input type="hidden" class="form-control txtidmapel" id="txtidmapel" name="txtidmapel">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
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

    <script>
        $('#dokumen').ready(function() {
            // get Delete Product
            $('.btn_ubah_nilai').on('click', function() {
                // get data from button edit
                const nmmapel = $(this).data('nmmapel');
                const idmapel = $(this).data('idmapel');
                const tugas = $(this).data('tugas');
                const uts = $(this).data('uts');
                const uas = $(this).data('uas');
                // Set data to Form Edit
                $('.txtnmmapel').val(nmmapel);
                $('.txttugas').val(tugas);
                $('.txtuts').val(uts);
                $('.txtuas').val(uas);
                $('.txtidmapel').val(idmapel);
                // Call Modal Edit
                $('#ModalUbahNilai').modal('show');
            });
        });
    </script>


    <script>
        function fun() {
            var i = document.getElementById("jumlah").value;
            if (i > 8) {
                alert("Maximal jumlah tugas harian hanya 9");
            } else {
                i++;
                var no = document.getElementById("idname").value;
                var newlabel = document.createElement("Label");
                newlabel.innerHTML = "Tugas Harian " + i;
                newlabel.className = "mt-1";
                document.getElementById('sini').appendChild(newlabel);
                var textfield = document.createElement("input");
                textfield.type = "number";
                textfield.value = "0";
                textfield.max = "100";
                textfield.min = "0";
                textfield.name = "tgs" + i;
                textfield.className = "form-control";
                document.getElementById('sini').appendChild(textfield);
                $('.jumlah').val(i);
            }

        }
    </script>
</body>

</html>