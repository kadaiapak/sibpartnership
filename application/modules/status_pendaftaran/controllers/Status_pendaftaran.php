<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

class Status_pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->cek_akses_user = cek_akses_user();
        $this->load->model('status_pendaftaran_m', 'status_pendaftaran');
    }
    
    public function index()
    {
        $nim = $this->fungsi->user_login()->username;
        // PAGINATION
        // load library
        $this->load->library('pagination');
        // config
        $config['base_url'] =   base_url('status-pendaftaran/index');
        $config['total_rows'] = $this->status_pendaftaran->countMasterBeasiswaYangDiDaftar($nim);
        $config['per_page'] = 4;
        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        // initialize
        $this->pagination->initialize($config);
        // get data
        $data['start_at'] = $this->uri->segment(3);
        // END OF PAGINATION
        $data['title'] = "Status Pendaftaran Beasiswa";
        $data['master_beasiswa'] = $this->status_pendaftaran->getMasterBeasiswaWhere($config['per_page'],$data['start_at'])->result_array();
        $data['isi'] = 'status_pendaftaran_v';
        $this->load->view('template/wrapper_frontend_v', $data);
    }
    
    public function detail($id=null)
    {        
        if(!$id){
            redirect('auth/oops');
        }
        $data['title'] = "Detail Beasiswa";

        $data['detail_beasiswa'] = $this->penerima->getDetailBeasiswa($id);
        $data['sk'] = $this->penerima->getMasterSk($data['detail_beasiswa']['id'])->result_array();
        $data['bp'] = $this->penerima->getMasterBP($data['detail_beasiswa']['id'])->result_array();

        $data['periode'] = $this->pbeasiswa->getPeriodeBeasiswa()->result_array();
        $data['total_penerima'] = $this->penerima->getTotalPenerimaDetailBeasiswa($id);
        $data['isi'] = 'detail_bsw_v';
        $this->load->view('template/wrapper_frontend_v', $data);  
    }

 
    public function detail_mahasiswa_penerima($id_beasiswa, $nim)
    {
        $data['title'] = "Detail Mahasiswa";
        $data['mahasiswa'] = $this->penerima->getMahasiswaPenerimaBeasiswa($id_beasiswa, $nim)->row();
        $data['periode'] = $this->pbeasiswa->getPeriodeBeasiswa()->result_array();
        $data['bp'] = $this->penerima->getBuktiPembayaran($id_beasiswa, $nim)->result_array();
        
        $data['isi'] = 'detail_mahasiswa_bsw_v';
        $this->load->view('template/wrapper_frontend_v', $data);  
    }

    // @desc - untuk print 
    // @used by
    //  - view 'detail_beasiswa_v'
    public function pdf()
    {
        $id = $this->input->post('id_beasiswa');
        $data['nama_beasiswa'] = $this->input->post('nama_beasiswa');
        $data['periode'] = $this->input->post('periode');
        $data['tahun'] = $this->input->post('tahun');
         $this->load->library('pdfgenerator');
        $data['master_beasiswa'] = $this->pbeasiswa->getPenerimaBeasiswa($id)->result_array();

        // title dari pdf
        $data['title_pdf'] = 'Laporan Penerima Beasiswa';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penerima_beasiswa';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('laporan_pdf',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
} 