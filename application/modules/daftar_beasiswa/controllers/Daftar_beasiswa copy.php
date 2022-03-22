<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Daftar_beasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->cek_akses_user = cek_akses_user();
        $this->load->model('Daftar_beasiswa_m', 'daftar');
    }
    
    public function index()
    {
        $data['title'] = "Pendaftaran Beasiswa";
       
        // ambil master beasiswa yang masih buka
        $data['master_beasiswa'] = $this->daftar->getMasterBeasiswaDaftar()->result_array();

        $data['isi'] = 'daftar_beasiswa_v';
        $this->load->view('template/wrapper_frontend_v', $data);
    }

    public function daftar($id)
    {
        // cek apakah tanggal beasiswa masih buka
        $cekBisaDaftar = $this->cekBisaDaftar($id);
        if(!$cekBisaDaftar)
        {
            $this->session->set_flashdata("gagal", 
                    "Pendaftaran Gagal, Sudah Melebihi kuota atau batas waktu !");
            redirect('daftar-beasiswa');
        }
        // cek apakah sudah pernah mendaftar beasiswa tersebut

        $nim = $this->fungsi->user_login()->username;
        $sedangDapatBeasiswa = $this->cekSedangDapatBeasiswa($nim);
        if($sedangDapatBeasiswa > 0)
        {
            $this->session->set_flashdata("gagal", 
                    "Saat ini anda sedang menerima beasiswa lain !");
            redirect('daftar-beasiswa');
        }
        $sedang_daftar = $this->cekSedangDaftar($nim);
        if($sedang_daftar > 0){
             $this->session->set_flashdata("gagal", 
                    "Anda sudah mendaftar di beasiswa lain !");
            redirect('daftar-beasiswa');
        }
        $pernah_daftar = $this->cekPernahDaftar($nim, $id);
        if($pernah_daftar > 0){
             $this->session->set_flashdata("gagal", 
                    "Anda sudah mendaftar beasiswa ini !");
            redirect('daftar-beasiswa');
        }
        


        $datamhsd = $this->getmhsapis($nim);
        $arrmhs = get_object_vars($datamhsd->data);
        
        $datamhsaktif=$this->getmhsaktifapis($nim,checkSemester());

        $cekAktif = $datamhsaktif->respon;
        if($cekAktif == 1){
            $data['cek_aktif'] =  1;
        }else {
            $data['cek_aktif'] = 0;
        }
        
        $data['mhs_api'] = $arrmhs;
        
        $data['persyaratan'] = $this->daftar->getPersyaratan($id)->result_array();
        $persyaratanUtama = $data['persyaratan'];
        $data['title'] = 'Daftar Beasiswa';
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        foreach ($persyaratanUtama as $pr) {
            $persyaratan = $pr['alias'];
            $nama_dokumen = $pr['persyaratan'];
            if (empty($_FILES["$persyaratan"]["name"]))
            {
                $this->form_validation->set_rules("$persyaratan", "$nama_dokumen", 'required');
            }
        }
        if($this->form_validation->run() == false){
            $data['isi'] = 'daftar_beasiswa_proses_v';
            $this->load->view('template/wrapper_frontend_v', $data);
        }else {
            foreach ($persyaratanUtama as $p) {
                $newName = $p['alias'].time();
                $config['upload_path'] = './uploads/persyaratan/';
                $config['allowed_types'] = $p['tipe_file']; 
                $config['max_size'] =  $p['ukuran_file'];
                $config['file_name'] = $newName;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if(!$this->upload->do_upload($p['alias'])){
                    $error = array('error' => $this->upload->display_errors());
                    break;
                }else {
                    $proses = $this->upload->data();
                    $upload["$p[alias]"] = $proses['file_name'];
                }
            }
            if($error)
            {   
                foreach ($upload as $up) {
                    $targetFile = './uploads/persyaratan/'.$up;
                        unlink($targetFile);
                }
                $this->session->set_flashdata("error_upload", 
                    "Gagal Upload, ada kesalahan dalam ukuran atau jenis file");
                redirect('daftar-beasiswa/daftar/'.$id);
            }
            
            $post = $this->input->post(null, TRUE);
            $this->daftar->prosesPendaftaranBeasiswa($post, $id, $upload);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata("message", 
                    "Pendaftaran Beasiswa anda berhasil !");
                redirect('daftar-beasiswa');
            }
        }
    }

    function cekSedangDaftar($nim)
    {
        $sedangDaftar = $this->daftar->cekSedangDaftarModel($nim);
        return $sedangDaftar;
    }

    function cekPernahDaftar($nim, $id)
    {
        $hasil = $this->daftar->cekPernahDaftarBeasiswaModel($nim,$id);
        return $hasil;
    }

    function cekSedangDapatBeasiswa($nim)
    {
        $pernah = $this->daftar->cekSedangDapatBeasiswaModel($nim);
        return $pernah;
    }

    function cekBisaDaftar($id)
    {
      $result = $this->daftar->cekTanggalModel($id)->row();  
    
      //   cek apakah pendaftaran nya sudah buka
      if(date('Y-m-d H:i:s') < $result->tgl_awal_pendaftaran ){
        //   echo 'jika pendaftaran belum buka';f
        return false;
      }else {
        //   echo 'jika Pendaftaran sudah buka';
        // cek apakah tanggal pendaftaran sudah tutup
       
        if(date('Y-m-d H:i:s') > $result->tgl_tutup_pendaftaran){
            return false;
        }
        
        else {
            $totalPendaftar = $this->daftar->cekTotalPendaftar($id);
            if($totalPendaftar >= $result->kuota_pendaftaran  ){
                return false;
            }else {
                return true;
            }
        }
      }

    }

    // @desc - mengambil data mahasiswa yang mendaftar dari API
    // @used by
    // - controller 'daftar-beasiswa/daftar
    private function getmhsapis($nim)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER,array(
        'h2hid: 119009',
        'h2hkey: FpY6qZ3S',
        'h2hunicode: nIowYLmcNdMjWHfAgQTlrJqeSpVEsOXvGbzDPaFyuki',
        'nim: '.$nim,
        'Content-Type: application/json'
      ));
      curl_setopt($ch, CURLOPT_URL, 'https://wsvc.unp.ac.id/api/akademik/cekmhs');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $output = curl_exec($ch);
      $header_data= curl_getinfo($ch);
      curl_close($ch);
      return json_decode($output);
    }

    private function getmhsaktifapis($nim,$sem)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER,array(
        'h2hid: 119009',
        'h2hkey: FpY6qZ3S',
        'h2hunicode: nIowYLmcNdMjWHfAgQTlrJqeSpVEsOXvGbzDPaFyuki',
        'nim: '.$nim,
        'idsem: '.$sem,
        'Content-Type: application/json'
      ));
      curl_setopt($ch, CURLOPT_URL, 'https://wsvc.unp.ac.id/api/akademik/cekmhsaktif');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $output = curl_exec($ch);
      $header_data= curl_getinfo($ch);
      curl_close($ch);
      return json_decode($output);
    }

} 