<?php

namespace App\Controllers;

use App\Models\Upload_model;
use App\Models\BerkasModel;
use App\Validation\Validation;

// use CodeIgniter\Validation\Validation;

class Upload extends BaseController
{
    public function __construct()
    {
        helper('form');
        // $this->upload = new Upload_model();
    }

    public function index()
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
            // 'TxtNip' => 'required|is_unique[detail_karyawan.NIP]'

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
            return redirect()->to('/upload')->withInput();
        }
        $gambar->move(ROOTPATH . 'public/uploads');

        $data = [
            'gambar' => $gambar->getName()
        ];

        $simpan = $this->upload->insertGambar($data);

        if ($simpan) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
        // if (!$this->validate([
        //     'berkas' => [
        //         'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png]|max_size[berkas,2048]',
        //         'errors' => [
        //             'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
        //             'uploaded' => 'Harus Ada File yang diupload',
        //             'max_size' => 'Ukuran File Maksimal 2 MB'
        //         ]

        //     ]
        // ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // }

        // $berkas = new Upload_model();
        // $dataBerkas = $this->request->getFile('berkas');
        // $fileName = $dataBerkas->getRandomName();
        // $berkas->insert([
        //     'berkas' => $fileName,
        //     // 'keterangan' => $this->request->getPost('keterangan')
        // ]);
        // $dataBerkas->move('uploads/berkas/', $fileName);
        // session()->setFlashdata('success', 'Berkas Berhasil diupload');
        // return redirect()->to(base_url('berkas'));
    }

    //--------------------------------------------------------------------

}
