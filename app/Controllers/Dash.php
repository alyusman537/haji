<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDash;

class Dash extends BaseController
{
    public function index()
    {
        return view('view_dash');
    }
    public function jamaahByKabupaten()
    {
        $mm = new ModelDash();
        return json_encode($mm->jamaahByKabupaten());
    }
    public function jamaahByKabupatenNonaktif()
    {
        $mm = new ModelDash();
        return json_encode($mm->jamaahByKabupatenNonaktif());
    }
    public function kelompokUmur()
    {
        $mm = new ModelDash();
        return json_encode($mm->kelompokUmur());
    }
    public function kelompokKelamin()
    {
        $mm = new ModelDash();
        return json_encode($mm->kelompokKelamin());
    }
    public function jamaahByCabang()
    {
        $mm = new ModelDash();
        return json_encode($mm->jamaahByCabang());
    }
    public function jamaahByStatus()
    {
        $mm = new ModelDash();
        return json_encode($mm->jamaahByStatus());
    }
    public function jamaahByBulan()
    {
        $tahun = date('Y');
        //return json_encode($tahun);
        $mm = new ModelDash();
        return json_encode($mm->jamaahByBulan($tahun));
    }
}
