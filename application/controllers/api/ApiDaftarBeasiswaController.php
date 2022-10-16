<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class ApiDaftarBeasiswaController extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BeasiswaModel');
    }

    public function index_get()
    {
        $beasiswa = new BeasiswaModel;
        $res_beasiswa = $beasiswa->getBeasiswaDaftar()->result_array();
        $this->response($res_beasiswa, RestController::HTTP_OK);
    }
}