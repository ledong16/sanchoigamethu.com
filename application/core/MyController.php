<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/26/2018
 * Time: 4:06 PM
 */
class MyController extends CI_Controller {
	function __construct()
	{
		parent::__construct();
        $this->checkUserLogin();
	}

	function checkUserLogin() {
	    $controller = $this->uri->segment(1);
	    $loginPermission = $this->session->userdata('loginPermission');
	    if ($controller != 'verify_account') {
            if ($controller != 'login' && $controller != 'register' && $controller != 'forgot' && !$loginPermission) {
                redirect(base_url('login'));
            }
            if (($controller == 'login' || $controller == 'register' || $controller == 'forgot') && $loginPermission) {
                redirect(base_url('manager/home'));
            }
        }
    }
}
