    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_ayah extends CI_Controller
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
        $data['title'] = 'Pekerjaan Ayah';
        $data['pekerjaan_ayah'] = $this->beasiswa->getpekerjaanAyah()->result_array();
        $this->form_validation->set_rules('nama_pekerjaan', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('point_penilaian', 'Point Penilaian', 'required');
        if($this->form_validation->run() == false)
        {
            $data['isi'] = 'pekerjaan_ayah_v';
            $this->load->view('template/wrapper_frontend_v', $data);
        } else {
            if($this->cek_akses_user['tambah'] != '1')
            {
            redirect(base_url('auth/blocked'));
            } else {
                    $post = $this->input->post(null, TRUE);
                    $this->beasiswa->tambahPekerjaanAyah($post);
                    if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata("message", 
                            "Pekerjaan Ayah dan Point Penilaian berhasil ditambahkan!");
                    redirect('mbeasiswa/pekerjaan_ayah');
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
        $id = $this->input->post('pekerjaan_ayah_id');
        $this->beasiswa->deletePekerjaanAyah($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata("message", 
                "Jenis Beasiswa berhasil dihapus!");
        }
        redirect('mbeasiswa/pekerjaan_ayah');
    }

    public function edit()
    {
        if($this->cek_akses_user['edit'] != '1')
        {
            redirect(base_url('auth/blocked'));
        }
        $id = $this->input->post('id');
        $post = $this->input->post(null, TRUE);
        $this->beasiswa->editPekerjaanAyah($id, $post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata("message", 
            "Pekerjaan ayah sudah diedit!");
            redirect('mbeasiswa/pekerjaan_ayah');
        }
    }
}