<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model
{
     public function getAllUsers()
    {
        $hasil = $this->db->get('user');
        return $hasil;  
    }

}

?>