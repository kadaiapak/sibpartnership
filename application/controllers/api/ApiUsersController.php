<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class ApiUsersController extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    public function index_get()
    {
        $users = new UsersModel;
        $res_users = $users->getAllUsers()->result_array();
        $this->response($res_users, RestController::HTTP_OK);
    }
}