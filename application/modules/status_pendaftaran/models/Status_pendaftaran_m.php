<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_pendaftaran_m extends CI_Model
{
    // @desc - ambil data status pendaftaran
    // @used by
    // - controller 'status_pendaftaran/index'
    public function getMahasiswaBeasiswaJoinMasterBeasiswaWhere($limit, $start, $nim)
    {
        $this->db->select('mahabe.id as id_mahasiswa_beasiswa, mahabe.nama_mahasiswa as nama_mahasiswa, mahabe.status_beasiswa as status_beasiswa, mahabe.tanggal_daftar,
        nabe.nama_beasiswa, 
        per.nama as nama_periode, 
        masterb.tahun as tahun');
        $this->db->from('mahasiswa_beasiswa mahabe');
        $this->db->join('master_beasiswa masterb', 'mahabe.id_beasiswa = masterb.id');
        $this->db->join('nama_beasiswa nabe', 'masterb.nama_beasiswa = nabe.id');
        $this->db->join('periode per','masterb.periode = per.id');
        $this->db->where('mahabe.nim_mahasiswa', $nim);
        $this->db->order_by("mahabe.id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    // @desc - ambil data status pendaftaran
    // @used by
    // - controller 'status_pendaftaran/index'
    public function getDetailBeasiswaMahasiswa($id)
    {
        $this->db->select('mahabe.*,
        nabe.nama_beasiswa, 
        per.nama as nama_periode, 
        masterb.tahun as tahun');
        $this->db->from('mahasiswa_beasiswa mahabe');
        $this->db->join('master_beasiswa masterb', 'mahabe.id_beasiswa = masterb.id');
        $this->db->join('nama_beasiswa nabe', 'masterb.nama_beasiswa = nabe.id');
        $this->db->join('periode per','masterb.periode = per.id');
        $this->db->where('mahabe.id', $id);
        $this->db->order_by("mahabe.id", "desc");
        $query = $this->db->get();
        return $query;
    }

    // @desc - ambil comment
    // @used by
    // - controller 'status_pendaftaran/detail/$id'
    public function getComment($id)
    {
        $query = $this->db->get_where('comment', array('id_mahasiswa_beasiswa' => $id));
        return $query;
    }

    // @desc - digunakan untuk menghitung semua master untuk pagination
    // @used by
    // - controllers 'status_pendaftaran/index'
    public function countMasterBeasiswaYangDiDaftar($nim)
    {
         $this->db->where('nim_mahasiswa', $nim);
         $query =  $this->db->count_all_results('mahasiswa_beasiswa');
         return $query;
    }

    // @desc - ambil berkas pendaftaran mahasiswa
    // @used by
    // - controller 'status_pendaftaran/detail'
    public function getBerkasPendaftaran($id)
    {
        $query = $this->db->get_where('file_mahasiswa_daftar_beasiswa', array('id_mahasiswa_daftar_beasiswa' => $id));
        return $query;
    }
}

?>