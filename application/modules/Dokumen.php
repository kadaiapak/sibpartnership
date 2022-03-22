<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		header('location:'.base_url());
	}

	function images()
    {
        if($this->uri->segment(3)){
            $dir = '/';
            $nm  = $this->uri->segment(3);
            if($this->uri->segment(4)){
                $dir .= '/'.$this->uri->segment(3);
                $nm = $this->uri->segment(4);
                if($this->uri->segment(5)){
                    $dir .= '/'.$this->uri->segment(4);
                    $nm = $this->uri->segment(5);
                    if($this->uri->segment(6)){
                        $dir .= '/'.$this->uri->segment(5);
                        $nm = $this->uri->segment(6);
                        if($this->uri->segment(7)){
                            $dir .= '/'.$this->uri->segment(6);
                            $nm = $this->uri->segment(7);
														if($this->uri->segment(8)){
		                            $dir .= '/'.$this->uri->segment(7);
		                            $nm = $this->uri->segment(8);
		                        }
                        }
                    }
                }
            }
        } else {
					$nm = 'unp.png';
					$dir = '';
				 }
        $uploaddir = $this->main_model->getFilePath();
        //$np = $dir == 'd' ? '/'  : '/'.$dir.'/' ;
//      $uri4=$this->uri->segment(4);
        $nama = $nm ? $nm : 'unp.png';
        $img='unp.png';
        if (!empty($nama)){
            $image = $nama;
            $path = $uploaddir.$dir.'/'."{$image}";
            //$img='';
            if (is_readable($path)) {
                $info = filesize($path);
                if ($info !== FALSE) {
                    header("Content-type: {$info['mime']}");
                    readfile($path);
                    exit();
                }
                else {
                    //$this->load->view("404", true);
                    header('location:'.base_url().'error');
                }
            } else {
                $path = $uploaddir.'/'."{$img}";
                if (is_readable($path)) {
                    $info = filesize($path);
                    if ($info !== FALSE) {
                        header("Content-type: {$info['mime']}");
                        readfile($path);
                        exit();
                    }
                    else {
                        //$this->load->view("404", true);
                        header('location:'.base_url().'error');
                    }
                }
                else {
                    //$this->load->view("404", true);
                    header('location:'.base_url().'error');
                }
            }
        }
        else {
            header('location:'.base_url().'error');
        }
    }

	function foto()
	{
		$uploaddir = $this->main_model->getFotoPath();
		$np=$this->uri->segment(3);
//		$uri4=$this->uri->segment(4);
		$nama= $this->uri->segment(3) ? $this->uri->segment(3) : 'unp.png';
		//      $image = $nama.'.jpg';
		if (!empty($nama)){
			$image = $nama;
			$path = $uploaddir.'/'."{$image}";
			$img='unp.png';
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
			else {
				$path = $uploaddir.'/'."{$img}";
				if (is_readable($path)) {
					$info = filesize($path);
					if ($info !== FALSE) {
						header("Content-type: {$info['mime']}");
						readfile($path);
						exit();
					}
					else {
						//$this->load->view("404", true);
						header('location:'.base_url().'error');
					}
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

	function files($dir = null,$nm)
	{
		$uploaddir = $this->main_model->getFilePath();
		$np = $dir == 'd' ? '/'  : '/'.$dir.'/' ;
//		$uri4=$this->uri->segment(4);
		$nama = $nm ? $nm : 'unp.png';
		//      $image = $nama.'.jpg';
		if (!empty($nama)){
			$image = $nama;
			$path = $uploaddir.$np."{$image}";
			$img='';
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
			else {
				$this->load->view("404", true);
				//header('location:'.base_url().'error');
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

	function files_sk($dir = null,$nm)
	{
		$uploaddir = '/home/remun/files';
		$np = $dir == 'd' ? '/'  : '/'.$dir.'/' ;
//		$uri4=$this->uri->segment(4);
		$nama = $nm ? $nm : 'unp.png';
		//      $image = $nama.'.jpg';
		if (!empty($nama)){
			$image = $nama;
			$path = $uploaddir.$np."{$image}";
			$img='';
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
			else {
				$this->load->view("404", true);
				//header('location:'.base_url().'error');
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

        function file()
	{
		$uploaddir = $this->main_model->getFilePath();
		$np=$this->uri->segment(3);
//		$uri4=$this->uri->segment(4);
		$nama= $this->uri->segment(3) ? $this->uri->segment(3) : 'unp.png';
		//      $image = $nama.'.jpg';
		if (!empty($nama)){
			$image = $nama;
			$path = $uploaddir.'/'."{$image}";
			$img='';
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
                                    header('Content-Description: File Transfer');
                                    header('Content-Type: application/octet-stream');
                                    header('Content-Disposition: attachment; filename="'.basename($path).'"');
                                    header('Expires: 0');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');
                                    header('Content-Length: ' . filesize($path));
                                    readfile($path);
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
			else {
				$this->load->view("404", true);
				//header('location:'.base_url().'error');
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

        function pengumuman() {
		$uploaddir = $this->main_model->getFilePath();
		$nama= $this->uri->segment(3) ? $this->uri->segment(3) : 'unp.png';
		if (!empty($nama)){
			$path = $uploaddir.'/pengumuman/'."{$nama}";
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
				else {
					header('location:'.base_url().'error');
				}
			}
			else {
				$this->load->view("404", true);
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

	function video()
	{
		$uploaddir = $this->config->item('sk_path');
		$np='video';
//		$uri4=$this->uri->segment(4);
		$nama=$this->uri->segment(3);
		//      $image = $nama.'.jpg';
		if (!empty($nama)){
			$image = $nama;
			$path = $uploaddir.$np.'/'."{$image}";
			$img='';
			if (is_readable($path)) {
				$info = filesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
				else {
					//$this->load->view("404", true);
					header('location:'.base_url().'error');
				}
			}
			else {
				$this->load->view("404", true);
				//header('location:'.base_url().'error');
			}
		}
		else {
			header('location:'.base_url().'error');
		}
	}

	function fotoview(){
		$dt['np']=$this->uri->segment(3);
		$dt['nama']=$this->uri->segment(4);
		$this->load->view('fotoview',$dt);
	}
	function drive($id)
		{
			$this->load->library('Uploadfiledrive');
			$load = new Uploadfiledrive();
			$urls =  $load->link($id);
			redirect($urls);
		}
	function drivethumb($id)
		{
			$this->load->library('Uploadfiledrive');
			$load = new Uploadfiledrive();
			$urls =  $load->thumb($id);
			redirect($urls);
		}
	function driveembed($id)
		{
			$this->load->library('Uploadfiledrive');
			$load = new Uploadfiledrive();
			$urls =  $load->embed($id);
			redirect($urls);
		}
		function driveedit($id)
			{
				$this->load->library('Uploadfiledrive');
				$load = new Uploadfiledrive();
				$urls =  $load->edit($id);
				redirect($urls);
			}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
