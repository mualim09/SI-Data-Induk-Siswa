<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/feather.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            /* font: 12pt "Tahoma"; */
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            font-family: "Times New Roman", Times, serif;
        }

        /* .container {
            border: 1px solid black;
        } */

        .judul-ujian {
            font-size: 40px;
        }

        .atribut_ujian1 {
            margin-left: 20px;
            font-weight: bold;
            padding-top: 0px;
        }

        .atribut_ujian2 {
            margin-left: 20px;
            font-weight: bold;
            padding-top: 10px;
            padding-bottom: 0px;
        }

        .atribut_identitas {

            /* border: 1px solid black; */
            padding: 6px;
            border-top: 4px solid black;
            border-bottom: 4px solid black;
            /* height: 3px; */
            /* Set the hr color */
            /* color: #333; */
            /* old IE */
            /* background-color: #333; */
            /* Modern Browsers */
            margin-bottom: 20px;
        }

        @media print {
            @page {
                /* size: auto; */
                margin: 0mm;
            }

            .btnset {
                display: none;
            }

            #debug-icon-link {
                display: none;
            }

        }
    </style>
</head>

<body>
    <div class="container btnset">
        <br>
        <button type="button" class="btn mb-2 btn-secondary btn-sm ml-1" onclick="window.print()"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</button>
        <button type="button" class="btn mb-2 btn-primary btn-sm ml-1 " onclick="window.history.back()">Kembali</button>

    </div>
    <br>
    <div class="container">
        <center>
            <p class="judul-ujian">Laporan Nilai Siswa</p>
        </center>
        <?php foreach ($dataSiswa->getResultArray()  as $dataSiswa) : ?>
            <div class="row atribut_identitas">
                <div class="col-5">
                    <div class="row">
                        <div class="atribut_ujian1">Nama : <?= $dataSiswa['NAMA_LENGKAP'];  ?></div>
                    </div>
                    <div class="row">
                        <div class="atribut_ujian2">Kelas &nbsp;: <?= $dataSiswa['NAMA_SUB_KELAS'];  ?></div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="atribut_ujian1">Wali Kelas &nbsp; : <?= $dataSiswa['NAMA_KRY'];  ?></div>
                    </div>
                    <div class="row">
                        <div class="atribut_ujian2">Semester &nbsp; &nbsp;&nbsp; : <?= $idSemester;  ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Petunjuk -->
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <!-- Soal -->


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>