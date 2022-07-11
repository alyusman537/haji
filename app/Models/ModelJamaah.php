<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJamaah extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jamaah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nomorSertifikat', 'tanggalDaftar', 'kantor', 'nama', 'tempatLahir', 'tanggalLahir', 'jenisKelamin','propinsi', 'kabupaten', 'kecamatan', 'desa', 'alamat', 'telepon', 'linkFoto', 'rekeningBmt', 'rekeningBank', 'plafond', 'sph', 'bpih', 'keterangan', 'tanggalPembatalan', 'keteranganPembatalan', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function jmlJamaah($tglStart, $tglAkhir, $status)
    {
        $mj = $this->db->table('jamaah');
        $mj->selectCount('id');
        $mj->where('jamaah.status', $status);
        $mj->where('jamaah.tanggalDaftar BETWEEN "'.$tglStart.'" AND "'.$tglAkhir.'"');
        $da = $mj->get();
        if(!$da) return false;
        return $da->getResult();
    }
    public function getJamaah($tglStart, $tglAkhir, $status, $kolom, $urut, $limit, $page)
    {
        $mj = $this->db->table('jamaah as j');
        $mj->select('j.id, j.nomorSertifikat, j.tanggalDaftar, j.kantor, j.nama, j.tempatLahir, j.tanggalLahir, j.jenisKelamin, j.propinsi, j.kabupaten, j.kecamatan, j.desa, j.alamat, j.telepon, j.status, j.rekeningBmt, j.rekeningBank, j.plafond, j.sph, j.bpih, j.keterangan, cabang.nama as namaCabang, provinces.prov_name as namaPropinsi, cities.city_name as namaKota, districts.dis_name as namaKecamatan, subdistricts.subdis_name as namaDesa');
        $mj->join('cabang' , 'cabang.kode = j.kantor');
        $mj->join('provinces', 'provinces.prov_id = j.propinsi');
        $mj->join('districts', 'districts.dis_id = j.kecamatan');
        $mj->join('cities', 'cities.city_id = j.kabupaten');
        $mj->join('subdistricts', 'subdistricts.subdis_id = j.desa');
        $mj->where('j.tanggalDaftar BETWEEN "'.$tglStart.'" AND "'.$tglAkhir.'"');
        $mj->where('j.status', $status );
        $mj->orderBy($kolom, $urut);
        $mj->limit($limit, $page);
        $data = $mj->get();
        if(!$data) return false;
        return $data->getResult();
    }
    
    public function getJamaahById($id)
    {
        $mj = $this->db->table('jamaah as j');
        $mj->select('j.*, cabang.nama as namaCabang, provinces.prov_name as namaPropinsi, cities.city_name as namaKabupaten, districts.dis_name as namaKecamatan, subdistricts.subdis_name as namaDesa');
        $mj->join('cabang' , 'cabang.kode = j.kantor');
        $mj->join('provinces', 'provinces.prov_id = j.propinsi');
        $mj->join('districts', 'districts.dis_id = j.kecamatan');
        $mj->join('cities', 'cities.city_id = j.kabupaten');
        $mj->join('subdistricts', 'subdistricts.subdis_id = j.desa');
        $mj->where('j.id',$id);
        $data = $mj->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function cariJamaah($tglStart, $tglAkhir, $cari, $status, $kolom, $urut, $limit, $page)
    {
        $mj = $this->db->table('jamaah as j');
        $mj->select('j.id, j.nomorSertifikat, j.tanggalDaftar, j.kantor, j.nama, j.tempatLahir, j.tanggalLahir, j.jenisKelamin, j.propinsi, j.kabupaten, j.kecamatan, j.desa, j.alamat, j.telepon, j.status, j.rekeningBmt, j.rekeningBank, j.plafond, j.sph, j.bpih, j.keterangan, cabang.nama as namaCabang, provinces.prov_name as namaPropinsi, cities.city_name as namaKota, districts.dis_name as namaKecamatan, subdistricts.subdis_name as namaDesa');
        $mj->join('cabang' , 'cabang.kode = j.kantor');
        $mj->join('provinces', 'provinces.prov_id = j.propinsi');
        $mj->join('districts', 'districts.dis_id = j.kecamatan');
        $mj->join('cities', 'cities.city_id = j.kabupaten');
        $mj->join('subdistricts', 'subdistricts.subdis_id = j.desa');
        $mj->where('j.tanggalDaftar BETWEEN "'.$tglStart.'" AND "'.$tglAkhir.'"');
        $mj->like('j.nama', $cari);
        $mj->where('j.status', $status);
        $mj->orderBy($kolom, $urut);
        $mj->limit($limit, $page);
        $data = $mj->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function getJumlahJamaahNonaktif()
    {
        $mj = $this->db->table('jamaah');
        $mj->selectCount('nomorSertifikat');
        $mj->where('status', 'Nonaktif');
        $data = $mj->get();
        if(!$data) return false;
        return $data->getResult();
    }
}
