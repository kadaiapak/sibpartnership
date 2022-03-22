<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Statistik';
        $data['isi'] = 'statistik_v';
        $this->load->view('template/wrapper_frontend_v', $data);
        
    }
} 