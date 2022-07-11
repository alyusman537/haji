<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Controllers\BaseController;
use App\Models\ModelJamaah;

//use App\Libraries\StringTools;


class Jamaah extends BaseController
{
    function __construct() {
		require_once APPPATH . "/Libraries/StringTools.php";
	}
    //use StringTools;
    protected $helpers = ['form'];

    private $limit = 5;
    private function getOffset($page)
    {
        $offset = ($page -1) * $this->limit;
        return $offset;
    }
    public function index()
    {
        return view('view_jamaah');
    }
    
    public function getJamaah()
    {
        $json = $this->request->getJSON();
        $kolom = $json->kolom;
        $urut = $json->urut;
        $tglStart = $json->tglStart;
        $tglAkhir = $json->tglAkhir;
        $status = $json->status;
        $page = (int) $json->page;

        $mj = new ModelJamaah();
        $jamaah = $mj->getJamaah($tglStart, $tglAkhir, $status, $kolom, $urut, $this->limit, $this->getOffset($page));
        $jmlJamaah = $mj->jmlJamaah($tglStart, $tglAkhir, $status);
        $halamanSekarang = (int) $page;
        $jmlHalaman = ceil((int)$jmlJamaah / $this->limit);

        $data = [
            'jmlHalaman' => $jmlHalaman,
            'halamanSekarang' => $halamanSekarang,
            'jmlJamaah' => $jmlJamaah,
            'jamaah' => $jamaah
        ];
        return json_encode($data);
    }
    public function cariJamaah()
    {
        $json = $this->request->getJSON();
        $tglStart = $json->tglStart;
        $tglAkhir = $json->tglAkhir;
        $cari = $json->cari;
        $status = $json->status;
        $kolom = $json->kolom;
        $urut = $json->urut;
        $page = $json->page;
        $mj = new ModelJamaah();
        //($cari, $status, $kolom, $urut, $limit, $page)
        $jamaah = $mj->cariJamaah($tglStart, $tglAkhir, $cari, $status, $kolom, $urut, $this->limit, $this->getOffset($page));
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
    public function jamaahDetail($id)
    {
        return view ('view_jamaahDetail');
    }
    public function getJamaahById($id)
    {
        $mj = new ModelJamaah();
        $data = $mj->getJamaahById($id);
        return json_encode($data[0]);
    }
    public function insertJamaah()
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $nomorSertifikat = $json->nomorSertifikat;
        $cek = $mj->getWhere(['nomorSertifikat'=> $nomorSertifikat])->getResult();
        if($cek) return json_encode(['pesan' => 'Nomor sertifikat sudah terpakai', 'status' => 400]);
        $data = [
            //{"nomorSertifikat":null,"tanggalDaftar":"2022-06-25","kantor":null,"nama":null,"tempatLahir":null,"tanggalLahir":"2022-06-25","propinsi":"1","kota":"2","kecamatan":"132","desa":"606","alamat":null,"telepon":null,"linkFoto":null,"rekeningBmt":null,"rekeningBank":null,"plafond":0,"sph":null,"bpih":null,"keterangan":null}
            'nomorSertifikat' => $nomorSertifikat,
            'tanggalDaftar' => $json->tanggalDaftar,
            'kantor' => $json->kantor,
            'nama' => $json->nama,
            'tempatLahir' => $json->tempatLahir,
            'tanggalLahir' => $json->tanggalLahir,
            'propinsi' => $json->propinsi,
            'kabupaten' => $json->kota,
            'kecamatan'=> $json->kecamatan,
            'desa'  => $json->desa,
            'plafond' => $json->plafond,
            'sph' => $json->sph,
            'bpih' => $json->bpih,
            'alamat' => $json->alamat,
            'telepon' => $json->telepon,
            'linkFoto' => NULL,
            'rekeningBmt' => $json->rekeningBmt,
            'rekeningBank' => $json->rekeningBank,
            'keterangan' => $json->keterangan,
            'tanggalPembatalan' => NULL,
            'keteranganPembatalan' => NULL,
            'status' => 'Aktif'
        ];
       // return print_r($data);
        $insert = $mj->insert($data);
        if(!$insert) return json_encode(['pesan' => 'Gagal simpan Data', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
    public function getBaseUrl()
    {
        return json_encode(['ini base urlnya: ' => base_url()]);
    }
    
    public function updateDataJamaah($id)
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $data = [
            'propinsi' => $json->propinsi,
            'kabupaten' => $json->kota,
            'kecamatan'=> $json->kecamatan,
            'desa'  => $json->desa,
            'plafond' => $json->plafond,
            'sph' => $json->sph,
            'bpih' => $json->bpih,
            'alamat' => $json->alamat,
            'kantor' => $json->kantor,
            'keterangan' => $json->keterangan,
            'nama' => $json->nama,
            'rekeningBank' => $json->rekeningBank,
            'rekeningBmt' => $json->rekeningBmt,
            'status' => $json->status,
            'tanggalDaftar' => $json->tanggalDaftar,
            'tanggalLahir' => $json->tanggalLahir,
            'telepon' => $json->telepon,
            'tempatLahir' => $json->tempatLahir,
            'jenisKelamin' => $json->jenisKelamin
        ];

        $update = $mj->set($data);
        $update->where('id', $id);
        $update->update();
        if(!$update) return json_encode(['pesan' => 'Gagal diperbarui', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
    public function setNonaktif($id)
    {
        $mj = new ModelJamaah();
        $json = $this->request->getJSON();
        $data = [
            'tanggalPembatalan' => $json->tanggalPembatalan,
            'keteranganPembatalan' => $json->keteranganPembatalan,
            'status' => $json->status
        ];
        $mj->set($data);
        $mj->where('id', $id);
        $update = $mj->update($data);
        if(!$update) return json_encode(['pesan' => 'Gagal diperbarui', 'status' => 400]);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }

    public function fileUpload(){

        $data = array();
  
        // // Read new token and assign to $data['token']
        // $data['token'] = csrf_hash();
  
        ## Validation
        $validation = \Config\Services::validation();
  
        $input = $validation->setRules([
           // 'file' => 'uploaded[file]|max_size[file,3072]|ext_in[file,jpeg],'
            'file' => 'uploaded[file]|max_size[file,3072]|ext_in[file,jpeg,jpg,docx,pdf],'
        ]);
  
        if ($validation->withRequest($this->request)->run() == FALSE){
  
           $data['success'] = 0;
           $data['error'] = $validation->getError('file');// Error response
  
        }else{
  
           if($file = $this->request->getFile('file')) {
              if ($file->isValid() && ! $file->hasMoved()) {
                 // Get file name and extension
                 $name = $file->getName();
                 $ext = $file->getClientExtension();
  
                 // Get random file name
                 $newName = $file->getRandomName();
  
                 // Store file in public/uploads/ folder WRITEPATH
                 $file->move( WRITEPATH . 'uploads/foto', $newName); // sekarang diarahkan ke halaman writable
                 //$file->move('../public/uploads', $newName);
  
                 // File path to display preview
                 $filepath = base_url() . "/renderImage/".$newName;
                 //$filepath = base_url()."/uploads/".$newName;

                 //lakukan update nama foto di databse jamaah
                 $id = $this->request->getJSON('id');
                 $this->updateFoto($id, $newName);
  
                 // Response
                 $data['success'] = 1;
                 $data['message'] = 'Uploaded Successfully!';
                 $data['filepath'] = $filepath;
                 $data['extension'] = $ext;
                 $data['foto'] = $newName;
                 
                 //return print_r($data);
                 
  
              }else{
                 // Response
                 $data['success'] = 2;
                 $data['message'] = 'File not uploaded.'; 
              }
           }else{
              // Response
              $data['success'] = 2;
              $data['message'] = 'File not uploaded.';
           }
        }
        return $this->response->setJSON($data);
     }
     
     public function updateFoto($id){
        $model = new ModelJamaah();
        $namaImage = $this->request->getJSON('linkFoto');
        //return json_encode($namaImage);
        $data = [
            'linkFoto' => $namaImage,
        ];
        $fotoLama = $model->select('linkFoto')->where('id', $id)->get()->getResult();
        $foto = isset ($fotoLama[0]->linkFoto) ? $fotoLama[0]->linkFoto : '';
        //return json_encode(['nilai' => $foto]);
        if($foto == '') {
            $model->set($data);
            $model->where('id', $id);
            $model->update();
            return json_encode(['pesan'=> 'Sukksesss ganti foto link kosong', 'status' => 201]);
        }
        $path = WRITEPATH . 'uploads/foto/' . $foto;
        if(file_exists($path)) {
                unlink($path);
                $model->set($data);
                $model->where('id', $id);
                $model->update();
                return json_encode(['pesan'=> 'Sukksesss ganti foto link ada dan foto juga ada', 'status' => 201]);
            } else {
                $model->set($data);
                $model->where('id', $id);
                $model->update();
                return json_encode(['pesan'=> 'Sukksesss ganti foto link ada foto tida ada', 'status' => 201]);
            }
        }
        public function renderTabel(){
            $data = $this->request->getVar('data');
           // return print_r($data);
            $sc = [];
            foreach($data as $key => $val){
                $sc[]=[
                    'nama' => $val->nama,
                    'umur' => number_format($val->umur),
                    'kelamin' => $val->kelamin,
                ];
            };
            //return print_r($sc);
$StringTools = new \StringTools;
                   $table = $StringTools::toAsciiTable($sc, ["nama", "umur", "kelamin"], 50);
                  // print_r($table);

            $mimeType = 'text/javascript';

        $this->response
        ->setStatusCode(200)
        ->setContentType($mimeType)
        ->setBody($table)
        ->send();
        }

       
}
