<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    
    // @desc -proses login user
    // @used by
    // - views 'auth/login
    public function index()
    {
            $data['title'] = "SIB Partnership Login";
            $this->load->view('template/auth_header', $data);
            $this->load->view('home_v');
            $this->load->view('template/auth_footer');
    }

}