<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BeasiswaModel extends CI_Model
{
     public function getBeasiswaDaftar()
    {
        $this->db->select('mb.*, 
        nb.nama_beasiswa as nama_beasiswa, 
        kb.nama_kelompok as kelompok_beasiswa, 
        ab.nama_asal_beasiswa as asal_beasiswa, 
        jb.nama_jenis as jenis_beasiswa, 
        p.nama as periode');
        $this->db->from('master_beasiswa mb');
        $this->db->join('nama_beasiswa nb', 'nb.id = mb.nama_beasiswa', 'left');
        $this->db->join('kelompok_beasiswa kb', 'kb.id = mb.kelompok_beasiswa','left');
        $this->db->join('jenis_beasiswa jb', 'jb.id = mb.jenis_beasiswa','left');
        $this->db->join('asal_beasiswa ab', 'ab.id = mb.asal_beasiswa','left');
        $this->db->join('periode p', 'p.id = mb.periode','left');
        $this->db->where('tampil', '1');
        $this->db->where('buka_pendaftaran', '1');
        $this->db->where('aktif', '1');
        $this->db->where('tgl_awal_pendaftaran <', date('Y-m-d H:i:s'));
        $this->db->where('tgl_tutup_pendaftaran >', date('Y-m-d H:i:s'));
        $this->db->order_by("id", "desc");
        $query = $this->db->get();

        return $query; 
    }

}

?>