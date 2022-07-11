<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCabang;

class Cabang extends BaseController
{
    public function index()
    {
        //
    }
    public function getCabang()
    {
        $mm = new ModelCabang();
        $data = $mm->findAll();
        return json_encode($data);
    }
    public function insertCabang()
    {
        $mc = new ModelCabang();
        $json = $this->request->getJSON();
        $data = [
            'kode' => $json->kode,
            'nama' => $json->nama,
        ];
        $mc->insert($data);
        return json_encode(['pesan' => $data, 'status' => 201]);
    }
}
