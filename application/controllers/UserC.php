<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2018
 * Time: 2:58 PM
 */

require APPPATH.'core/MyController.php';

class UserC extends MyController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ThanhVienModel');
    }

    function index() {
        $data = array();
        $data['main_page'] 	= 'manager/user/profile';
        $data['tieude']		= 'Profile';

        $this->load->view('manager/index', $data);
    }

    function changeInformation() {
        $data = array();
        $data['main_page'] 	= 'manager/user/information';
        $data['tieude']		= 'Change Information';

        if ($this->input->post()) {
            $this->form_validation->set_rules('userId', 'Id', 'required');
            $this->form_validation->set_rules('userName', 'Your Name', 'required');
            $this->form_validation->set_rules('userEmail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('userPhone', 'Phone Number', 'required|numeric|min_length[9]|max_length[13]');

            if($this->form_validation->run()) {
                $userId = $this->input->post('userId');
                $userName = $this->input->post('userName');
                $userEmail = $this->input->post('userEmail');
                $userPhone = $this->input->post('userPhone');

                $input = array(
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'user_phone' => $userPhone);

                $this->ThanhVienModel->update($userId, $input);

                $this->session->set_userdata('userName', $userName);
                $this->session->set_userdata('userEmail', $userEmail);
                $this->session->set_userdata('userPhone', $userPhone);

                $this->session->set_flashdata('mess', 'Update information succeed.');
            }
        }

        $this->load->view('manager/index', $data);
    }

    function changePassword() {
        $data = array();
        $data['main_page'] 	= 'manager/user/changePassword';
        $data['tieude']		= 'Change Password';

        if ($this->input->post()) {
            $this->form_validation->set_rules('currPass', 'Current Password', 'required|callback_checkCurrPass');
            $this->form_validation->set_rules('newPass', 'New Password', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('retypeNewPass', 'Retype New Password', 'required|matches[newPass]');

            if($this->form_validation->run()) {
                $userId = $this->input->post('userId');
                $loginPass = $this->input->post('newPass');

                $input = array('login_password' => $loginPass);

                $this->ThanhVienModel->update($userId, $input);
                $this->session->set_flashdata('mess', 'Change Password succeed. Please login again.');
                redirect(base_url('logout'));
            }
        }

        $this->load->view('manager/index', $data);
    }

    function activeAccount() {
        if ($this->input->post()) {
            $userId = $this->input->post('userId');

            $user = $this->ThanhVienModel->get_info($userId, 'active');
            if ($user != false) {
                if ($user->active == true) {
                    $input = array('active' => false);
                    $this->session->set_flashdata('mess', 'Change active status to block success.');
                }
                else {
                    $input = array('active' => true);
                    $this->session->set_flashdata('mess', 'Change active status to active success.');
                }
                $this->ThanhVienModel->update($userId, $input);
                redirect(base_url('manager/listUser'));
            }
        }
    }

    function checkCurrPass() {
        $currPass       = $this->input->post('currPass');
        if ($currPass != $this->session->userdata('loginPass')) {
            $this->form_validation->set_message('checkCurrPass', 'This is not your current password.');
            return true;
        }
        else {
            return false;
        }
    }

    function listUser() {
        $data = array();
        $data['main_page'] 	= 'manager/user/listUser';
        $data['tieude']		= 'List User';

        $this->db->order_by("login_permission", "asc");
        $list = $this->ThanhVienModel->get_list();
        $data['listUser'] = $list;

        $this->load->view('manager/index', $data);
    }

    function deleteUser() {
        $id = $this->uri->segment(3);
        $this->ThanhVienModel->delete($id);
        $this->session->flashdata('mess', 'Delete succeed');
        redirect(base_url('manager/listUser'));
    }

    function editUser() {
        $data = array();
        $data['main_page'] 	= 'manager/user/editUser';
        $data['tieude']		= 'Edit User';

        $id = $this->uri->segment(3);

        if ($this->input->post()) {
            $this->form_validation->set_rules('userId', 'User Id', 'required');
            $this->form_validation->set_rules('loginPermission', 'Login Permission', 'required');
            $this->form_validation->set_rules('userName', 'User Name', 'required|min_length[6]|max_length[50]|callback_checkBeforeEdit');
            $this->form_validation->set_rules('userEmail', 'User Email', 'required|valid_email');
            $this->form_validation->set_rules('userPhone', 'User Phone', 'required|numeric|min_length[9]|max_length[13]');

            if($this->form_validation->run()) {
                $userId = $this->input->post('userId');
                $permission = $this->input->post('loginPermission');
                $userName = $this->input->post('userName');
                $userEmail = $this->input->post('userEmail');
                $userPhone = $this->input->post('userPhone');

                $input = array('login_permission' => $permission,
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'user_phone' => $userPhone);

                $this->ThanhVienModel->update($userId, $input);
                $this->session->set_flashdata('mess', 'Information edited.');
                redirect(base_url('manager/listUser'));
            }
        }

        $userInfo = $this->ThanhVienModel->get_info($id);
        $data['userId']     = $id;
        $data['permission'] = $userInfo->login_permission;
        $data['userName']   = $userInfo->user_name;
        $data['userEmail']  = $userInfo->user_email;
        $data['userPhone']  = $userInfo->user_phone;

        $this->load->view('manager/index', $data);
    }

    function checkBeforeEdit() {
        $userId     = $this->input->post('userId');
        $userEmail  = $this->input->post('userEmail');
        $userPhone  = $this->input->post('userPhone');
        $whereEmail = array('user_email' => $userEmail,
            'id !=' => $userId);
        $wherePhone = array('user_phone' => $userPhone,
            'id !=' => $userId);
        if ($this->ThanhVienModel->check_exists($whereEmail)) {
            $this->form_validation->set_message('checkBeforeEdit', 'Email existed.');
            return false;
        }
        elseif ($this->ThanhVienModel->check_exists($wherePhone)) {
            $this->form_validation->set_message('checkBeforeEdit', 'Phone number existed.');
            return false;
        }
        else {
            return true;
        }
    }

    function addUser() {
        $data = array();
        $data['main_page'] 	= 'manager/user/addUser';
        $data['tieude']		= 'Add User';

        if ($this->input->post()) {
            $this->form_validation->set_rules('loginName', 'Login Name', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('loginPass', 'Login Password', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('loginPermission', 'Login Permission', 'required');
            $this->form_validation->set_rules('userName', 'User Name', 'required|min_length[6]|max_length[50]|callback_checkBeforeEdit');
            $this->form_validation->set_rules('userEmail', 'User Email', 'required|valid_email');
            $this->form_validation->set_rules('userPhone', 'User Phone', 'required|numeric|min_length[9]|max_length[13]');

            if($this->form_validation->run()) {
                $loginName = $this->input->post('loginName');
                $loginPass = $this->input->post('loginPass');
                $loginPermission = $this->input->post('loginPermission');
                $userName = $this->input->post('userName');
                $userEmail = $this->input->post('userEmail');
                $userPhone = $this->input->post('userPhone');

                $input = array(
                    'login_name' => $loginName,
                    'login_pass' => $loginPass,
                    'login_permission' => $loginPermission,
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'user_phone' => $userPhone);

                $this->ThanhVienModel->create($input);
                $this->session->set_flashdata('mess', 'Add user succeed.');
            }
        }

        $this->load->view('manager/index', $data);
    }
}