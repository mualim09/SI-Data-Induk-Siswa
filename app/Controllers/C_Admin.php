<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use CodeIgniter\Validation\Rules;
use CodeIgniter\Validation\Validation;

class C_Admin extends BaseController
{
   public function Dashboard()
   {

      $model = new \App\Models\Sub_KelasModel();
      // Siswa
      $JumSiswa = $model->query("SELECT count(NISN) 'JumSiswa' from Siswa;");
      $JumGuru = $model->query("SELECT count(ID_KARYAWAN) 'JumGuru' from karyawan where ID_JABATAN  = 'JB_003';");
      $JumKls = $model->query("SELECT count(ID_SUB_KLS) 'JumKls' from sub_kelas;");
      $JumlahSiswa1 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_001' GROUP by kl.NAMA_KELAS;");
      $JumlahSiswa2 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_002' GROUP by kl.NAMA_KELAS;");
      $JumlahSiswa3 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_003' GROUP by kl.NAMA_KELAS;");
      $JumlahSiswa4 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_004' GROUP by kl.NAMA_KELAS;");
      $JumlahSiswa5 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_005' GROUP by kl.NAMA_KELAS;");
      $JumlahSiswa6 = $model->query("SELECT count(NISN) 'JumlahSiswaz' from siswa sw right  join sub_kelas sk on sw.ID_SUB_KLS = sk.ID_SUB_KLS left join kelas kl on sk.ID_KELAS = kl.ID_KELAS where sk.ID_KELAS = 'KLS_006' GROUP by kl.NAMA_KELAS;");

      $Jumall = $model->query("
      SELECT NAMA_KELAS,count(ID_SUB_KLS) 'Jumall'
      from sub_kelas sk
      left join kelas kl
      on sk.ID_KELAS = kl.ID_KELAS
      group by sk.ID_KELAS;");

      foreach ($JumSiswa->getResultArray() as $JumSiswa) {
      }
      foreach ($JumGuru->getResultArray() as $JumGuru) {
      }
      foreach ($JumKls->getResultArray() as $JumKls) {
      }
      foreach ($JumlahSiswa1->getResultArray() as $JumlahSiswa1) {
      }
      foreach ($JumlahSiswa2->getResultArray() as $JumlahSiswa2) {
      }
      foreach ($JumlahSiswa3->getResultArray() as $JumlahSiswa3) {
      }
      foreach ($JumlahSiswa4->getResultArray() as $JumlahSiswa4) {
      }
      foreach ($JumlahSiswa5->getResultArray() as $JumlahSiswa5) {
      }
      foreach ($JumlahSiswa6->getResultArray() as $JumlahSiswa6) {
      }



      $data = [
         'title' => 'Dashboard Admin | SDN Sidoketo',
         'JumSiswa' => $JumSiswa['JumSiswa'],
         'JumGuru' => $JumGuru['JumGuru'],
         'JumKls' => $JumKls['JumKls'],
         'JumKelas1' => $JumlahSiswa1['JumlahSiswaz'],
         'JumKelas2' => $JumlahSiswa2['JumlahSiswaz'],
         'JumKelas3' => $JumlahSiswa3['JumlahSiswaz'],
         'JumKelas4' => $JumlahSiswa4['JumlahSiswaz'],
         'JumKelas5' => $JumlahSiswa5['JumlahSiswaz'],
         'JumKelas6' => $JumlahSiswa6['JumlahSiswaz'],
         'Jumall' => $Jumall

      ];
      return view('Admin/v_Dashboard', $data);
   }
   //--------------------------------------------------------------------

   public function indexku()
   {
      $data = [
         'validation' => \Config\Services::validation()

      ];
      return view('Admin/v_upload', $data);
   }

   public function store()
   {
      $gambar = $this->request->getFile('gambar');

      if (!$this->validate([
         // 'Txtnik' => 'required|is_unique[detail_karyawan.nik]'

         'gambar' => [
            'rules' => [
               'max_size[gambar,1024]',
               'uploaded[gambar]',
               'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
               'is_image[gambar]'
            ],
            'errors' => [
               'uploaded' => 'pilih file foto terlebih dahulu',
               'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
               'is_image' => 'hanya bisa upload file format gambar 1',
               'mime_in' => 'hanya bisa upload file format gambar 2'
            ]
         ]
      ])) {

         // $validation = \Config\Services::validation();
         // return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
         return redirect()->to('/adm')->withInput();
      }
      dd($this->request->getVar(), $this->request->getFile('gambar'));
   }

   public function karyawan2($idJbt)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();

      $DataJbt = $Sub_KelasModel->query("select * from jabatan");

      if ($idJbt == 'all') {
         $DataKry = $Sub_KelasModel->query("
			select kry.ID_KARYAWAN,kry.nik,dk.NAMA_KRY,jbt.NAMA_JABATAN,dk.JK_KRY,dk.TELP_KRY,DATE_FORMAT(dk.TANGGAL_LAHIR_KRY ,'%d-%m-%Y') 'Tgl_Lahir',dk.ALAMAT_KRY,dk.EMAIL_KRY
			from karyawan kry
			join detail_karyawan dk
			on kry.nik = dk.nik
			join jabatan jbt
			on jbt.ID_JABATAN = kry.ID_JABATAN;");
      } else {
         $DataKry = $Sub_KelasModel->query("
		select kry.ID_KARYAWAN,kry.nik,dk.NAMA_KRY,jbt.NAMA_JABATAN,dk.JK_KRY,dk.TELP_KRY,DATE_FORMAT(dk.TANGGAL_LAHIR_KRY ,'%d-%m-%Y') 'Tgl_Lahir',dk.ALAMAT_KRY,dk.EMAIL_KRY
		from karyawan kry
		join detail_karyawan dk
		on kry.nik = dk.nik
		join jabatan jbt
		on jbt.ID_JABATAN = kry.ID_JABATAN
		where kry.ID_JABATAN = '$idJbt';");
      }

      $data = [
         'title' => 'Data Karyawan| SDN Sidoketo',
         'DataKry' => $DataKry,
         'DataJbt' => $DataJbt,
         'KlikId' => $idJbt

      ];
      return view('Admin/v_Karyawan', $data);
   }

   public function addKry($id_Jabatan)
   {
      // Admin
      if ($id_Jabatan == 'wk') {
      }
      // Admin
      else if ($id_Jabatan == 'JB81868') {
      }


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();

      $data = [
         'title' => 'Daftar Karyawan Baru| SDN Sidoketo',
         'validation' => \Config\Services::validation(),
         'id_Jabatan' => $id_Jabatan
      ];
      return view('Admin/v_AddKry', $data);
   }

   public function saveKry()
   {
      if (!$this->validate([
         'Txtnik' => [
            'rules' => 'required|is_unique[detail_karyawan.nik]',
            'errors' => [
               'required' => 'Kolom NIK Harus Di isi.',
               'is_unique' => 'Data NIK sudah ada / terdaftar.'
            ]
         ],
         'fotokry' => [
            'rules' => [
               'max_size[fotokry,1024]',
               'uploaded[fotokry]',
               'is_image[fotokry]'

            ],
            'errors' => [
               'uploaded' => 'pilih file foto terlebih dahulu',
               'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
               'is_image' => 'hanya bisa upload file format gambar'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
         return redirect()->to('/adm/kry/add/$id_Jabatan')->withInput();
      }


      $Txtnik = $this->request->getVar('Txtnik');
      $TxtNip = $this->request->getVar('TxtNip');
      $txtNamaLengkap  = $this->request->getVar('txtNamaLengkap');
      $txtAlamat = $this->request->getVar('txtAlamat');
      $txtJK = $this->request->getVar('txtJK');
      $txtNoTelp = $this->request->getVar('txtNoTelp');
      $txtAgama = $this->request->getVar('txtAgama');
      $txtEmail = $this->request->getVar('txtEmail');
      $txtTempatLahir = $this->request->getVar('txtTempatLahir');
      $txtTglLahir = $this->request->getVar('txtTglLahir');
      $txtPendidikanTerakir = $this->request->getVar('txtPendidikanTerakir');

      $txtIdJab = $this->request->getVar('txtIdJab');


      $fotokry = $this->request->getFile('fotokry');
      $fotokry->move('assets/image/FotoKry', "$Txtnik.jpg");



      $txtIdKry = $this->request->getVar('txtIdKry');
      $txtPwKry = $this->request->getVar('txtPwKry');

      // INSERT INTO karyawan (ID_KARYAWAN, ID_JABATAN, NIK, STATUS_KARYAWAN, PASSWORD_KARYAWAN) VALUES ('', NULL, NULL, NULL, NULL);
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();

      // insert Detail Karyawan
      $Sub_KelasModel->query("INSERT INTO detail_karyawan(NIK, NIP, NAMA_KRY, ALAMAT_KRY, JK_KRY, TELP_KRY, AGAMA_KRY, EMAIL_KRY, TEMPAT_LAHIR_KRY, TANGGAL_LAHIR_KRY, PENDIDIKAN_TERAKIR, FOTO_KRY) 
      VALUES ('$Txtnik','$TxtNip','$txtNamaLengkap','$txtAlamat','$txtJK','$txtNoTelp','$txtAgama','$txtEmail','$txtTempatLahir','$txtTglLahir','$txtPendidikanTerakir','$Txtnik.jpg');
      ");



      $Sub_KelasModel->query(" INSERT INTO karyawan (ID_KARYAWAN, ID_JABATAN, NIK, STATUS_KARYAWAN, PASSWORD_KARYAWAN) VALUES ('$txtIdKry','$txtIdJab','$Txtnik','Aktif','$txtPwKry');
      ");



      session()->setFlashdata('pesan_insert', 'Karyawan Baru Berhasil Ditambhakan.');
      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo'

      ];
      return redirect()->to('/adm/kry/all');
   }

   public function detailKry($Nik)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Q_DKaryawan = $Sub_KelasModel->query("
      select * 
      from karyawan kry 
      join detail_karyawan dk
      on kry.NIK = dk.NIK
      where ID_KARYAWAN = '$Nik';
		");


      $data = [
         'title' => 'Daftar Karyawan Baru| SDN Sidoketo',
         'Q_DKaryawan' => $Q_DKaryawan,
         'Q_DKaryawan2' => $Q_DKaryawan,
         'Nik' => $Nik

      ];
      return view('Admin/v_Detail_Kry', $data);
   }

   public function UpdtKry()
   {
      // dd($this->request->getVar());
      $TxtNip = $this->request->getVar('TxtNip');
      $txtNamaLengkap = $this->request->getVar('txtNamaLengkap');
      $txtJK = $this->request->getVar('txtJK');
      $txtAlamat = $this->request->getVar('txtAlamat');
      $Txtnik = $this->request->getVar('Txtnik');
      $txtAgama  = $this->request->getVar('txtAgama');
      $txtTempatLahir = $this->request->getVar('txtTempatLahir');
      $txtTglLahir = $this->request->getVar('txtTglLahir');
      $txtEmail = $this->request->getVar('txtEmail');
      $txtNoTelp = $this->request->getVar('txtNoTelp');
      $txtPendidikanTerakir = $this->request->getVar('txtPendidikanTerakir');
      $txtIdKry = $this->request->getVar('txtIdKry');
      $txtPwKry = $this->request->getVar('txtPwKry');
      $txtIdJab = $this->request->getVar('txtIdJab');
      $FOTO_KRY = $this->request->getVar('FOTO_KRY');


      if (!$this->validate([
         'fotokry' => [
            'rules' => [
               'max_size[fotokry,3024]',
               'is_image[fotokry]'

            ],
            'errors' => [
               'uploaded' => 'pilih file foto terlebih dahulu',
               'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
               'is_image' => 'hanya bisa upload file format gambar'
            ]
         ]
      ])) {
         $validation = \Config\Services::validation();
         // return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
         return redirect()->to("/adm/kry/detail/$txtIdKry")->withInput();
      }

      if ($this->request->getFile('fotokry') == "") {
      } else {
         if ($FOTO_KRY == 'default.jpg') {
            $fotokry = $this->request->getFile('fotokry');
            $fotokry->move('assets/image/FotoKry', "$Txtnik.jpg");
            $FOTO_KRY = "$Txtnik.jpg";
         } else {
            unlink('assets/image/FotoKry/' . $FOTO_KRY);
            $fotokry = $this->request->getFile('fotokry');
            $fotokry->move('assets/image/FotoKry', "$FOTO_KRY");
         }
      }


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      // $Sub_KelasModel->Quer   y
      dd("
      UPDATE detail_karyawan SET NAMA_KRY='$txtNamaLengkap',ALAMAT_KRY='$txtAlamat',JK_KRY='$txtJK',TELP_KRY='$txtNoTelp',AGAMA_KRY='$txtAgama',EMAIL_KRY='$txtEmail',TEMPAT_LAHIR_KRY='$txtTempatLahir',TANGGAL_LAHIR_KRY='$txtTglLahir',PENDIDIKAN_TERAKIR='$txtPendidikanTerakir',FOTO_KRY='$FOTO_KRY' WHERE NIK='$Txtnik'
      ");

      $Sub_KelasModel->Query("
      UPDATE karyawan SET ID_JABATAN='$txtIdJab',PASSWORD_KARYAWAN='$txtPwKry' WHERE ID_KARYAWAN='$txtIdKry'
      ");

      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo',
         // 'idNISN' => $idNISN,
         // 'DataSiswa' => $DataSiswa,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         // 'dataDiri' => $this->setDataDiri($idNISN)
      ];
      session()->setFlashdata('pesan_insert', 'Data Karyawan Berhasil Dirubah.');

      return redirect()->to("/adm/kry/detail/$txtIdKry");
   }

   public function HapusKry()
   {



      session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
      return redirect()->to("/adm/kry/all");
   }



   // --------------NILAI----------------------------------------------------
   public function Nilai($id_semester, $IdMapel = 'MP22518')
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataSemester = $Sub_KelasModel->query("SELECT * FROM semester where ID_SEMESTER = '$id_semester'");

      foreach ($DataSemester->getResultArray() as $DataSemester) {
      }

      $idKelas = $DataSemester['ID_KELAS'];
      $DataPaketAjar = $Sub_KelasModel->query("SELECT * 
      FROM paket_ajar PA
      JOIN detail_mapel DM
      ON PA.ID_DETAIL_MAPEL = DM.ID_DETAIL_MAPEL
      WHERE PA.ID_KELAS = '$idKelas'");

      $DataNilai = $Sub_KelasModel->query("SELECT N.NISN,S.NAMA_LENGKAP,DM.NAMA_MAPEL,N.TUGAS,N.UTS,N.UAS,SK.NAMA_SUB_KELAS
      FROM NILAI N
      JOIN siswa S
      ON S.NISN = N.NISN 
      JOIN detail_mapel DM
      ON DM.ID_DETAIL_MAPEL = N.ID_DETAIL_MAPEL
      JOIN sub_kelas SK
      ON SK.ID_SUB_KLS = S.ID_SUB_KLS
      JOIN kelas KLS
      ON KLS.ID_KELAS = SK.ID_KELAS
      WHERE N.ID_SEMESTER = '$id_semester' AND DM.ID_DETAIL_MAPEL = '$IdMapel' AND KLS.ID_KELAS ='$idKelas'
      ");


      foreach ($DataNilai->getResultArray() as $DataNilai2) {
      }


      $data = [
         'title' => 'Data Karyawan| SDN Sidoketo',
         'DataSemester' => $this->setSemseter(),
         'id_semester' => $id_semester,
         'idKelas' => $idKelas,
         'DataNilai2' => $DataNilai2['NAMA_MAPEL'],
         'DataNilai' => $DataNilai,
         'DataPaketAjar' => $DataPaketAjar,

      ];
      return view('Admin/v_DataNilaiInduk', $data);
   }

   //--------------------------------------------------------------------

   public function SiswaDanKelas()
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Q_Sub_KelasModel = $Sub_KelasModel->query("
		SELECT kls.NAMA_KELAS 'Nama Kelas',sk.NAMA_SUB_KELAS 'Nama Sub kelas', CASE WHEN dk.NAMA_KRY  IS NULL THEN 'Kelas tidak Memiliki Guru Wali' ELSE dk.NAMA_KRY END 'Nama Wali kelas',sk.ID_SUB_KLS FROM sub_kelas sk left JOIN karyawan kry on sk.ID_KARYAWAN = kry.ID_KARYAWAN join kelas kls on kls.ID_KELAS = sk.ID_KELAS left join detail_karyawan dk on kry.nik = dk.nik ORDER BY ID_SUB_KLS ASC;
		");

      $DataKry = $Sub_KelasModel->query("
		SELECT dk.NAMA_KRY,kry.ID_KARYAWAN,jbt.NAMA_JABATAN
		FROM sub_kelas sk
		RIGHT JOIN karyawan kry
		on sk.ID_KARYAWAN = kry.ID_KARYAWAN
		join detail_karyawan dk
		on kry.nik = dk.nik
		join jabatan jbt
		on kry.ID_JABATAN = jbt.ID_JABATAN
		where sk.ID_KARYAWAN IS NULL and kry.ID_JABATAN = 'JB_003';
		");
      $DataKls = $Sub_KelasModel->query("SELECT * FROM kelas;");



      $data = [
         'title' => 'Siswa Dan Kelas | SDN Sidoketo',
         'Q_Sub_KelasModel' => $Q_Sub_KelasModel,
         'DataKry' => $DataKry,
         'DataKls' => $DataKls
      ];
      return view('Admin/v_SiswaDanKelas', $data);
   }

   public function SaveKelas()
   {

      $txtIdKry = $this->request->getVar('txtIdKry');
      $txtIdKelas = $this->request->getVar('txtIdKelas');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataKlsTerakir = $Sub_KelasModel->query("
		SELECT MAX(ID_SUB_KLS)'idSubKelas',MAX(NAMA_SUB_KELAS)'namaSubKelas' from kelas
		join sub_kelas 
		on kelas.ID_KELAS = sub_kelas.ID_KELAS
		where kelas.ID_KELAS = '$txtIdKelas'
		");

      foreach ($DataKlsTerakir->getResultArray() as $DataKlsTerakir) {
      }
      $idSub = $DataKlsTerakir['idSubKelas'];
      $nmSub = $DataKlsTerakir['namaSubKelas'];
      $idSub++;
      $nmSub++;

      $Sub_KelasModel->query("INSERT INTO sub_kelas (ID_SUB_KLS, ID_KARYAWAN,ID_KELAS, NAMA_SUB_KELAS) VALUES ('$idSub', '$txtIdKry','$txtIdKelas', '$nmSub');");
      session()->setFlashdata('pesan_insert', 'Jabatan Baru Berhasil Ditambhakan.');
      return redirect()->to('/adm/snk');
   }

   public function DetailKelas($id_Sub)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataKelas = $Sub_KelasModel->query("
		select sk.NAMA_SUB_KELAS,sk.ID_SUB_KLS,NAMA_KRY,count(sis.NISN)'jml_siswa'
		from sub_kelas sk
		join karyawan kry
		on kry.ID_KARYAWAN = sk.ID_KARYAWAN
		join detail_karyawan dk
		on dk.nik = kry.nik
		join siswa sis
		on sis.ID_SUB_KLS = sk.ID_SUB_KLS
		where sk.ID_SUB_KLS = '$id_Sub'
		");


      $DataKry = $Sub_KelasModel->query("
		SELECT dk.NAMA_KRY,kry.ID_KARYAWAN,jbt.NAMA_JABATAN
		FROM sub_kelas sk
		RIGHT JOIN karyawan kry
		on sk.ID_KARYAWAN = kry.ID_KARYAWAN
		join detail_karyawan dk
		on kry.nik = dk.nik
		join jabatan jbt
		on kry.ID_JABATAN = jbt.ID_JABATAN
		where sk.ID_KARYAWAN IS NULL and kry.ID_JABATAN = 'JB_003';
		");
      $JumLaki = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'jkLaki'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Laki - laki'
		");

      $JumPer = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'JumPer'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Perempuan'
		");

      $DataSiswa = $Sub_KelasModel->query("Select * from siswa where ID_SUB_KLS = '$id_Sub';");



      foreach ($dataKelas->getResultArray() as $dataKelas1) {
      }
      foreach ($JumPer->getResultArray() as $JumPer) {
      }
      foreach ($JumLaki->getResultArray() as $JumLaki) {
      }

      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo',
         'Nama_Kelas' => $dataKelas1['NAMA_SUB_KELAS'],
         'jml_siswa' => $dataKelas1['jml_siswa'],
         'nm_wali' => $dataKelas1['NAMA_KRY'],
         'JumLaki' => $JumLaki['jkLaki'],
         'JumPer' => $JumPer['JumPer'],
         'DataSiswa' => $DataSiswa,
         'id_Sub' => $id_Sub,
         'DataKry' => $DataKry,
         'dataMapel' => $this->setMenu()
      ];

      return view('Admin/v_DataKelas', $data);
   }

   public function updtKelas()
   {
      // dd($this->request->getVar());

      $txtIdKry = $this->request->getVar('txtIdKry');
      $txtIdSub = $this->request->getVar('txtIdSub');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Sub_KelasModel->query("UPDATE sub_kelas SET ID_KARYAWAN = '$txtIdKry' WHERE ID_SUB_KLS = '$txtIdSub';");

      session()->setFlashdata('pesan_insert', 'Data Kelas Berhasil Di Rubah.');
      return redirect()->to("/adm/snk/$txtIdSub");
   }

   public function delKelas($id_sub)
   {
      // dd($this->request->getVar());


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $jumlahSiswa =  $Sub_KelasModel->query("SELECT COUNT(NISN) 'JumSis' FROM SISWA WHERE ID_SUB_KLS = '$id_sub';");
      foreach ($jumlahSiswa->getResultArray() as $jumlahSiswa) {
      }
      if ($jumlahSiswa['JumSis'] > 0) {
         $jumsiswa = $jumlahSiswa['JumSis'];
         session()->setFlashdata('pesan_hapus', "Keas Tidak Dapat di hapus, masih ada $jumsiswa siswa yang terdaftar di kelas ini ");
         return redirect()->to("/adm/snk/$id_sub");
      } else {
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $Sub_KelasModel->query("DELETE FROM sub_kelas WHERE ID_SUB_KLS = '$id_sub';");
         session()->setFlashdata('pesan_hapus', 'Kelas Berhasil Dihapus.');
         return redirect()->to("/adm/snk");
      }
      // session()->setFlashdata('pesan_insert', 'Data Kelas Berhasil Di Rubah.');
      // return redirect()->to("/adm/snk/$txtIdSub");
   }

   public function DataMapel($id_Sub, $idMapel, $smst, $aktiv)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataKelas = $Sub_KelasModel->query("
		select sk.NAMA_SUB_KELAS,sk.ID_SUB_KLS,NAMA_KRY,count(sis.NISN)'jml_siswa'
		from sub_kelas sk
		join karyawan kry
		on kry.ID_KARYAWAN = sk.ID_KARYAWAN
		join detail_karyawan dk
		on dk.nik = kry.nik
		join siswa sis
		on sis.ID_SUB_KLS = sk.ID_SUB_KLS
		where sk.ID_SUB_KLS = '$id_Sub'
		");

      $JumLaki = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'jkLaki'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Laki - laki'
		");

      $JumPer = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'JumPer'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Perempuan'
		");

      $DataSiswa = $Sub_KelasModel->query("Select * from siswa where ID_SUB_KLS = '$id_Sub';");

      $NilaiMapel = $Sub_KelasModel->query("SELECT S.NIS, N.NISN, S.NAMA_LENGKAP, S.ID_SUB_KLS, N.TUGAS, N.UTS, N.UAS 
		FROM NILAI N 
		JOIN SISWA S  
		ON N.NISN = S.NISN 
		WHERE ID_SEMESTER = '$smst' and N.ID_DETAIL_MAPEL = '$idMapel' and S.ID_SUB_KLS = '$id_Sub'");

      foreach ($dataKelas->getResultArray() as $dataKelas1) {
      }
      foreach ($JumPer->getResultArray() as $JumPer) {
      }
      foreach ($JumLaki->getResultArray() as $JumLaki) {
      }

      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo',
         'Nama_Kelas' => $dataKelas1['NAMA_SUB_KELAS'],
         'jml_siswa' => $dataKelas1['jml_siswa'],
         'nm_wali' => $dataKelas1['NAMA_KRY'],
         'JumLaki' => $JumLaki['jkLaki'],
         'JumPer' => $JumPer['JumPer'],
         'DataSiswa' => $DataSiswa,
         'id_Sub' => $id_Sub,
         'idmapel' => $idMapel,
         'NilaiMapel' => $NilaiMapel,
         'dataMapel' => $this->setMenu(),
         'DataSemester' => $this->setSemseter($id_Sub)
      ];

      return view('Admin/v_DataNilaiSiswa', $data);
   }


   public function addSiswa($idSub)
   {
      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo',
         'idSub' => $idSub,
         'validation' => \Config\Services::validation()
      ];
      return view('Admin/v_AddSiswa', $data);
   }

   public function HapusSiswa($nisn)
   {

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataSubkelas = $Sub_KelasModel->query("SELECT ID_SUB_KLS,FOTO_SISWA FROM siswa WHERE NISN = '$nisn'");
      $Sub_KelasModel->query("DELETE FROM siswa WHERE NISN = '$nisn'");
      foreach ($dataSubkelas->getResultArray() as $dataSubkelas) {
      }

      $ID_Subkelas = $dataSubkelas['ID_SUB_KLS'];
      $txtNamaFoto = $dataSubkelas['FOTO_SISWA'];

      if ($txtNamaFoto != 'default.jpg') {
         unlink('assets/image/FotoSiswa/' . $txtNamaFoto);
      }



      session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
      return redirect()->to("/adm/snk/$ID_Subkelas");
   }


   public function SaveSiswa()
   {
      // dd($this->request->getVar());

      $txtNisn = $this->request->getVar('txtNisn');
      $txtNamaL = $this->request->getVar('txtNamaL');
      $txtJK = $this->request->getVar('txtJK');
      $txtAgama = $this->request->getVar('txtAgama');
      $txtTempatTingal = $this->request->getVar('txtTempatTingal');
      $txtAlamat  = $this->request->getVar('txtAlamat');
      $txtNis  = $this->request->getVar('txtNis');
      $txtNamaP = $this->request->getVar('txtNamaP');
      $txtTempatLahir = $this->request->getVar('txtTempatLahir');
      $txtTglLahir = $this->request->getVar('txtTglLahir');
      $txtKewarganegaraan = $this->request->getVar('txtKewarganegaraan');
      $txtBahasa = $this->request->getVar('txtBahasa');
      $txtJumlahSaudara = $this->request->getVar('txtJumlahSaudara');
      $txtTglMasuk  = $this->request->getVar('txtTglMasuk');
      $txtJarakSekolah = $this->request->getVar('txtJarakSekolah');
      $txtNoWali = $this->request->getVar('txtNoWali');
      $txtGolDar = $this->request->getVar('txtGolDar');
      $txtSubKelas = $this->request->getVar('txtSubKelas');

      if (!$this->validate([
         'txtNis' => [
            'rules' => 'required|is_unique[siswa.NIS]',
            'errors' => [
               'required' => 'Kolom NIS Harus Di isi.',
               'is_unique' => 'Data NIS sudah ada / terdaftar.'
            ]
         ],
         'txtNisn' => [
            'rules' => 'required|is_unique[siswa.NISN]',
            'errors' => [
               'required' => 'Kolom NISN Harus Di isi.',
               'is_unique' => 'Data NISN sudah ada / terdaftar.'
            ]
         ],
         'fotoSiswa' => [
            'rules' => [
               'max_size[fotoSiswa,3024]',
               'uploaded[fotoSiswa]',
               'is_image[fotoSiswa]'

            ],
            'errors' => [
               'uploaded' => 'pilih file foto terlebih dahulu',
               'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
               'is_image' => 'hanya bisa upload file format gambar'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
         return redirect()->to("/adm/siswa/add/$txtSubKelas")->withInput();
      }


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Sub_KelasModel->Query(" INSERT INTO siswa(NISN, ID_SUB_KLS, NIS, NAMA_LENGKAP, NAMA_PANGGILAN, JENIS_KELAMIN, TANGGAL_LAHIR, TEMPAT_LAHIR, AGAMA, KEWARGANEGARAAN, JUMLAH_SAUDARA, BAHASA, GOLONGAN_DARAH, TANGGAL_MASUK, JENIS_TEMPAT_TINGGAL, JARAL_SEKOLAH, ALAMAT_SISWA, NO_TELP, STATUS_SISWA, FOTO_SISWA) VALUES ('$txtNisn','$txtSubKelas','$txtNis','$txtNamaL','$txtNamaP','$txtJK','$txtTglLahir','$txtTempatLahir','$txtAgama','$txtKewarganegaraan','$txtJumlahSaudara','$txtBahasa','$txtGolDar','$txtTglMasuk','$txtTempatTingal','$txtJarakSekolah','$txtAlamat','$txtNoWali','aktif','$txtNisn.jpg');
      ");

      $fotoSiswa = $this->request->getFile('fotoSiswa');
      $fotoSiswa->move('assets/image/FotoSiswa', "$txtNisn.jpg");

      session()->setFlashdata('pesan_insert', 'Siswa Baru Berhasil Ditambhakan.');

      return redirect()->to("/adm/snk/$txtSubKelas");
   }


   public function DetailSiswa($idNISN)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataSiswa = $Sub_KelasModel->Query("select * from siswa where nisn = '$idNISN'");
      $DataSubkelas = $Sub_KelasModel->Query("select * from sub_kelas");
      $DataOrtu = $Sub_KelasModel->Query("SELECT * FROM ortu_murid where NISN = '$idNISN'");
      $DataWali = $Sub_KelasModel->Query("SELECT * FROM wali_murid where NISN = '$idNISN'");
      $DataMuridBaru = $Sub_KelasModel->Query("SELECT * FROM murid_baru where NISN = '$idNISN'");
      $DataMuridPindahan = $Sub_KelasModel->Query("SELECT * FROM murid_pindahan where NISN = '$idNISN'");
      $tamat_belajar = $Sub_KelasModel->Query("SELECT * FROM tamat_belajar where NISN = '$idNISN'");
      $pindah_sekolah = $Sub_KelasModel->Query("SELECT * FROM pindah_sekolah where NISN = '$idNISN'");
      $keluar_sekolah = $Sub_KelasModel->Query("SELECT * FROM keluar_sekolah where NISN = '$idNISN'");

      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '1',
         'idNISN' => $idNISN,
         'DataSiswa' => $DataSiswa,
         'DataSubkelas' => $DataSubkelas,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'DataOrtu' => $DataOrtu,
         'DataWali' => $DataWali,
         'DataMuridBaru' => $DataMuridBaru,
         'tamat_belajar' => $tamat_belajar,
         'pindah_sekolah' => $pindah_sekolah,
         'keluar_sekolah' => $keluar_sekolah,
         'DataMuridPindahan' => $DataMuridPindahan,
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_DetailSiswa', $data);
   }

   public function UpdtSiswa()
   {
      // dd($this->request->getVar());
      $txtNisn = $this->request->getVar('txtNisn');
      $txtNamaL = $this->request->getVar('txtNamaL');
      $txtJK = $this->request->getVar('txtJK');
      $txtAgama = $this->request->getVar('txtAgama');
      $txtTempatTingal = $this->request->getVar('txtTempatTingal');

      $txtAlamat = $this->request->getVar('txtAlamat');
      $txtNis = $this->request->getVar('txtNis');
      $txtNamaP = $this->request->getVar('txtNamaP');
      $txtTempatLahir = $this->request->getVar('txtTempatLahir');
      $txtTglLahir  = $this->request->getVar('txtTglLahir');

      $txtKewarganegaraan = $this->request->getVar('txtKewarganegaraan');
      $txtBahasa = $this->request->getVar('txtBahasa');
      $txtJumlahSaudara = $this->request->getVar('txtJumlahSaudara');
      $txtTglMasuk = $this->request->getVar('txtTglMasuk');
      $txtJarakSekolah = $this->request->getVar('txtJarakSekolah');

      $txtNoWali = $this->request->getVar('txtNoWali');
      $txtGolDar  = $this->request->getVar('txtGolDar');
      $txtSubKelas  = $this->request->getVar('txtSubKelas');

      $txtNamaFoto = $this->request->getVar('txtNamaFoto');


      if (!$this->validate([
         'fotoSiswa' => [
            'rules' => [
               'max_size[fotoSiswa,3024]',
               'is_image[fotoSiswa]'

            ],
            'errors' => [
               'uploaded' => 'pilih file foto terlebih dahulu',
               'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
               'is_image' => 'hanya bisa upload file format gambar'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
         return redirect()->to("/adm/siswa/add/$txtSubKelas")->withInput();
      }

      if ($this->request->getFile('fotoSiswa') == "") {
      } else {
         if ($txtNamaFoto == 'default.jpg') {
            $fotoSiswa = $this->request->getFile('fotoSiswa');
            $fotoSiswa->move('assets/image/FotoSiswa', "$txtNisn.jpg");
            $txtNamaFoto = "$txtNisn.jpg";
         } else {
            unlink('assets/image/FotoSiswa/' . $txtNamaFoto);
            $fotoSiswa = $this->request->getFile('fotoSiswa');
            $fotoSiswa->move('assets/image/FotoSiswa', "$txtNamaFoto");
         }
      }


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataSiswa = $Sub_KelasModel->Query("UPDATE siswa SET NISN='$txtNisn',ID_SUB_KLS='$txtSubKelas',NIS='$txtNis',NAMA_LENGKAP='$txtNamaL',NAMA_PANGGILAN='$txtNamaP',JENIS_KELAMIN='$txtJK',TANGGAL_LAHIR='$txtTglLahir',TEMPAT_LAHIR='$txtTempatLahir',AGAMA='$txtAgama',KEWARGANEGARAAN='$txtKewarganegaraan',JUMLAH_SAUDARA='$txtJumlahSaudara',BAHASA='$txtBahasa',GOLONGAN_DARAH='$txtGolDar',TANGGAL_MASUK='$txtTglMasuk',JENIS_TEMPAT_TINGGAL='$txtTempatTingal',JARAL_SEKOLAH='$txtJarakSekolah',ALAMAT_SISWA='$txtAlamat',NO_TELP='$txtNoWali',FOTO_SISWA='$txtNamaFoto' WHERE NISN='$txtNisn';
      ");

      // Update Data Ortu
      $txtnamaayah = $this->request->getVar('txtnamaayah');
      $txtnamaibu  = $this->request->getVar('txtnamaibu');
      $txtpendidikanayah  = $this->request->getVar('txtpendidikanayah');
      $txtpendidikanibu  = $this->request->getVar('txtpendidikanibu');
      $txtpekerjaanayah  = $this->request->getVar('txtpekerjaanayah');
      $txtpekerjaanibu  = $this->request->getVar('txtpekerjaanibu');


      $Sub_KelasModel->Query("UPDATE ortu_murid SET NAMA_AYAH='$txtnamaayah',NAMA_IBU='$txtnamaibu',PENDIDIKAN_AYAH='$txtpendidikanayah',PENDIDIKAN_IBU='$txtpendidikanibu',PEKERJAAN_AYAH='$txtpekerjaanayah',PEKERJAAN_IBU='$txtpekerjaanibu' WHERE NISN='$txtNisn';");

      // Update Data Wali
      $txtNamaWali = $this->request->getVar('txtNamaWali');
      $txtPendidikanWali = $this->request->getVar('txtPendidikanWali');
      $txtHubunganWali = $this->request->getVar('txtHubunganWali');
      $txtPekerjaanWali = $this->request->getVar('txtPekerjaanWali');


      $Sub_KelasModel->Query("UPDATE wali_murid SET NAMA_WALIMURID='$txtNamaWali',HUBUNGAN_KELUARGA_WALIMURID='$txtHubunganWali',PENDIDIKAN_WALIMURID='$txtPendidikanWali',PEKERJAAN_WALIMURID='$txtPekerjaanWali' WHERE  NISN='$txtNisn';");

      // Update Data Murid Baru
      $txtAsalMurid = $this->request->getVar('txtAsalMurid');
      $txtnmTK = $this->request->getVar('txtnmTK');
      $txtsttbbaru = $this->request->getVar('txtsttbbaru');

      $Sub_KelasModel->Query("UPDATE murid_baru SET ASAL_MURID='$txtAsalMurid',NAMA_TK='$txtnmTK',NOMOR_STTB='$txtsttbbaru' WHERE NISN='$txtNisn'");

      // Update Data Murin Pidahan
      $txtsekolahasalpindah = $this->request->getVar('txtsekolahasalpindah');
      $txttinggkatpindah = $this->request->getVar('txttinggkatpindah');
      $txttglpindah = $this->request->getVar('txttglpindah');

      $Sub_KelasModel->Query("UPDATE murid_pindahan SET ASAL_SEKOLAH='$txtsekolahasalpindah',TINGKAT_KELAS='$txttinggkatpindah',TGL_PENERIMAAN='$txttglpindah' WHERE NISN='$txtNisn'");


      // Update Tamat Belajar
      $tbtahuntamat = $this->request->getVar('tbtahuntamat');
      $tbnoijazah = $this->request->getVar('tbnoijazah');
      $tblajutsekolah  = $this->request->getVar('tblajutsekolah');

      $Sub_KelasModel->Query("UPDATE tamat_belajar SET THN_TAMAT='$tbtahuntamat',NO_IJASAH_STTB='$tbnoijazah',SEKOLAH_LANJUTAN='$tblajutsekolah' WHERE NISN='$txtNisn'");

      // Update Pindah Sekolah
      $psdaritinggkat = $this->request->getVar('psdaritinggkat');
      $pskesekolah = $this->request->getVar('pskesekolah');
      $psketinggkat   = $this->request->getVar('psketinggkat');
      $pstglpindah   = $this->request->getVar('pstglpindah');

      $Sub_KelasModel->Query("UPDATE pindah_sekolah SET DARI_TINGGKAT='$psdaritinggkat',KE_SEKOLAH='$pskesekolah',KE_TINGGKAT='$psketinggkat',TGL_PINDAH_SEKOLAH='$pstglpindah' WHERE NISN='$txtNisn'");

      // Update Tamat Belajar
      $kstanggalkeluarsekolah = $this->request->getVar('kstanggalkeluarsekolah');
      $ksalasankeluar  = $this->request->getVar('ksalasankeluar');;

      $Sub_KelasModel->Query("UPDATE keluar_sekolah SET TANGGAL_KELUAR='$kstanggalkeluarsekolah',ALASAN='$ksalasankeluar' WHERE NISN='$txtNisn'");



      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '1',
         // 'idNISN' => $idNISN,
         // 'DataSiswa' => $DataSiswa,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         // 'dataDiri' => $this->setDataDiri($idNISN)
      ];
      session()->setFlashdata('pesan_insert', 'Data Siswa Berhasil Dirubah.');

      return redirect()->to("/adm/snk/detail/$txtNisn");
   }

   public function DetailSiswa_Nilai($idNISN, $idSemester)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilai = $Sub_KelasModel->Query("SELECT ID_SEMESTER,NISN,n.ID_DETAIL_MAPEL,TUGAS,UTS,UAS,NAMA_MAPEL from  nilai n join detail_mapel dm on n.ID_DETAIL_MAPEL = dm.ID_DETAIL_MAPEL where nisn = '$idNISN' and ID_SEMESTER = '$idSemester'");

      if (($idSemester == 1) || ($idSemester == 3) || ($idSemester == 5) || ($idSemester == 7) || ($idSemester == 9) || ($idSemester == 11)) {
         $StatatusUTS = $Sub_KelasModel->Query("SELECT JENIS_UJIAN,(case when ((SYSDATE() > TGL_MULAI) and (SYSDATE() < TGL_BERAKHIR)) THEN 1 ELSE 0 END) as CekUTS FROM jadwal_ujian where JENIS_SEMESTER ='GANJIL' and JENIS_UJIAN = 'UTS'");
         $StatatusUAS = $Sub_KelasModel->Query("SELECT JENIS_UJIAN,(case when ((SYSDATE() > TGL_MULAI) and (SYSDATE() < TGL_BERAKHIR)) THEN 1 ELSE 0 END) as CekUAS FROM jadwal_ujian where JENIS_SEMESTER ='GANJIL' and JENIS_UJIAN = 'UAS'");
      } else {
         $StatatusUTS = $Sub_KelasModel->Query("SELECT JENIS_UJIAN,(case when ((SYSDATE() > TGL_MULAI) and (SYSDATE() < TGL_BERAKHIR)) THEN 1 ELSE 0 END) as CekUTS FROM jadwal_ujian where JENIS_SEMESTER ='GENAP' and JENIS_UJIAN = 'UTS'");
         $StatatusUAS = $Sub_KelasModel->Query("SELECT JENIS_UJIAN,(case when ((SYSDATE() > TGL_MULAI) and (SYSDATE() < TGL_BERAKHIR)) THEN 1 ELSE 0 END) as CekUAS FROM jadwal_ujian where JENIS_SEMESTER ='GENAP' and JENIS_UJIAN = 'UAS'");
      }

      foreach ($StatatusUTS->getResultArray() as $StatatusUTS) {
      }
      foreach ($StatatusUAS->getResultArray() as $StatatusUAS) {
      }

      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '2',
         'idNISN' => $idNISN,
         'datanilai2' => $datanilai,
         'idSemesterPilih' => $idSemester,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'StatusUTS' => $StatatusUTS['CekUTS'],
         'StatusUAS' => $StatatusUAS['CekUAS'],
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_DetailSiswa_Nilai', $data);
   }

   public function Updt_Nilai()
   {
      // dd($this->request->getVar());
      $txtnmmapel = $this->request->getVar('txtnmmapel');
      $txttugas = $this->request->getVar('txttugas');
      $txtuts = $this->request->getVar('txtuts');
      $txtuas = $this->request->getVar('txtuas');
      $txtsmt = $this->request->getVar('txtsmt');
      $txtnisn = $this->request->getVar('txtnisn');
      $txtidmapel = $this->request->getVar('txtidmapel');
      $jumlah = $this->request->getVar('jumlah');

      $total = 0;
      for ($i = 1; $i <= $jumlah; $i++) {
         $name = 'tgs' . $i;
         $total = $total +  $jumlah = $this->request->getVar("$name");
      }

      $total = $total /  $this->request->getVar('jumlah');;

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();


      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilai = $Sub_KelasModel->Query("UPDATE nilai SET TUGAS='$total',UTS='$txtuts',UAS='$txtuas' WHERE  ID_SEMESTER='$txtsmt' and NISN='$txtnisn' and ID_DETAIL_MAPEL='$txtidmapel';
      ");

      session()->setFlashdata('pesan_insert', 'Nilai Berhasil Diubah.');
      return redirect()->to("/adm/snk/detailNilai/$txtnisn/$txtsmt");
   }


   public function DetailSiswa_Eksul($idNISN, $idSemester)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataEksul = $Sub_KelasModel->Query("
      select NAMA_EKSUL,eksul.ID_EKSUL,NILAI_EKSUL,KETERANGAN_EKSUL
      from nilai_ekul 
      join eksul   
      on nilai_ekul.ID_EKSUL = eksul.ID_EKSUL
      where NISN = '$idNISN' and  ID_SEMESTER = '$idSemester';");

      $EkskulList = $Sub_KelasModel->Query("SELECT ID_EKSUL,NAMA_EKSUL from eksul;");


      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '3',
         'idNISN' => $idNISN,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'DataEksul' => $DataEksul,
         'EkskulList' => $EkskulList,
         'idSemesterPilih' => $idSemester,
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_Ekskul', $data);
   }

   public function AddEksul()
   {
      $txtIDEksul = $this->request->getVar('txtIDEksul');
      $txtNilaiEksul = $this->request->getVar('txtNilaiEksul');
      $txtKeteragan = $this->request->getVar('txtKeteragan');
      $idSmster = $this->request->getVar('idSmster');
      $nisnek = $this->request->getVar('nisnek');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Sub_KelasModel->Query("INSERT INTO nilai_ekul(ID_EKSUL, ID_SEMESTER, NISN, NILAI_EKSUL, KETERANGAN_EKSUL) VALUES ('$txtIDEksul','$idSmster','$nisnek','$txtNilaiEksul','$txtKeteragan')");
      session()->setFlashdata('pesan_insert', 'Data Ekstrakurikuler Berhasil Tambahkan.');

      return redirect()->to("/adm/snk/eksul/$nisnek/$idSmster");
   }



   public function DetailSiswa_Kepribadian($idNISN)
   {

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilaikepribadian = $Sub_KelasModel->Query("select * from nilai_kepribadian where nisn = '$idNISN'");

      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '4',
         'idNISN' => $idNISN,
         'datanilaikepribadian' => $datanilaikepribadian,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_Kepribadian', $data);
   }

   public function Updt_Kepribadian()
   {
      // dd($this->request->getVar());
      $aspek = $this->request->getVar('txtnmmapel');
      $txtnilaikep = $this->request->getVar('txtnilaikep');
      $txtsemseterkep = $this->request->getVar('txtsemseterkep');
      $txtnisnkep = $this->request->getVar('txtnisnkep');
      $txtdeksripsikep = $this->request->getVar('txtdeksripsikep');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilai = $Sub_KelasModel->Query("UPDATE
       nilai_kepribadian SET ASPEK_PENILAIAN='$aspek',NILAI_KEPRIBADIAN='$txtnilaikep',DESKRIPSI='$txtdeksripsikep' WHERE NISN='$txtnisnkep' AND ID_SEMESTER='$txtsemseterkep'
      ");

      session()->setFlashdata('pesan_insert', 'Nilai Kepribadian Berhasil Diubah.');
      return redirect()->to("/adm/snk/kepribadian/$txtnisnkep");
   }

   public function DetailSiswa_absensi($idNISN)
   {

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataabsensi = $Sub_KelasModel->Query("select * from absensi where nisn = '$idNISN'");

      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '5',
         'idNISN' => $idNISN,
         'dataabsensi' => $dataabsensi,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_Absensi', $data);
   }


   public function Updt_absensi()
   {
      // dd($this->request->getVar());
      $txtsemester = $this->request->getVar('txtsemester');
      $txtgigi = $this->request->getVar('txtgigi');
      $txtbb = $this->request->getVar('txtbb');
      $txttb = $this->request->getVar('txttb');
      $txtnisn  = $this->request->getVar('txtnisn');
      $txtpendegaran  = $this->request->getVar('txtpendegaran');
      $txtpengelihatan  = $this->request->getVar('txtpengelihatan');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilai = $Sub_KelasModel->Query("UPDATE 
       kesehatan SET BERAT_BADAN='$txtbb',TINGGI_BADAN='$txttb',PENDENGARAN='$txtpendegaran',PENGELIHATAN='$txtpengelihatan',GIGI='$txtgigi' WHERE NISN='$txtnisn' and ID_SEMESTER='$txtsemester'
      ;");

      session()->setFlashdata('pesan_insert', 'Data Kesehatan Siswa Berhasil Diubah.');
      return redirect()->to("/adm/snk/keshatan/$txtnisn");
   }

   public function DetailSiswa_keshatan($idNISN)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataabsensi = $Sub_KelasModel->Query("select * from kesehatan where nisn = '$idNISN'");

      $data = [
         'title' => 'Data Siswa | SDN Sidoketo',
         'klikMenu' => '6',
         'idNISN' => $idNISN,
         'dataabsensi' => $dataabsensi,
         'validation' => \Config\Services::validation(),
         'dataMapel' => $this->setMenu(),
         'dataSemester' => $this->setSemseter(),
         'dataSemester2' => $this->setSemseter(),
         'dataDiri' => $this->setDataDiri($idNISN)
      ];
      return view('Admin/Detail_Siswa/v_Kesehatan', $data);
   }

   public function Updt_keshatan()
   {
      $txtizin = $this->request->getVar('txtizin');
      $txtsakit = $this->request->getVar('txtsakit');
      $txtalpha = $this->request->getVar('txtalpha');
      $txtsmt = $this->request->getVar('txtsmt');
      $txtnisn  = $this->request->getVar('txtnisn');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $datanilai = $Sub_KelasModel->Query("UPDATE absensi SET IZIN='$txtizin',ALPA='$txtalpha',SAKIT='$txtsakit' WHERE ID_SEMESTER='$txtsmt' AND NISN='$txtnisn'");

      session()->setFlashdata('pesan_insert', 'Absensi Berhasil Diubah.');
      return redirect()->to("/adm/snk/absensi/$txtnisn");
   }
   //--------------------------------------------------------------------

   public function Master()
   {
      // chek Login
      // if (is_null(session()->get('ID_USER')) == 1) {
      // 	return redirect()->to('/Login');
      // } elseif (session()->get('ID_JABATAN') != 'JB001') {
      // 	return redirect()->to('/Login');
      // }

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $DataJabatan = $Sub_KelasModel->query("SELECT * FROM JABATAN;");

      $DataMapel = $Sub_KelasModel->query("SELECT * from detail_mapel;");

      $DataEksul = $Sub_KelasModel->query("SELECT * from eksul;");

      $DataJadwalUjian = $Sub_KelasModel->query("SELECT ID_JADWAL,JENIS_UJIAN,JENIS_SEMESTER,TGL_MULAI,TGL_BERAKHIR,DATE_FORMAT(TGL_MULAI, '%d %M %Y') as vTGL_MULAI,DATE_FORMAT(TGL_BERAKHIR, '%d %M %Y') as vTGL_BERAKHIR FROM jadwal_ujian;");

      $data = [
         'title' => 'Siswa Dan Kelas | SDN Sidoketo',
         'DataJabatan' => $DataJabatan,
         'DataMapel' => $DataMapel,
         'DataEksul' => $DataEksul,
         'DataJadwalUjian' => $DataJadwalUjian
      ];
      return view('Admin/v_Master', $data);
   }


   public function Master_Save($tipeInset)
   {
      if ($tipeInset == 'imapel') {
         $txtIdMapel = $this->request->getVar('txtIdMapel');
         $txtNamaMapel = $this->request->getVar('txtNamaMapel');
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $Sub_KelasModel->query("INSERT INTO detail_mapel (ID_DETAIL_MAPEL, NAMA_MAPEL) VALUES ('$txtIdMapel', '$txtNamaMapel');");
         session()->setFlashdata('pesan_insert', 'Mata Pelajaran Baru Berhasil Ditambhakan.');
         return redirect()->to('/adm/master');
      } elseif ($tipeInset == 'ijab') {
         $txtIdJabatan = $this->request->getVar('txtIdJabatan');
         $txtNamaJabatan = $this->request->getVar('txtNamaJabatan');
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $Sub_KelasModel->query("INSERT INTO jabatan (ID_JABATAN, NAMA_JABATAN) VALUES ('$txtIdJabatan', '$txtNamaJabatan');");
         session()->setFlashdata('pesan_insert', 'Jabatan Baru Berhasil Ditambhakan.');
         return redirect()->to('/adm/master');
      } elseif ($tipeInset == 'ieksul') {
         $txtIdEksul = $this->request->getVar('txtIdEksul');
         $txtIdNamaEksul = $this->request->getVar('txtIdNamaEksul');
         $txtNamaPembinaEksul = $this->request->getVar('txtNamaPembinaEksul');
         $txtDeskripsiEksul = $this->request->getVar('txtDeskripsiEksul');
         $txtJadwalEksul = $this->request->getVar('txtJadwalEksul');
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $Sub_KelasModel->query("INSERT INTO eksul (ID_EKSUL, NAMA_EKSUL,NAMA_PEMBINA_EKSUL, DESKRIPSI_EKSUL, JADWAL_EKSKUL) VALUES ('$txtIdEksul', '$txtIdNamaEksul','$txtNamaPembinaEksul', '$txtDeskripsiEksul','$txtJadwalEksul');");
         session()->setFlashdata('pesan_insert', 'Data Mata pelajaran Baru Berhasil Ditambhakan.');
         return redirect()->to('/adm/master');
      }
   }

   public function Master_Update($tipeInset)
   {
      // Update Jabatan

      if ($tipeInset == 'ujab') {
         $ID_Jab = $this->request->getVar('txtIdJabU');
         $Nama_Jab = $this->request->getVar('txtNamJabU');
         $JabModel = new \App\Models\Sub_KelasModel();
         $JabModel->query("UPDATE Jabatan SET ID_JABATAN = '$ID_Jab', NAMA_JABATAN= '$Nama_Jab' WHERE ID_JABATAN = '$ID_Jab';");
         session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
         return redirect()->to("/adm/master");
      }
      // Update Mate Pelajaran
      elseif ($tipeInset == 'umapel') {
         $ID_Jab = $this->request->getVar('txtIdMapelU');
         $Nama_Jab = $this->request->getVar('txtNMMapelU');

         $JabModel = new \App\Models\Sub_KelasModel();
         $JabModel->query("UPDATE Detail_Mapel SET ID_DETAIL_MAPEL = '$ID_Jab', NAMA_MAPEL= '$Nama_Jab'
			WHERE ID_DETAIL_MAPEL = '$ID_Jab';");

         session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
         return redirect()->to("/adm/master");
      } elseif ($tipeInset == 'ueks') {
         $ideksul = $this->request->getVar('txtIdEksulU');
         $nmeksul = $this->request->getVar('txtIdNamaEksulU');
         $nmpembina = $this->request->getVar('txtNamaPembinaEksulU');
         $deseksul = $this->request->getVar('txtDeskripsiEksulU');
         $jadwaleksul = $this->request->getVar('txtJadwalEksulU');

         $JabModel = new \App\Models\Sub_KelasModel();
         $JabModel->query("UPDATE eksul SET NAMA_EKSUL= '$nmeksul',NAMA_PEMBINA_EKSUL = '$nmpembina', DESKRIPSI_EKSUL= '$deseksul',JADWAL_EKSKUL = '$jadwaleksul'
			WHERE ID_EKSUL = '$ideksul';");

         session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
         return redirect()->to("/adm/master");
      }
   }

   public function Master_Del($tipeDel, $id)
   {
      if ($tipeDel == 'dmapel') {
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $v1 = $Sub_KelasModel->query("SELECT COUNT(ID_DETAIL_MAPEL) 'Penggunaan' FROM nilai WHERE ID_DETAIL_MAPEL = '$id'");
         foreach ($v1->getResultArray() as $testPenggunaan) {
         }
         if ($testPenggunaan['Penggunaan'] > 0) {
            $DataMapel = $Sub_KelasModel->query("SELECT * from detail_mapel where ID_DETAIL_MAPEL = '$id';");
            foreach ($DataMapel->getResultArray() as $DataMapel) {
            }
            session()->setFlashdata('pesan_hapus', "Data Mata Pelajar Tidak Dapat Di Hapus, Karena Masih Ada Karyawan yang sedang mengajar Mata pelajaran ( " . $DataMapel['NAMA_MAPEL'] . ")");
            return redirect()->to("/adm/master");
         } else {
            $Sub_KelasModel = new \App\Models\Sub_KelasModel();
            $Sub_KelasModel->query("DELETE FROM detail_mapel WHERE ID_DETAIL_MAPEL = '$id';");
            session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
            return redirect()->to("/adm/master");
         }
      } else if ($tipeDel == 'djab') {
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $v1 = $Sub_KelasModel->query("SELECT COUNT(ID_JABATAN) 'Penggunaan' FROM karyawan WHERE ID_JABATAN = '$id'");
         foreach ($v1->getResultArray() as $testPenggunaan) {
         }
         if ($id == 'JB_001' or $id == 'JB_003' or $id == 'JB81868') {
            session()->setFlashdata('pesan_hapus', "Jabatan Wajib, Tidak Dapat Dihapus");
            return redirect()->to("/adm/master");
         } else if ($testPenggunaan['Penggunaan'] > 0) {
            $DataJabatan = $Sub_KelasModel->query("SELECT * from Jabatan where ID_JABATAN = '$id';");
            foreach ($DataJabatan->getResultArray() as $DataJabatan) {
            }
            session()->setFlashdata('pesan_hapus', "Data Jabatan Tidak Dapat Di Hapus, Karena Masih Ada Karyawan yang sedang terdaftar sebagai ( " . $DataJabatan['NAMA_JABATAN'] . ")");
            return redirect()->to("/adm/master");
         } else {
            $Sub_KelasModel = new \App\Models\Sub_KelasModel();
            $Sub_KelasModel->query("DELETE FROM Jabatan WHERE ID_JABATAN = '$id';");
            session()->setFlashdata('pesan_hapus', 'Data Jabatan Berhasil Dihapus.');
            return redirect()->to("/adm/master");
         }
      } else if ($tipeDel == 'deks') {
         $Sub_KelasModel = new \App\Models\Sub_KelasModel();
         $v1 = $Sub_KelasModel->query("SELECT COUNT(ID_EKSUL) 'Penggunaan' FROM nilai_ekul WHERE ID_EKSUL  = 'JB_001'");
         foreach ($v1->getResultArray() as $testPenggunaan) {
         }
         if ($testPenggunaan['Penggunaan'] > 0) {
            $DataJabatan = $Sub_KelasModel->query("SELECT * from  where ID_JABATAN = '$id';");
            foreach ($DataJabatan->getResultArray() as $DataJabatan) {
            }
            session()->setFlashdata('pesan_hapus', "Data Ekstrakurikuler Tidak Dapat Di Hapus, Karena Masih Ada Siswa yang sedang Mengikuti Ekstrakurikuler ( " . $DataJabatan['NAMA_JABATAN'] . ")");
            return redirect()->to("/adm/master");
         } else {
            $Sub_KelasModel = new \App\Models\Sub_KelasModel();
            $Sub_KelasModel->query("DELETE FROM eksul WHERE ID_EKSUL = '$id';");
            session()->setFlashdata('pesan_hapus', 'Data Ekstrakurikuler Berhasil Dihapus.');
            return redirect()->to("/adm/master");
         }
      }
   }

   public function UpdtJadwalUjian()
   {
      // dd($this->request->getVar());
      $txtidjadwal = $this->request->getVar('txtidjadwal');
      $txtawal = $this->request->getVar('txtawal');
      $txtakhir = $this->request->getVar('txtakhir');

      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $Sub_KelasModel->query("UPDATE jadwal_ujian SET TGL_MULAI='$txtawal',TGL_BERAKHIR='$txtakhir' WHERE  ID_JADWAL='$txtidjadwal';");

      $data = [
         'title' => 'Master | SDN Sidoketo'
      ];
      session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
      return redirect()->to("/adm/master");
   }

   // ------------------------------------------------------------------------






   public function setMenu()
   {
      $NilaiMapelModel = new \App\Models\NilaiMapelModel();
      $Mapel = $NilaiMapelModel->query("SELECT * FROM DETAIL_MAPEL");

      return $Mapel;
   }

   public function setDataDiri($nisn)
   {
      $NilaiMapelModel = new \App\Models\NilaiMapelModel();
      $dataSiswa = $NilaiMapelModel->query("
      select NISN,siswa.ID_SUB_KLS,NIS,NAMA_LENGKAP,NAMA_PANGGILAN,siswa.FOTO_SISWA
      from siswa
      join sub_kelas
      on siswa.ID_SUB_KLS = sub_kelas.ID_SUB_KLS
      where nisn = '$nisn';
      ");

      return $dataSiswa;
   }

   public function setSemseter()
   {
      $NilaiMapelModel = new \App\Models\NilaiMapelModel();
      $Smst = $NilaiMapelModel->query("
      SELECT * FROM semester;
      ");

      return $Smst;
   }


   public function CetakSoal($nisn = '18390100030')
   {

      $JabatanModel = new \App\Models\JabatanModel();
      $Siswa = $JabatanModel->query("SELECT * FROM siswa where NISN = '$nisn';");
      $ortu_murid = $JabatanModel->query("SELECT * FROM ortu_murid where NISN = '$nisn';");
      $wali_murid = $JabatanModel->query("SELECT * FROM wali_murid where NISN = '$nisn';");
      $murid_baru = $JabatanModel->query("SELECT * FROM murid_baru where NISN = '$nisn';");
      $murid_pindahan = $JabatanModel->query("SELECT * FROM murid_pindahan where NISN = '$nisn';");
      foreach ($Siswa->getResultArray() as $Siswa) {
      }
      foreach ($ortu_murid->getResultArray() as $ortu_murid) {
      }
      foreach ($wali_murid->getResultArray() as $wali_murid) {
      }
      foreach ($murid_baru->getResultArray() as $murid_baru) {
      }
      foreach ($murid_pindahan->getResultArray() as $murid_pindahan) {
      }

      $data = [
         'NISN' => $Siswa['NISN'],
         'ID_SUB_KLS' => $Siswa['ID_SUB_KLS'],
         'NIS' => $Siswa['NIS'],
         'NAMA_LENGKAP' => $Siswa['NAMA_LENGKAP'],
         'NAMA_PANGGILAN' => $Siswa['NAMA_PANGGILAN'],
         'JENIS_KELAMIN' => $Siswa['JENIS_KELAMIN'],
         'TANGGAL_LAHIR' => $Siswa['TANGGAL_LAHIR'],
         'TEMPAT_LAHIR' => $Siswa['TEMPAT_LAHIR'],
         'AGAMA' => $Siswa['AGAMA'],
         'KEWARGANEGARAAN' => $Siswa['KEWARGANEGARAAN'],
         'JUMLAH_SAUDARA' => $Siswa['JUMLAH_SAUDARA'],
         'BAHASA' => $Siswa['BAHASA'],
         'GOLONGAN_DARAH' => $Siswa['GOLONGAN_DARAH'],
         'TANGGAL_MASUK' => $Siswa['TANGGAL_MASUK'],
         'JENIS_TEMPAT_TINGGAL' => $Siswa['JENIS_TEMPAT_TINGGAL'],
         'JARAL_SEKOLAH' => $Siswa['JARAL_SEKOLAH'],
         'ALAMAT_SISWA' => $Siswa['ALAMAT_SISWA'],
         'NO_TELP' => $Siswa['NO_TELP'],
         'STATUS_SISWA' => $Siswa['STATUS_SISWA'],
         'FOTO_SISWA' => $Siswa['FOTO_SISWA'],
         // ortu
         'NAMA_AYAH' => $ortu_murid['NAMA_AYAH'],
         'NAMA_IBU' => $ortu_murid['NAMA_IBU'],
         'PENDIDIKAN_AYAH' => $ortu_murid['PENDIDIKAN_AYAH'],
         'PENDIDIKAN_IBU' => $ortu_murid['PENDIDIKAN_IBU'],
         'PEKERJAAN_AYAH' => $ortu_murid['PEKERJAAN_AYAH'],
         'PEKERJAAN_IBU' => $ortu_murid['PEKERJAAN_IBU'],
         // wALI
         'NAMA_WALIMURID' => $wali_murid['NAMA_WALIMURID'],
         'HUBUNGAN_KELUARGA_WALIMURID' => $wali_murid['HUBUNGAN_KELUARGA_WALIMURID'],
         'PENDIDIKAN_WALIMURID' => $wali_murid['PENDIDIKAN_WALIMURID'],
         'PEKERJAAN_WALIMURID' => $wali_murid['PEKERJAAN_WALIMURID'],
         // mURID bARU
         'ASAL_MURID' => $murid_baru['ASAL_MURID'],
         'NAMA_TK' => $murid_baru['NAMA_TK'],
         'NOMOR_STTB' => $murid_baru['NOMOR_STTB'],
         // mURID pINDAHAN
         'ASAL_SEKOLAH' => $murid_pindahan['ASAL_SEKOLAH'],
         'TINGKAT_KELAS' => $murid_pindahan['TINGKAT_KELAS'],
         'TGL_PENERIMAAN' => $murid_pindahan['TGL_PENERIMAAN'],

      ];
      return view('Admin/CetakPrint/CetakBukuInduk', $data);
   }

   public function CetakNIlai($idNISN, $idSemester)
   {
      $JabatanModel = new \App\Models\JabatanModel();
      $datanilai = $JabatanModel->Query("SELECT ID_SEMESTER,NISN,n.ID_DETAIL_MAPEL,TUGAS,UTS,UAS,NAMA_MAPEL from  nilai n join detail_mapel dm on n.ID_DETAIL_MAPEL = dm.ID_DETAIL_MAPEL where nisn = '$idNISN' and ID_SEMESTER = '$idSemester'");

      $dataSiswa = $JabatanModel->Query("SELECT NAMA_LENGKAP,sk.NAMA_SUB_KELAS,dk.NAMA_KRY,kls.NAMA_KELAS FROM siswa s
      Join sub_kelas sk
      on sk.ID_SUB_KLS = s.ID_SUB_KLS
      join karyawan kry
      on kry.ID_KARYAWAN = sk.ID_KARYAWAN
      join detail_karyawan dk
      on dk.NIK = kry.NIK
      Join kelas kls
      on kls.ID_KELAS = sk.ID_KELAS
      where NISN = '$idNISN';
      ");


      $data = [
         'datanilai2' => $datanilai,
         'dataSiswa' => $dataSiswa,
         'idSemester' => $idSemester,
      ];
      return view('Admin/CetakPrint/CetakNIlai', $data);
   }

   public function CetakDataKelas($id_Sub)
   {
      $Sub_KelasModel = new \App\Models\Sub_KelasModel();
      $dataKelas = $Sub_KelasModel->query("
		select sk.NAMA_SUB_KELAS,sk.ID_SUB_KLS,NAMA_KRY,count(sis.NISN)'jml_siswa'
		from sub_kelas sk
		join karyawan kry
		on kry.ID_KARYAWAN = sk.ID_KARYAWAN
		join detail_karyawan dk
		on dk.nik = kry.nik
		join siswa sis
		on sis.ID_SUB_KLS = sk.ID_SUB_KLS
		where sk.ID_SUB_KLS = '$id_Sub'
		");


      $DataKry = $Sub_KelasModel->query("
		SELECT dk.NAMA_KRY,kry.ID_KARYAWAN,jbt.NAMA_JABATAN
		FROM sub_kelas sk
		RIGHT JOIN karyawan kry
		on sk.ID_KARYAWAN = kry.ID_KARYAWAN
		join detail_karyawan dk
		on kry.nik = dk.nik
		join jabatan jbt
		on kry.ID_JABATAN = jbt.ID_JABATAN
		where sk.ID_KARYAWAN IS NULL and kry.ID_JABATAN = 'JB_003';
		");
      $JumLaki = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'jkLaki'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Laki - laki'
		");

      $JumPer = $Sub_KelasModel->query("select DISTINCT JENIS_KELAMIN,COUNT(JENIS_KELAMIN)'JumPer'	from siswa
		where  ID_SUB_KLS = '$id_Sub' and JENIS_KELAMIN = 'Perempuan'
		");

      $DataSiswa = $Sub_KelasModel->query("Select * from siswa where ID_SUB_KLS = '$id_Sub';");



      foreach ($dataKelas->getResultArray() as $dataKelas1) {
      }
      foreach ($JumPer->getResultArray() as $JumPer) {
      }
      foreach ($JumLaki->getResultArray() as $JumLaki) {
      }

      $data = [
         'title' => 'Data Karyawan | SDN Sidoketo',
         'Nama_Kelas' => $dataKelas1['NAMA_SUB_KELAS'],
         'jml_siswa' => $dataKelas1['jml_siswa'],
         'nm_wali' => $dataKelas1['NAMA_KRY'],
         'JumLaki' => $JumLaki['jkLaki'],
         'JumPer' => $JumPer['JumPer'],
         'DataSiswa' => $DataSiswa,
         'id_Sub' => $id_Sub,
         'DataKry' => $DataKry,
         'dataMapel' => $this->setMenu()
      ];
      return view('Admin/CetakPrint/CetakDataKelas', $data);
   }
}
