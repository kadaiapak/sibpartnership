<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_pendaftaran_m extends CI_Model
{
    // @desc - ambil data semua master beasiswa yang boleh di tampilkan (show = 1)
    // @used by
    // - controller 'bsw/index'
    public function getMasterBeasiswaWhere($limit, $start)
    {
        $this->db->select('mb.*, mahasiswa_beasiswa.* 
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
        $this->db->join('mahasiswa_beasiswa', 'mahasiswa_beasiswa.id_beasiswa');
        $this->db->where('tampil', '1');
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    // @desc -digunakan untuk menghitung semua master untuk pagination
    // @used by
    // - controllers 'bsw/index'
    public function countMasterBeasiswaYangDiDaftar($nim)
    {
        $this->db->where('nim_mahasiswa', $nim);
        $query =  $this->db->count_all_results('mahasiswa_beasiswa');
        return $query;
    }

    public function uploadSk($post)
    {
        $id = $this->input->post('id');
        $this->db->set('sk', $post['sk']);
        $this->db->where('id', $id);
        $this->db->update('master_beasiswa');
    }
        public function import_data($upload_array, $id)
        {
            foreach ($upload_array as $ur) {
                $mahasiswa = array(
                    'nim' => $ur
                );
                $mahasiswaBeasiswa = array(
                    'nim_mahasiswa' => $ur,
                    'id_beasiswa' => $id
                );
                $query = $this->db->get_where('mahasiswa', $mahasiswa);
                if($query->num_rows() == 0){
                    $this->db->insert('mahasiswa', $mahasiswa);   
                }
                $this->db->insert('mahasiswa_beasiswa', $mahasiswaBeasiswa);             
            }
        }

        public function cekBeasiswa($nim)
        {
            $cek = array(
                'nim_mahasiswa' => $nim
            );
            $query = $this->db->get_where('mahasiswa_beasiswa', $cek);
            if($query->num_rows() > 0){
                return true;
            }
            return false;
        }

        public function hapusPenerimaBeasiswa($nim)
        {
            $this->db->where('nim_mahasiswa', $nim);
            $this->db->delete('mahasiswa_beasiswa');
            
        }
}

?>