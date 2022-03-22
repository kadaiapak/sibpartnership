<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

class Penetapan_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // cek_akses_user();
        $this->load->model('Penetapan_mahasiswa_m', 'penetapan');
    }

     public function get_ajax($id) 
    {
       
        $list = $this->penetapan->get_datatables($id);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nim_mahasiswa;
            $row[] = $item->nama_mahasiswa;
            $row[] = $item->prodi;
            $row[] = $item->fakultas;
            $row[] = ($item->status_beasiswa == 2 ? '<span class="badge badge-primary">Divalidasi</span>' : ($item->status_beasiswa == 3 ? '<span class="badge badge-success">Ditetapkan</span>' : null));
            $row[] = $item->tanggal_daftar;
            $row[] = '<a href="'.site_url('penetapan-mahasiswa/detail-mahasiswa/'.$id.'/'.$item->nim_mahasiswa).'" class="btn btn-primary btn-xs"><i class="fas fa-search-plus"></i> Detail</a>
                      <form action="'. base_url('penetapan-mahasiswa/hapus-mahasiswa').'" id="deleteForm" method="post" style="display: inline-block;">
                        <input name="nim" type="hidden" value="'. $item->nim_mahasiswa .'">    
                        <input name="id_beasiswa" type="hidden" value="'. $item->nim_mahasiswa .'">    
                        <button id="deleteButton" class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                      </form>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->penetapan->count_all($id),
                    "recordsFiltered" => $this->penetapan->count_filtered($id),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
    
    public function index()
    {
        cek_akses_user();
        $data['title'] = "Penetapan Mahasiswa Pendaftar Beasiswa";
        
        $data['master_beasiswa'] = $this->penetapan->getMasterBeasiswaPenetapan()->result_array();
        
        $data['isi'] = 'penetapan_mahasiswa_v';
        $this->load->view('template/wrapper_frontend_v', $data);
    }

    public function detail($id = null)
    {
        if($id == null){
            redirect('auth/oops');
        }

        $data['id'] = $id;
        $data['title'] = 'Daftar Mahasiswa Pendaftar';
       
        $data['isi'] = 'penetapan_mahasiswa_detail_v';
        $this->load->view('template/wrapper_frontend_v', $data);
    }

    public function detail_mahasiswa($id, $nim)
    {
        $data['mahasiswa'] = $this->penetapan->getMahasiswaPendaftar($id, $nim)->row();
       
        $data['berkas_pendaftaran'] = $this->penetapan->getBerkasPendaftaran($data['mahasiswa']->id)->result_array();
        $data['title'] = 'Tetapkan Mahasiswa';
        $data['id_untuk_back'] = $id;

        $datamhsaktif=$this->getmhsaktifapis($nim,checkSemester());
        $cekAktif = $datamhsaktif->respon;
        if($cekAktif == 1){
            $data['cek_aktif'] =  1;
        }else {
            $data['cek_aktif'] = 0;
        }
        $data['isi'] = 'penetapan_mahasiswa_detail_mahasiswa_v';
        $this->load->view('template/wrapper_frontend_v', $data);
    }

    // @desc - membatalkan dan metetapkan mahasiswa tertentu menjadi penerima beasiswa
    // @used by
    // - view 'penetapan_mahasiswa/penetapan_mahasiswa_detail_mahasiswa_v
    function tetapkan($id, $nim)
    {
        $totalKuotaPenetapan = $this->penetapan->cekTotalKuotaPenetapan($id);
          if($totalKuotaPenetapan)
          {
            $this->session->set_flashdata("gagal", "Penetapan Gagal, kuota sudah terpenuhi");
              
              redirect('penetapan-mahasiswa/detail-mahasiswa/'.$id.'/'.$nim);
          }
        $this->penetapan->tetapkanBeasiswa($id, $nim);
        if($this->db->affected_rows() > 0){
                $this->session->set_flashdata("message", 
                    "Penetapan Berhasil");
        }else {
            $this->session->set_flashdata("gagal", "Penetapan Gagal");
        }
        redirect('penetapan-mahasiswa/detail/'.$id);
    }

    // @desc - membatalkan mahasiswa tertentu menjadi penerima beasiswa
    // @used by
    // - view 'penetapan_mahasiswa/penetapan_mahasiswa_detail_mahasiswa_v
    function batalkan($id, $nim)
    {
        $this->penetapan->batalkanBeasiswa($id, $nim);
        if($this->db->affected_rows() > 0){
                $this->session->set_flashdata("message",
                    "Pembatalan Proses Penetapan Berhasil");
        }else {
            $this->session->set_flashdata("gagal", "Penetapan Gagal");
        }
           
        redirect('penetapan-mahasiswa/detail/'.$id);
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