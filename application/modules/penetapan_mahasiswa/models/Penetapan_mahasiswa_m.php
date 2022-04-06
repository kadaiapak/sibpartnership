<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// @used by
//    - data_beasiswa/Beasiswa
class Penetapan_mahasiswa_m extends CI_Model
{
    // @desc    mulai datatable
    // @used    
    // controller  'penetapan-mahasiswa/detail'
    var $column_order = array(null, 'mahasiswa_beasiswa.nim_mahasiswa',
                                     'mahasiswa_beasiswa.nama_mahasiswa',
                                     'mahasiswa_beasiswa.prodi',
                                     'mahasiswa_beasiswa.fakultas',
                                     'mahasiswa_beasiswa.status_beasiswa',
                                     'mahasiswa_beasiswa.tanggal_daftar',
                                null); //set column field database for datatable orderable
    var $column_search = array('mahasiswa_beasiswa.nim_mahasiswa','mahasiswa_beasiswa.nama_mahasiswa'); //set column field database for datatable searchable
    var $order = array('mahasiswa_beasiswa.nim_mahasiswa' => 'desc'); // default order 

    private function _get_datatables_query($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa_beasiswa');
        $this->db->where('id_beasiswa', $id);
        $this->db->group_start();
        $this->db->where('status_beasiswa', '2');
        $this->db->or_where('status_beasiswa', '3' );
        $this->db->group_end();
        $i = 0;
        
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($id) 
    {
        $this->_get_datatables_query($id);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id)
    {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all($id = null) 
    {
        $this->db->from('mahasiswa_beasiswa');
        if($id != null){
            $this->db->where('id_beasiswa', $id);
        }
        return $this->db->count_all_results();
    }
    // end datatables



    // @desc - ambil master beasiswa berdasarkan yang pendaftarnya bisa ditetapkan menjadi penerima beasiswa
    //         jika admin beasiswa baznas, maka master beasiswa yang dipanggil juga cuma beasiswa baznas
    // @used by
    // - controller 'penetapan_mahasiswa/index'
    public function getMasterBeasiswaPenetapan()
    {
        $id_beasiswa_admin = $this->fungsi->user_login()->role_id;
        $this->db->select('id_beasiswa');
        $this->db->from('user_role');
        $this->db->where('id', $id_beasiswa_admin);
        $id_beasiswa = $this->db->get()->row()->id_beasiswa;
         
        $this->db->select('mb.*, 
        nb.nama_beasiswa as nama_beasiswa, 
        kb.nama_kelompok as kelompok_beasiswa, 
        ab.nama_asal_beasiswa as asal_beasiswa, 
        jb.nama_jenis as jenis_beasiswa, 
        p.nama as periode');
        $this->db->from('master_beasiswa mb');
        $this->db->join('nama_beasiswa nb', 'nb.id = mb.nama_beasiswa', 'left');
        $this->db->join('kelompok_beasiswa kb', 'kb.id = mb.kelompok_beasiswa','left');
        $this->db->join('jenis_beasiswa jb', 'jb.id = mb.jenis_beasiswa','left');
        $this->db->join('asal_beasiswa ab', 'ab.id = mb.asal_beasiswa','left');
        $this->db->join('periode p', 'p.id = mb.periode','left');
        $this->db->where('mb.nama_beasiswa', $id_beasiswa);
        $this->db->where('aktif', '1');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    // @desc - check master beasiswa apakah ada
    //         jika tidak ada maka return 404 not found
    // @used by
    // - controller 'penetapan_mahasiswa/detail'
    // public function checkMasterBeasiswa($id)
    // {
    //     $query = $this->db->get_where('master_beasiswa', array('id' => $id));
    //     return $query;
    // }

    // @desc - ambil data mahasiswa tergantung beasiswa yang akan ditetapkan
    // @used by
    // - controller 'penetapan_mahasiswa/detail_mahasiswa'
    public function getMahasiswaPendaftar($id_beasiswa, $nim)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa_beasiswa');
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->where('id_beasiswa', $id_beasiswa);
        $query = $this->db->get();

        return $query;
    }

    // @desc - ambil data mahasiswa 
    // @used by
    // - controller 'penetapan_mahasiswa/detail_mahasiswa'
    public function getBerkasPendaftaran($id)
    {
        $query = $this->db->get_where('file_mahasiswa_daftar_beasiswa', array('id_mahasiswa_daftar_beasiswa' => $id));
        return $query;
    }

    // @desc - lihat apakah masih bisa melakukan penetapan mahasiswa
    // @used by
    // - controller 'penetapan_mahasiswa/tetapkan'
    public function cekTotalKuotaPenetapan($id)
    {
        $this->db->select('kuota_penetapan');
        $this->db->from('master_beasiswa');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
    
        $totalPendaftar = $this->db->where(['id_beasiswa'=> $id, 'status_beasiswa' => 3])->from("mahasiswa_beasiswa")->count_all_results();
        
        if($totalPendaftar >= $query->kuota_penetapan)
        {
            return true;
        }else{
            return false;
        }
    die;
    }

     // @desc - tetapkan mahasiswa menjadi penerima beasiswa
    // @used by
    // - controller 'penetapan_mahasiswa/tetapkan'
    public function tetapkanBeasiswa($id=null, $nim = null)
    {
        $this->db->set('status_beasiswa', '3');
        $this->db->where('id_beasiswa', $id);
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->update('mahasiswa_beasiswa');
        $historis = array(
            'nim' => $nim,
            'id_beasiswa' => $id,
            'status_beasiswa' => '3',
            'keterangan' => 'ditetapkan menjadi penerima beasiswa',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('historis_beasiswa', $historis);
    }

    // @desc - ambil data mahasiswa 
    // @used by
    // - controller 'penetapan_mahasiswa/detail_mahasiswa'
    public function batalkanBeasiswa($id=null, $nim = null)
    {
        $this->db->set('status_beasiswa', '2');
        $this->db->where('id_beasiswa', $id);
        $this->db->where('nim_mahasiswa', $nim);
        $this->db->update('mahasiswa_beasiswa');
        $historis = array(
            'nim' => $nim,
            'id_beasiswa' => $id,
            'status_beasiswa' => '2',
            'keterangan' => 'penetapan dibatalkan',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('historis_beasiswa', $historis);
    }

}

?>