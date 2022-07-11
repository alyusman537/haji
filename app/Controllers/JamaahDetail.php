<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Controllers\BaseController;
use App\Models\ModelJamaah;

class Jamaah extends BaseController
{
    protected $helpers = ['form'];

    private $limit = 25;
    private function getOffset($page)
    {
        $offset = ($page -1) * $this->limit;
        return $offset;
    }
    public function index()
    {
        return view('view_jamaah');
    }
    public function getJamaahAktif($kolom, $urut, $page = 1)
    {
        $mj = new ModelJamaah();
        $jamaah = $mj->getJamaahAktif($kolom, $urut, $this->limit, $this->getOffset($page));
        $jmlJamaah = $mj->countAllResults();
        $halamanSekarang = (int) $page;
        $jmlHalaman = ceil($jmlJamaah / $this->limit);
        $data = [
            'jmlHalaman' => $jmlHalaman,
            'halamanSekarang' => $halamanSekarang,
            'jmlJamaah' => $jmlJamaah,
            'jamaah' => $jamaah
        ];
        return json_encode($data);
    }
    public function getJamaahNonaktif($kolom, $urut, $page = 1)
    {
        $mj = new ModelJamaah();
        $jamaah = $mj->getJamaahNonaktif($kolom, $urut, $this->limit, $this->getOffset($page));
        $jmlJamaah = (int) $mj->getJumlahJamaahNonaktif();
        $halamanSekarang = (int) $page;
        $jmlHalaman = ceil($jmlJamaah / $this->limit);

        $data = [
            'jmlHalaman' => $jmlHalaman,
            'halamanSekarang' => $halamanSekarang,
            'jmlJamaah' => $jmlJamaah,
            'jamaah' => $jamaah
        ];
        return json_encode($data);
    }
    public function getJamaahById($id)
    {
        $mj = new ModelJamaah();
        $data = $mj->find($id);
        return json_encode($data);
    }
    public function insertJamaah()
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $nomorSertifikat = $json->nomorSertifikat;
        //$cek = $mj->getWhere(['nomorSertifikat'=> $nomorSertifikat])->getResult();
        //if($cek) return json_encode(['pesan' => 'Nomor sertifikat sudah terpakai', 'status' => 400]);
        $data = [
            'nomorSertifikat' => $nomorSertifikat,
            'tanggalDaftar' => $json->tanggalDaftar,
            'kantor' => $json->kantor,
            'nama' => $json->nama,
            'tempatLahir' => $json->tempatLahir,
            'tanggalLahir' => $json->tanggalLahir,
            'alamat' => $json->alamat,
            'telepon' => $json->telepon,
            'linkFoto' => $json->linkFoto,
            'rekeningBmt' => $json->rekeningBmt,
            'rekeningBank' => $json->rekeningBank,
            'keterangan' => $json->keterangan,
            'tanggalPembatalan' => NULL,
            'keteranganPembatalan' => NULL,
            'status' => 'Aktif'
            /*
            nomorSertifikat: this.add.nomorSertifikat,
                tanggalDaftar: this.add.tanggalDaftar,
                kantor: this.add.kantor,
                nama: this.add.nama,
                tempatLahir: this.add.tempatLahir,
                tanggalLahir: this.add.tanggalLahir,
                alamat: this.add.alamat,
                telepon: this.add.telepon,
                linkFoto: this.add.linkFoto,
                rekeningBmt: this.add.rekeningBmt,
                rekeningBank: this.add.rekeningBank,
                keterangan: this.add.keterangan
                */
        ];
        $insert = $mj->insert($data);
        if(!$insert) return json_encode(['pesan' => 'Gagal simpan Data', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
    public function getBaseUrl()
    {
        return json_encode(['ini base urlnya: ' => base_url()]);
    }
    public function do_upload1() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 2500;
        $config['max_height']           = 1400;
    
        $this->load->library('upload', $config);
    
        if ( ! $this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $success = array('success' => "http://localhost:8080/jamaah/uploads/".$file_name);
            echo json_encode($success);
        }
    }
    public function do_upload()
    {
       $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,1024]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        /*if (! $this->validate($validationRule)) {
            $data = ['errors 1' => $this->validator->getErrors()];

            return json_encode($data);
        } */

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $img->move("./uploads/gambar");
            $filepath = WRITEPATH . 'uploads/foto' . $img->store();

            $data = ['uploaded_flleinfo' => new File($filepath)];

            return json_encode(['pesan sukses' => $data]);
        }
        $data = ['errors' => 'The file has already been moved.'];

        return json_encode(['pesan ketiga' => $data]);
    }
    public function updateJamaah($id)
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $data = [
            'keteranganPembatalan' => $json->keteranganPembatalan,
            'status' => 'Non Aktif'
        ];
        $mj->where('id', $id);
        $mj->delete();

        $update = $mj->set($data);
        $update->where('id', $id);
        $update->update($data);
        if(!$update) return json_encode(['pesan' => 'Gagal diperbarui', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
    public function setNonaktif($id)
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $data = [
            'tanggalDaftar' => $json->tanggalDaftar,
            'kantor' => $json->kantor,
            'nama' => $json->nama,
            'tempatLahir' => $json->tempatLahir,
            'tanggalLahir' => $json->tanggalLahir,
            'alamat' => $json->alamat,
            'telepon' => $json->telepon,
            'linkFoto' => $json->linkFoto,
            'rekeningBmt' => $json->rekeningBmt,
            'rekeningBank' => $json->rekeningBank,
            'keterangan' => $json->keterangan
        ];
        $mj->set($data);
        $mj->where('id', $id);
        $update = $mj->update($data);
        if(!$update) return json_encode(['pesan' => 'Gagal diperbarui', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
}
