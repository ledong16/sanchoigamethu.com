<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 3:59 PM
 */

require APPPATH.'core/MyController.php';

class LoginC extends MyController {
	function __construct()
	{
		parent::__construct();
		$this->load->model('ThanhVienModel');
        $this->load->model('ActiveLoginModel');
	}

	function index() {
		if($this->input->post()) {
			$this->form_validation->set_rules('loginName', 'Login Name', 'callback_checkLogin');
            $this->form_validation->set_rules('loginPass', 'Login Password', 'required');
			if($this->form_validation->run()) {
                $taiKhoan = $this->input->post('loginName');

                $userInfo = $this->ThanhVienModel->getUserInfo('login_name', $taiKhoan);

                $this->session->set_userdata('userId', $userInfo->id);
                $this->session->set_userdata('loginName', $userInfo->login_name);
                $this->session->set_userdata('loginPass', $userInfo->login_pass);
				$this->session->set_userdata('loginPermission', $userInfo->login_permission);
                $this->session->set_userdata('userName', $userInfo->user_name);
                $this->session->set_userdata('userEmail', $userInfo->user_email);
                $this->session->set_userdata('userPhone', $userInfo->user_phone);

				redirect(base_url('manager/home'));
			}
		}
		$this->load->view('login/login');
	}

    function register() {
        if($this->input->post()) {
            $this->registerValidator();
            if ($this->form_validation->run()) {

                $loginName 	        = $this->input->post('loginName');
                $loginPass 	        = $this->input->post('loginPass');
                $userEmail 	        = $this->input->post('userEmail');
                $userName 	        = $this->input->post('userName');
                $userPhone 	        = $this->input->post('userPhone');

                $input = array(
                    'login_name'        => $loginName,
                    'login_pass'        => $loginPass,
                    'login_permission'  => 'Member',
                    'user_name'         => $userName,
                    'user_email'        => $userEmail . '@gmail.com',
                    'user_phone'        => $userPhone,
                    'active'            => false
                );

                $this->ThanhVienModel->create($input);

                $randomCode = $this->ActiveLoginModel->rand_string(50);
                $active = array(
                    'user_email'        => $userEmail,
                    'user_active_code'  => $randomCode
                );
                $this->ActiveLoginModel->create($active);
                $this->ActiveLoginModel->registerMail($userEmail . '@gmail.com', $userName, $randomCode);

                $this->session->set_flashdata('mess', 'Success, please check your email and active this account');
                redirect(base_url('login'));
            }
        }
        $this->load->view('login/register');
    }

    function verifyAccount() {
        $inputEmail = $this->uri->segment(2);
        $inputCode = $this->uri->segment(3);
        $input = array(
            'user_email' => $inputEmail,
            'user_active_code'=> $inputCode
        );
        if ($this->ActiveLoginModel->checkActiveCode($input) == true) {
            $this->ThanhVienModel->activeAccount($inputEmail);
            $this->ActiveLoginModel->activeAccount($inputEmail);
            $this->session->set_flashdata('mess', 'Success, your account have been actived.');
        }
        else {
            $this->session->set_flashdata('mess', 'Failed, wrong email or active code.');
        }
        redirect(base_url('login'));
    }

    function forgotPassword() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('userEmail', 'User Email', 'required|valid_email');
            if ($this->form_validation->run()) {
                $userEmail = $this->input->post('userEmail');

                $where = array('user_email' => $userEmail);
                if($this->ThanhVienModel->check_exists($where)) {
                    $this->ThanhVienModel->sendEmail($userEmail);
                    if ( ! $this->email->send()){
                        echo $this->email->print_debugger();
                        $this->session->set_flashdata('mess', 'Something went wrong when send email to your email address. We will fix it soon.');
                    }
                    else{
                        $this->session->set_flashdata('mess', 'Your account have been sent to your email. Please check your email');
                        redirect(base_url('login'));
                    }
                }
                else {
                    $this->session->set_flashdata('mess', 'Your email doesn\'t exist. Please retype your email.');
                }
                redirect(base_url('forgot'));
            }
        }
        $this->load->view('login/forgotPassword');
    }

	function checkLogin() {
		$loginName 	= $this->input->post('loginName');
		$loginPass	= $this->input->post('loginPass');
		$where = array(	'login_name'	=> $loginName,
						'login_pass'	=> $loginPass);
		if($this->ThanhVienModel->check_exists($where) == false) {
            $this->form_validation->set_message('checkLogin', 'Login name invalid.');
			return false;
		}
		else
        {
            if ($this->ThanhVienModel->checkActiveUser($where) == false) {
                $this->form_validation->set_message('checkLogin', 'This account is not active.');
                return false;
            }
            return true;
        }
	}

    function registerValidator() {
        $this->form_validation->set_rules('loginName', 'Login Name', 'required|min_length[6]|max_length[20]|callback_checkRegister');

        $this->form_validation->set_rules('loginPass', 'Password', 'required|min_length[6]|max_length[20]');

        $this->form_validation->set_rules('loginPassRetype', 'Retype password', 'required|matches[loginPass]');

        $this->form_validation->set_rules('userEmail', 'Email', 'required|min_length[4]');

        $this->form_validation->set_rules('userName', 'Your Name', 'required');

        $this->form_validation->set_rules('userPhone', 'Your Phone Number', 'required|numeric|min_length[9]|max_length[13]');

        $this->form_validation->set_rules('agree', 'Agree', 'callback_isAgree');

    }

    function isAgree() {
	    if ($this->input->post('agree') != true) {
            $this->form_validation->set_message('isAgree', 'You must agree with our terms');
            return false;
        }
        else {
	        return true;
        }
    }

    function checkRegister() {
        $loginName = $this->input->post('loginName');
        $userEmail = $this->input->post('userEmail');
        $userPhone = $this->input->post('userPhone');
        $whereName = array(	'login_name' => $loginName);
        $whereEmail = array('user_email' => $userEmail);
        $wherePhone = array('user_phone' => $userPhone);
        if($this->ThanhVienModel->check_exists($whereName)) {
            $this->form_validation->set_message('checkRegister', 'Login name existed.');
            return false;
        }
        elseif ($this->ThanhVienModel->check_exists($whereEmail)) {
            $this->form_validation->set_message('checkRegister', 'Email existed.');
            return false;
        }
        elseif ($this->ThanhVienModel->check_exists($wherePhone)) {
            $this->form_validation->set_message('checkRegister', 'Phone number existed.');
            return false;
        }
        else {
            return true;
        }
    }
}
