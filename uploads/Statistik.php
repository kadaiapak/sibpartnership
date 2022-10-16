<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->cek_akses_user = cek_akses_user();
        $this->load->model('Statistik_m','statistik');
        
    }

    public function index()
    {
        $data['title'] = 'Statistik';
        $data['isi'] = 'statistik_v';
        $tahun = $this->session->userdata('tahun_beasiswa');
        $data['penerima'] = $this->statistik->getTotalMaster($tahun)->result_array(0);
        $data['nama_beasiswa'] = $this->statistik->sering($tahun)->result();
         echo '<pre>';
        print_r($data['nama_beasiswa']->result());
        echo '</pre>';
        die;
        $this->load->view('template/wrapper_frontend_v', $data);
    }

    public function cari()
    {
        $tahun = $this->input->post('tahun_beasiswa');
        $this->session->set_userdata('tahun_beasiswa',$tahun);
        redirect(base_url('statistik'));
    }

}
