<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAlamat extends Model
{
    public function getPropinsi()
    {
        $mm = $this->db->table('provinces');
        $mm->select('*');
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function getKota($id_propinsi)
    {
        $mm = $this->db->table('cities');
        $mm->select('*');
        $mm->where('prov_id', $id_propinsi);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function getKecamatan($id_kota)
    {
        $mm = $this->db->table('districts');
        $mm->select('*');
        $mm->where('city_id', $id_kota);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function getDesa($id_kecamatan)
    {
        $mm = $this->db->table('subdistricts');
        $mm->select('*');
        $mm->where('dis_id', $id_kecamatan);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function getKabupaten()
    {
        $mm = $this->db->table('districts');
        $mm->select('*');
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    
}
