<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 10:03 AM
 */

require APPPATH.'core/MyController.php';

class HomeC extends MyController {
	function __construct()
	{
		parent::__construct();
	}

	function index() {
		$data = array();
		$data['main_page'] 	= 'manager/home';
		$data['tieude']		= 'Dashboard';
		$this->load->view('manager/index', $data);
	}

	function logout() {
	    if ($this->session->userdata('userName')) {

            $this->session->unset_userdata('userId');
            $this->session->unset_userdata('loginName');
            $this->session->unset_userdata('loginPass');
            $this->session->unset_userdata('loginPermission');
            $this->session->unset_userdata('userName');
            $this->session->unset_userdata('userEmail');
            $this->session->unset_userdata('userPhone');

	        redirect(base_url().'login');
        }
    }

    function pageNotFound() {
        $this->load->view('errors/404');
    }
}
