    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_orangtua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses_user();
        $this->cek_akses_user = cek_akses_user();
        is_logged_in();
        // $this->load->model('Admin_m', 'admin');
        $this->load->model('Beasiswa_m', 'beasiswa');
    }

    public function index()
    {
        $data['cek_akses_user'] = $this->cek_akses_user;
        $data['title'] = 'Status Orangtua';
        $data['status_orangtua'] = $this->beasiswa->getStatusOrangtua()->result_array();
        $this->form_validation->set_rules('nama_status', 'Status', 'required');
        $this->form_validation->set_rules('point_penilaian', 'Point Penilaian', 'required');
        if($this->form_validation->run() == false)
        {
            $data['isi'] = 'status_orangtua_v';
            $this->load->view('template/wrapper_frontend_v', $data);
        } else {
            if($this->cek_akses_user['tambah'] != '1')
            {
            redirect(base_url('auth/blocked'));
            } else {
                    $post = $this->input->post(null, TRUE);
                    $this->beasiswa->tambahStatusOrangtua($post);
                    if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata("message", 
                            "Status Orangtua dan Point Penilaian berhasil ditambahkan!");
                    redirect('mbeasiswa/status_orangtua');
                    }
            }
        }
    } 

    public function hapus()
    {
        if($this->cek_akses_user['hapus'] != '1')
        {
            redirect(base_url('auth/blocked'));
        }
        $id = $this->input->post('status_orangtua_id');
        $this->beasiswa->deleteStatusOrangtua($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata("message", 
                "Status Orangtua berhasil dihapus!");
        }
        redirect('mbeasiswa/status_orangtua');
    }

    public function edit()
    {
        if($this->cek_akses_user['edit'] != '1')
        {
            redirect(base_url('auth/blocked'));
        }
        $id = $this->input->post('id');
        $post = $this->input->post(null, TRUE);
        $this->beasiswa->editStatusOrangtua($id, $post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata("message", 
            "Status Orangtua sudah diedit!");
            redirect('mbeasiswa/status_orangtua');
        }
    }
}