<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_m extends CI_Model
{
   
    // @desc - cek akses dalam pengeditan beasiswa
    // @used by
    // - controller 'mpersyaratan/edit/$id'
    public function cekAksesBeasiswaModel($id, $role_id)
    {
        $this->db->select('id_beasiswa');
        $this->db->from('user_role');
        $this->db->where('id', $role_id);
        $getId = $this->db->get()->row();
        $id_beasiswa = $getId->id_beasiswa;
        
        if($id_beasiswa ==   NULL){
            return false;
        };

        $this->db->where('id', $id);
        if($id_beasiswa != 0){
            $this->db->where('nama_beasiswa', $id_beasiswa);
        }
        $this->db->from('master_beasiswa');
        $hasil = $this->db->count_all_results();
        if($hasil < 1){
            return false;
        }else {
            return true;
        }
    }

     // @desc - tambah persyaratan beasiswa
    // @used by
    //  -  controller 'persyaratan/index
    public function tambahPersyaratanBeasiswa($post)
    {
        $params['persyaratan'] = $post['nama_persyaratan_beasiswa'];
        $params['alias'] = $post['alias_persyaratan_beasiswa'];
        $params['keterangan'] = $post['keterangan_persyaratan_beasiswa'];
        $params['tipe_file'] = $post['tipe_file'];
        $params['ukuran_file'] = $post['ukuran_file'];
        $params['ukuran_file_mb'] = $post['ukuran_file_mb'];
        $this->db->insert('persyaratan_pendaftaran', $params);
    }

    // @desc - edit persyaratan beasiswa
    // @used by
    // - controller 'mbeasiswa/persyaratan/edit($id)'
    public function editPersyaratanBeasiswa($id, $post)
    {
        $dataEdit = [
                'persyaratan' => $post['nama_persyaratan_beasiswa'],
                'alias' => $post['alias_persyaratan_beasiswa'],
                'keterangan' => $post['keterangan_persyaratan_beasiswa']
            ];
        $this->db->where('id', $id);
        $this->db->update('persyaratan_pendaftaran', $dataEdit);
    }
}

?>