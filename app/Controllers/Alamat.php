<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAlamat;

class Alamat extends BaseController
{
    public function getPropinsi()
    {
        $mm = new ModelAlamat();
        $data = $mm->getPropinsi();
        return json_encode($data);
    }
    public function getKota($id_propinsi)
    {
        $mm = new ModelAlamat();
        $data = $mm->getKota($id_propinsi);
        return json_encode($data);
    }
    public function getKecamatan($id_kota)
    {
        $mm = new ModelAlamat();
        $data = $mm->getKecamatan($id_kota);
        return json_encode($data);
    }
    public function getDesa($id_kecamatan)
    {
        $mm = new ModelAlamat();
        $data = $mm->getDesa($id_kecamatan);
        return json_encode($data);
    }
    public function getKabupaten()
    {
        $mm = new ModelAlamat();
        $data = $mm->getKabupaten();
        return json_encode($data);
    }
}
