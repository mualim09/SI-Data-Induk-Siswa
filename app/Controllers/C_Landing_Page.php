<?php

namespace App\Controllers;

class C_Landing_Page extends BaseController
{

	//-------------------------Index = Hal.1--------------------------
	public function index()
	{
		$data = [
			'title' => 'Beranda | SDN Sidoketo'
		];
		echo view('/Landing_Page/Layout/Header', $data);
		echo view('/Landing_Page/V_Index.php');
		echo view('/Landing_Page/Layout/Footer.php');
	}
	//-------------------------Index = Hal.1--------------------------
	public function Berita()
	{
		$data = [
			'title' => 'Berita | SDN Sidoketo'
		];
		echo view('/Landing_Page/Layout/Header', $data);
		echo view('/Landing_Page/V_Berita.php');
		echo view('/Landing_Page/Layout/Footer.php');
	}

	// -------------------------About = Hal.2--------------------------
	public function About()
	{
		$PengaturanModel = new \App\Models\BerkasModel();
		// $Q_Pengaturan = $PengaturanModel->query("Select * from pengaturan;");
		// $Q_Konten_1 = $PengaturanModel->query("Select * from konten_about where Id_Konten_3 = 'Konten_1';");
		// $Q_Konten_2 = $PengaturanModel->query("Select * from konten_about where Id_Konten_3 = 'Konten_2';");
		// $Q_Konten_2 = $PengaturanModel->query("Select * from konten_about where Id_Konten_3 = 'Konten_2';");

		$data = [
			'title' => 'Tentang Sekolah | SDN Sidoketo',
			// 'Q_Pengaturan' => $Q_Pengaturan,
			// 'Q_Konten_1' => $Q_Konten_1,
			// 'Q_Konten_2' => $Q_Konten_2
			// 'Q_Konten_1' => $Q_Konten_3
		];
		echo view('/Landing_Page/Layout/Header', $data);
		echo view('/Landing_Page/V_About.php');
		echo view('/Landing_Page/Layout/Footer.php');
	}

	//-------------------------Login = Hal.3--------------------------
	public function Login()
	{
		$data = [
			'title' => 'Login | SDN Sidoketo'
		];
		echo view('/Landing_Page/Layout/Header', $data);
		echo view('/Landing_Page/V_Login.php');
	}

	//-------------------------Logick Login = No view--------------------------
	public function Logic_Login()
	{
		$ID_USER = $this->request->getVar('ID_USER');
		$PW_USER = $this->request->getVar('PW_USER');


		$KaryawanModel = new \App\Models\Sub_KelasModel();
		$DataUser = $KaryawanModel->query("
		SELECT count(kry.ID_KARYAWAN) as 'Jumlah_Kry',kry.ID_JABATAN,NAMA_KRY,sk.ID_SUB_KLS,jb.NAMA_JABATAN
		from karyawan kry
		join detail_karyawan dk
		on kry.NIK = dk.NIK
		JOIN sub_kelas sk
		on sk.ID_KARYAWAN = kry.ID_KARYAWAN
		join jabatan jb
		on jb.ID_JABATAN = kry.ID_JABATAN
		where kry.ID_KARYAWAN = '$ID_USER' and  kry.PASSWORD_KARYAWAN like '$PW_USER' COLLATE utf8_bin");
		foreach ($DataUser->getResultArray() as $DataUser) {
			// Pengecekan Jabatan
			// Admin
			if (strcmp($DataUser['ID_JABATAN'], 'JB_001') == 0) {

				session()->set('ID_USER', $ID_USER);
				session()->set('ID_JABATAN', $DataUser['ID_JABATAN']);
				session()->setFlashdata('pesan_Welcome', "Selamat Datang .");

				return redirect()->to('/adm');
			} elseif (strcmp($DataUser['ID_JABATAN'], 'JB_002') == 0) {
				echo "kepala sekolah";
			} elseif (strcmp($DataUser['ID_JABATAN'], 'JB_003') == 0) {
				session()->set('ID_KRY', $ID_USER);
				session()->set('NM_KRY', $DataUser['NAMA_KRY']);
				session()->set('ID_JABATAN', $DataUser['ID_JABATAN']);
				session()->set('NM_JAB', $DataUser['NAMA_JABATAN']);
				session()->set('ID_SUB_KLS', $DataUser['ID_SUB_KLS']);
				$this->SetSesionWK($DataUser['ID_SUB_KLS']);

				return redirect()->to('/wk/dashboard');
			} elseif (strcmp($DataUser['ID_JABATAN'], 'JB_004') == 0) {
				echo "non wali kelas";
			} else {
				session()->setFlashdata('pesan_gagal', 'ID atau Password yang anda masukan salah.');
				return redirect()->to('/Login');
			}
		}
	}


	public function SetSesionWK($id_Sub)
	{
		$KaryawanModel = new \App\Models\Sub_KelasModel();
		$DataSeson = $KaryawanModel->query("
		select KLS.ID_KELAS,KLS.NAMA_KELAS,SMT.ID_SEMESTER,SK.ID_SUB_KLS
		from sub_kelas SK
		JOIN KELAS KLS
		ON SK.ID_KELAS = KLS.ID_KELAS
		JOIN semester SMT
		ON SMT.ID_KELAS = KLS.ID_KELAS
		WHERE SK.ID_SUB_KLS = '$id_Sub'
		");

		foreach ($DataSeson->getResultArray() as $DataSeson) {
		}
		if ($DataSeson['NAMA_KELAS'] == 1) {
			session()->set('SMT_1', 1);
			session()->set('SMT_2', 2);
		} else if ($DataSeson['NAMA_KELAS'] == 2) {
			session()->set('SMT_1', 3);
			session()->set('SMT_2', 4);
		} else if ($DataSeson['NAMA_KELAS'] == 3) {
			session()->set('SMT_1', 5);
			session()->set('SMT_2', 6);
		} else if ($DataSeson['NAMA_KELAS'] == 4) {
			session()->set('SMT_1', 7);
			session()->set('SMT_2', 8);
		} else if ($DataSeson['NAMA_KELAS'] == 5) {
			session()->set('SMT_1', 9);
			session()->set('SMT_2', 10);
		} else if ($DataSeson['NAMA_KELAS'] == 6) {
			session()->set('SMT_1', 11);
			session()->set('SMT_2', 12);
		}

		session()->set('ID_KLS', $DataSeson['ID_KELAS']);
		session()->set('NM_KLS', $DataSeson['NAMA_KELAS']);





		// session()->set('ID_USER', $ID_USER);
		// session()->set('ID_JABATAN', $Cek_Kry1['ID_JABATAN']);
		// session()->setFlashdata('pesan_Welcome', "Selamat Datang .");
	}

	//-------------------------Logick Login = No view--------------------------
	public function Logout()
	{
		session()->destroy();
		return redirect()->to('/Login');
	}
}
