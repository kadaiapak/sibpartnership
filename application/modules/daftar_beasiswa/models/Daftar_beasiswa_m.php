<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// @used by
//    - data_beasiswa/Beasiswa
class Daftar_beasiswa_m extends CI_Model
{
    // @desc - ambil data semua master beasiswa yang buka pendaftaran, 
    //         nantinya digunakan oleh mahasiswa untuk daftar beasiswa (show = 1)
    // @used by
    // - controller 'daftar-beasiswa/index'
    public function getMasterBeasiswaDaftar()
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

    // @desc - menginput data pendaftaran beasiswa oleh mahasiswa ke dalam table mahasiswa_daftar_beasiswa 
    //         nantinya digunakan oleh mahasiswa untuk daftar beasiswa (show = 1)
    // @used by
    // - controller 'daftar-beasiswa/index'
    public function prosesPendaftaranBeasiswa($post,$id, $upload)
    {
        $data = array(
            'nim_mahasiswa' => $post['nim'],
            'tm_msk' => $post['tm_msk'],
            'nama_mahasiswa' =>  $post['nama_mahasiswa'],
            'jenis_kelamin' =>  $post['jk'],
            'prodi' =>  $post['prodi'],
            'fakultas' =>  $post['fakultas'],
            'jjp' =>  $post['jjp'],
            'ipk' =>  $post['ipk'],
            'nohp' =>  $post['nohp'],
            'tmp_lhr' =>  $post['tmp_lhr'],
            'tgl_lhr' =>  $post['tgl_lhr'],
            'agama' =>  $post['agama'],
            'id_beasiswa' => $id,
            'status_beasiswa' => '1',
            'tanggal_daftar' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('mahasiswa_beasiswa', $data);
        $insert_id = $this->db->insert_id();
        
        // masukkan kedalam historis beasiswa
        $historis = array(
            'nim' => $post['nim'],
            'id_beasiswa' => $id,
            'status_beasiswa' => '1',
            'keterangan' => 'mendaftar beasiswa',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('historis_beasiswa', $historis);
        foreach ($upload as $key => $value) {
            $file_upload = array(
                'id_mahasiswa_daftar_beasiswa' => $insert_id,
                'judul' => $key,
                'nama_file' => $value
            );
            $this->db->insert('file_mahasiswa_daftar_beasiswa', $file_upload);
        }
    }

    // @desc - cek apakah yang bersangkutan sudah pernah mendaftar beasiswa ini
    //         kalau sudah maka dia tidak bisa daftar beasiswa ini, namun dia bisa daftar beasiswa lain
    // @used by
    // - controller 'daftar-beasiswa/index'
    public function cekPernahDaftarBeasiswaModel($nim, $id)
    {
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->where('id_beasiswa', $id);
        $query =  $this->db->count_all_results('mahasiswa_beasiswa');
        return $query;
    }

    public function cekSedangDaftarModel($nim)
    {
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->group_start();
        $this->db->where('status_beasiswa', '1');
        $this->db->or_where('status_beasiswa', '2');
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('tgl_tutup_pendaftaran >', date('Y-m-d H:i:s'));
        $this->db->or_where('master_beasiswa.buka_pendaftaran','1');
        $this->db->group_end();
        $this->db->join('master_beasiswa', 'mahasiswa_beasiswa.id_beasiswa = master_beasiswa.id');
        $query =  $this->db->count_all_results('mahasiswa_beasiswa');
        return $query;
        // $this->db->where('nim_mahasiswa', $nim);
        // $this->db->group_start();
        // $this->db->where('status_beasiswa', '1');
        // $this->db->or_where('status_beasiswa', '2');
        // $this->db->group_end();
        // $this->db->where('master_beasiswa.buka_pendaftaran','1');
        // $this->db->join('master_beasiswa', 'mahasiswa_beasiswa.id_beasiswa = master_beasiswa.id');
        // $query =  $this->db->count_all_results('mahasiswa_beasiswa');
        // return $query;

    }

    public function cekSedangDapatBeasiswaModel($nim)
    {
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->where('status_beasiswa', '3');
        $this->db->where('master_beasiswa.aktif','1');
        $this->db->join('master_beasiswa', 'mahasiswa_beasiswa.id_beasiswa = master_beasiswa.id');
        $query =  $this->db->count_all_results('mahasiswa_beasiswa');
        return $query;
    }

    // @desc - cek apakah tanggal nya masih bisa mendaftar
    //         kalau sudah maka dia tidak bisa daftar beasiswa ini, namun dia bisa daftar beasiswa lain
    // @used by
    // - controller 'daftar-beasiswa/index'
    public function cekTanggalModel($id)
    {
        $this->db->select('*');
        $this->db->from('master_beasiswa');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;  
    } 

    public function cekTotalPendaftar($id)
    {
       
        $query = $this->db->where(['id_beasiswa'=> $id])->from("mahasiswa_beasiswa")->count_all_results();
        return $query;
    }

    public function getPersyaratan($id)
    {
        $this->db->select('persyaratan_pendaftaran.persyaratan as persyaratan, 
                           persyaratan_pendaftaran.alias as alias, 
                           persyaratan_pendaftaran.keterangan as keterangan, 
                           persyaratan_pendaftaran.tipe_file as tipe_file, 
                           persyaratan_pendaftaran.ukuran_file_mb as ukuran_file_mb, 
                           persyaratan_pendaftaran.ukuran_file as ukuran_file, 
                           persyaratan_pendaftaran.aktif as aktif,
                           master_beasiswa_persyaratan.wajib as wajibpersyaratan
                           ');
        $this->db->from('persyaratan_pendaftaran');
        $this->db->join('master_beasiswa_persyaratan', 'master_beasiswa_persyaratan.persyaratan = persyaratan_pendaftaran.id');
        $this->db->where('master_beasiswa_persyaratan.master_beasiswa', $id);
        $result = $this->db->get();
        return $result;
    }
}

?>