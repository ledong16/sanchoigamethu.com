<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 3:54 PM
 */

require APPPATH.'core/MyModel.php';

class ThanhVienModel extends MyModel {
	function __construct()
	{
		parent::__construct();
		$this->table = 'login';
	}

	function checkActiveUser($where = array()) {
        $this->db->where($where);
        $query = $this->db->get($this->table, 1);
        $result = $query->result();
        foreach ($result as $row) {
            echo $row->active;
            return $row->active;
        }
        return false;
    }

    function activeAccount($email = '') {
	    $user = $this->getUserInfo('user_email', $email.'@gmail.com');
        $input = array('active' => true);

        $this->update($user->id, $input);
    }

    function getUserInfo($columnName = '', $loginName = '') {
	    $where = array($columnName => $loginName);
        $this->db->where($where);
        $query = $this->db->get($this->table, 1);
        $result = $query->result();
        $rowReturn = array();
        foreach ($result as $row) {
            $rowReturn = $row;
            break;
        }
        return $rowReturn;
    }

    function sendEmail($userEmail = '') {

        // Get user info
        $userInfo = $this->ThanhVienModel->getUserInfo('user_email', $userEmail);
        if ($userInfo->active == true) {
            $active = "Active";
        }
        else {
            $active = "Not active";
        }

        // Config sent email
        $this->email->set_newline("\r\n");
        $this->email->from('ledongdotkich005@gmail.com', 'Administrator (sanchoigamethu.com)');
        $this->email->to($userEmail);
        $this->email->subject('Here is your account');
        $this->email->message(
            '<h3>Do not reply to this email.</h3><br>'.
            '<p>Hello '. $userInfo->user_name .', here is your account information</p>'.
            '<table>
                <tr>
                    <td><strong>Login name:</strong></td>
                    <td> ' . $userInfo->login_name . '</td>
                </tr>
                <tr>
                    <td><strong>Login password:</strong></td>
                    <td> ' . $userInfo->login_pass . '</td>
                </tr>
                <tr>
                     <td><strong>Active status:</strong></td>    
                     <td> '. $active .'</td>       
                </tr>
             </table>'
        );
    }
}
