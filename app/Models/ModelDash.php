<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDash extends Model
{
    public function jamaahByKabupaten()
    {
        $mm = $this->db->table('jamaah');
        $mm->selectCount('jamaah.kabupaten');
        $mm->where('jamaah.status', 'Aktif');
        $mm->select('cities.city_name');
        $mm->join('cities', 'cities.city_id = jamaah.kabupaten');
        $mm->groupBy('cities.city_name');
        $mm->limit(10,0);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function jamaahByKabupatenNonaktif()
    {
        $mm = $this->db->table('jamaah');
        $mm->selectCount('jamaah.kabupaten');
        $mm->where('jamaah.status', 'Nonaktif');
        $mm->select('cities.city_name');
        $mm->join('cities', 'cities.city_id = jamaah.kabupaten');
        $mm->groupBy('cities.city_name');
        $mm->limit(10,0);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function kelompokUmur()
    {
        $sql = "SELECT"

    . "    CASE "
    . "        WHEN umur < 20 THEN '... - 20'"
    . "        WHEN umur BETWEEN 20 and 24 THEN '20 - 24'"
    . "        WHEN umur BETWEEN 25 and 29 THEN '25 - 29'"
    . "        WHEN umur BETWEEN 30 and 34 THEN '30 - 34'"
    . "        WHEN umur BETWEEN 35 and 39 THEN '35 - 39'"
    . "        WHEN umur BETWEEN 40 and 44 THEN '40 - 44'"
    . "        WHEN umur BETWEEN 45 and 49 THEN '45 - 49'"
    . "        WHEN umur BETWEEN 50 and 54 THEN '50 - 54'"
    . "        WHEN umur BETWEEN 55 and 59 THEN '55 - 59'"
    . "        WHEN umur BETWEEN 60 and 64 THEN '60 - 64'"
    . "        WHEN umur >= 65 THEN '65 - ...'"
    . "        WHEN umur IS NULL THEN '(NULL)'"
    . "    END as range_umur,"
    . "    COUNT(*) AS jumlah "
    . "FROM (select TIMESTAMPDIFF(YEAR, tanggalLahir, CURDATE()) AS umur from jamaah WHERE status = 'Aktif')  as dummy_table "
    . "GROUP BY range_umur "
    . "ORDER BY range_umur;";

        $mm = $db = db_connect();
        $mm = $mm->query($sql);
        return $mm->getResult();
    }

    public function kelompokKelamin()
    {
        $mm = $this->db->table('jamaah');
        $mm->selectCount('jenisKelamin');
        $mm->select('jenisKelamin as gender');
        $mm->groupBy('jenisKelamin');
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function jamaahByCabang()
    {
        $mm = $this->db->table('jamaah');
        $mm->selectCount('jamaah.kantor');
        $mm->where('jamaah.status', 'Aktif');
        $mm->select('cabang.nama');
        $mm->join('cabang', 'cabang.kode = jamaah.kantor');
        $mm->groupBy('cabang.nama');
        $mm->limit(10,0);
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function jamaahByStatus()
    {
        $mm = $this->db->table('jamaah');
        $mm->selectCount('jamaah.status');
        $mm->select('jamaah.status as stat');
        $mm->groupBy('jamaah.status');
        $data = $mm->get();
        if(!$data) return false;
        return $data->getResult();
    }
    public function jamaahByBulan($tahun)
    {
        $sql = "SELECT MONTH(tanggalDaftar) AS bulan_ke, COUNT(*) AS jumlah_jamaah "
        . "FROM jamaah "
        . "WHERE YEAR(tanggalDaftar) = '$tahun' "
        . "GROUP BY MONTH(tanggalDaftar) "
        . "ORDER BY bulan_ke ASC ";
        $mm = $db = db_connect();
        $mm = $mm->query($sql);
        return $mm->getResult();
    }
}
