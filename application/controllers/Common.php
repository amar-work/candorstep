<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function mapbylatlang(){
		$lat = $this->uri->segment(3);
		$lng = $this->uri->segment(4);
		if(isset($lat) && isset($lng)){
		$data = array ('lat'=>$lat,'lng'=>$lng);
		}else{
		$data=array("lat"=>"17.3850","lng"=>"78.4867");		
		}
		$this->load->view('Common/mapbylatlang', $data);
	}
}
