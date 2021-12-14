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
            font-family: "Helvetica";
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

        .bold {
            font-weight: bold;
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

        /* tr, */
        /* table,
        td,
        .col,
        .row  */
        .foto {

            border: 1px solid black;

        }

        .captionfoto {
            font-size: 12px;
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

<body onclick="window.print()">

    <div class="container btnset">
        <br>


    </div>
    <br>
    <div class="container">
        <center>
            <p class="judul-ujian"><u>LEMBAR BUKU INDUK</u></p>
        </center>
        <div class="row">
            <div class="col">
                <div class="row bold">NOMOR INDUK SISWA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : <?= $NISN; ?></div>
                <div class="row bold">NOMOR INDUK SISWA NASIONAL : <?= $NIS; ?></div>
                <div class="row bold">NOMOR KODE SEKOLAH &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ........................</div>
            </div>
            <!-- Kanan -->
            <div class="col">
                <div class="row bold">NOMOR KODE KECAMATAN : ........................</div>
                <div class="row bold">NOMOR KODE KAB / KODE &nbsp;&nbsp;: ........................</div>
                <div class="row bold">NOMOR KODE PROPINSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ........................</div>
            </div>
            <!-- Kanan -->
            <div class="col-2">
                <div class="row" style="border: 1px solid black; margin-top: -63px; text-align: center;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Urut
                </div>
                <div class="row" style="border: 1px solid black;"><br></div>
            </div>
        </div><br>
        <H6><b>KETERAGAN SISWA</b></H6>
        <!-- 1.Nama Siswa -->
        <div class="row">
            <div class="col">
                <b>1. Nama Siswa</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Lengkap </div>
                    <div class="col"> : <?= $NAMA_LENGKAP; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Panggilan </div>
                    <div class="col"> : <?= $NAMA_PANGGILAN; ?></div>
                </div>
                <!-- 2 -->
                <div class="row">
                    <div class="col-4 "><b>2. Jenis Kelamin </b></div>
                    <div class="col ml-3"> : <?php echo $JENIS_KELAMIN ==  'Perempuan' ? '<s>Laki - Laki</s> / Perempuan' : 'Laki - Laki / <s>Perempuan</s>'; ?></div>
                </div>
                <!-- 3 -->
                <b>3. Kelahiran</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Tanggal </div>
                    <div class="col"> : <?= $TANGGAL_LAHIR; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Tempat </div>
                    <div class="col"> : <?= $TEMPAT_LAHIR; ?></div>
                </div>
                <!-- 4 -->
                <div class="row">
                    <div class="col-4 "><b>4. Agama </b></div>
                    <div class="col ml-3"> : <?= $AGAMA; ?></div>
                </div>
                <!-- 5 -->
                <div class="row">
                    <div class="col-4 "><b>5. Kewarganegaraan </b></div>
                    <div class="col ml-3"> : <?php echo $KEWARGANEGARAAN ==  'WNI' ? 'WNI / <s>WNI Keturunan*</s>' : '<s>WNI</s> / WNI Keturunan*'; ?> </div>
                </div>
                <!-- 6 -->
                <div class="row">
                    <div class="col-4 "><b>6. Jumlah Saudara </b></div>
                    <div class="col ml-3"> : <?= $JUMLAH_SAUDARA; ?></div>
                </div>
                <!-- 7 -->
                <div class="row">
                    <div class="col-4 "><b>7. Bahasa Sehari-hari di rumah </b></div>
                    <div class="col ml-3"> : <?= $BAHASA; ?></div>
                </div>
                <!-- 8 -->
                <div class="row">
                    <div class="col-4 "><b>8. Golongan Darah </b></div>
                    <div class="col ml-3"> : <?= $GOLONGAN_DARAH; ?></div>
                </div>
                <!-- 9 -->
                <div class="row">
                    <div class="col-4 "><b>9.Tanggal diterima/Masuk </b></div>
                    <div class="col ml-3"> : <?= $TANGGAL_MASUK; ?></div>
                </div>
                <!-- 10 -->
                <div class="row">
                    <div class="col-4 "><b>10. Alamat dan Nomor Telepon </b></div>

                    <div class="col ml-3">
                        : <?= $ALAMAT_SISWA; ?><br>
                        &nbsp; <b>Telepon : </b><?= $NO_TELP; ?>
                    </div>
                </div>
                <!-- 11 -->
                <div class="row">
                    <div class="col-4 "><b>11. Bertempat Tinggal Pada</b></div>
                    <div class="col ml-3"> : <?= $JENIS_TEMPAT_TINGGAL; ?></div>
                </div>
                <!-- 12 -->
                <div class="row">
                    <div class="col-4 "><b>12. Jarak Ke Sekolah </b></div>
                    <div class="col ml-3"> : <?= $JARAL_SEKOLAH; ?></div>
                </div>
                <!-- 13 -->
                <div class="row">
                    <div class="col-12 "><b>13. <span style="text-align: justify;" class="">Penempatan pas photo 3x4 agar tidak bertumpuk pada satu sudut, diisi sesuai dengan nomor urut: Nomor urut.1 pas &nbsp; &nbsp; &nbsp; photo ditempel pada kotak (1). Nomor 2 pada kotak nomor (2). Dan seterusnya kembali seperti semula. Setiap siswa &nbsp; &nbsp; &nbsp; &nbsp; membubuhi tanda tangan dibawah pas photonya, stempel sekolah, ketika masuk dan meninggalkan sekolah. </span></b></div>
                </div>
                <H6 class="mt-3"><b>KETERAGAN ORANG TUA/WALI MURID</b></H6>
                <!-- 14 -->
                <b>14.Nama Orang Tua Kandung</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Ayah </div>
                    <div class="col"> : <?= $NAMA_AYAH; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Ibu </div>
                    <div class="col"> : <?= $NAMA_IBU; ?></div>
                </div>
                <!-- 15 -->
                <b>15. Pendidikan Tinggi</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Ayah </div>
                    <div class="col"> : <?= $PENDIDIKAN_AYAH; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Ibu </div>
                    <div class="col"> : <?= $PENDIDIKAN_IBU; ?></div>
                </div>
                <!-- 16 -->
                <b>16. Pekerjaan</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Ayah </div>
                    <div class="col"> : <?= $PEKERJAAN_AYAH; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Ibu </div>
                    <div class="col"> : <?= $PEKERJAAN_IBU; ?></div>
                </div>
                <!-- 17 -->
                <b>17. Wali Murid</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a. Nama </div>
                    <div class="col"> : <?= $NAMA_WALIMURID; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">b. Hubungkan Keluarga </div>
                    <div class="col"> : <?= $HUBUNGAN_KELUARGA_WALIMURID; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">c. Pendidikan Tinggi </div>
                    <div class="col"> : <?= $PENDIDIKAN_WALIMURID; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">d. Pekerjaan </div>
                    <div class="col"> : <?= $PEKERJAAN_WALIMURID; ?></div>
                </div>
                <H6 class="mt-3"><b>PERKEMBANGAN MURID</b></H6>
                <b>18.Pendidikan Sebelumnya</b><br>
                <div class="row">
                    <div class="col-4 ml-3">a.Masuk Menjadi Murid Baru Tingkat 1 </div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">1) Asal Murid </div>
                    <div class="col " style="margin-left: -6px;"> : <?= $ASAL_MURID; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">2) Nama Taman Kanak-Kanak </div>
                    <div class="col " style="margin-left: -6px;"> : <?= $NAMA_TK; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">3) Tanggal dan Nomor STTB</div>
                    <div class="col " style="margin-left: -6px;"> : <?= $NOMOR_STTB; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-3">B.Pindahan Dari Sekolah Lain </div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">1) Nama Sekolah Asal </div>
                    <div class="col " style="margin-left: -6px;"> : <?= $ASAL_SEKOLAH; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">2) Dari TInggkat </div>
                    <div class="col " style="margin-left: -6px;"> : <?= $TINGKAT_KELAS; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 ml-4">3) Diterima Tanggal</div>
                    <div class="col " style="margin-left: -6px;"> : <?= $TGL_PENERIMAAN; ?></div>
                </div>





                <!-- End Kiri -->
            </div>




            <!-- Foto -->
            <div class="col-2 " style="margin-top: -120px;">
                <div class="row">
                    <center>
                        <img src="/assets/image/FotoSiswa/18390100003.jpg" alt="" style="width: 70%; border:1px solid black;">
                        <p class="captionfoto">Cap tiga jari Tangan kiri Mengenai pas photo bagian bawah Waktu Meninggalkan Tanda tangan Siswa</p>
                        <p class="captionfoto">(......................)</p>
                    </center>
                </div>
                <div class="row">
                    <center>
                        <img src="/assets/image/FotoSiswa/18390100003.jpg" alt="" style="width: 70%; border:1px solid black;">
                        <p class="captionfoto">Cap tiga jari Tangan kiri Mengenai pas photo bagian bawah Waktu Meninggalkan Tanda tangan Siswa</p>
                        <p class="captionfoto">(......................)</p>
                    </center>
                </div>
                <div class="row">
                    <center>
                        <img src="/assets/image/FotoSiswa/18390100003.jpg" alt="" style="width: 70%; border:1px solid black;">
                        <p class="captionfoto">Cap tiga jari Tangan kiri Mengenai pas photo bagian bawah Waktu Meninggalkan Tanda tangan Siswa</p>
                        <p class="captionfoto">(......................)</p>
                    </center>
                </div>
                <div class="row">
                    <center>
                        <img src="/assets/image/FotoSiswa/18390100003.jpg" alt="" style="width: 70%; border:1px solid black;">
                        <p class="captionfoto">Cap tiga jari Tangan kiri Mengenai pas photo bagian bawah Waktu Meninggalkan Tanda tangan Siswa</p>
                        <p class="captionfoto">(......................)</p>
                    </center>
                </div>
                <div class="row">
                    <center>
                        <img src="/assets/image/FotoSiswa/18390100003.jpg" alt="" style="width: 70%; border:1px solid black;">
                        <p class="captionfoto">Cap tiga jari Tangan kiri Mengenai pas photo bagian bawah Waktu Meninggalkan Tanda tangan Siswa</p>
                        <p class="captionfoto">(......................)</p>
                    </center>
                </div>
            </div>
        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>