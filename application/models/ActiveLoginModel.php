<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/23/2018
 * Time: 12:09 PM
 */

class ActiveLoginModel extends MyModel {
    function __construct()
    {
        parent::__construct();
        $this->table = "login_active";
    }

    function registerMail($userEmail = '', $userName = '', $activeCode = '') {
        // Config sent email
        $this->email->set_newline("\r\n");
        $this->email->from('ledongdotkich005@gmail.com', 'Administrator (sanchoigamethu.com)');
        $this->email->to($userEmail);
        $this->email->subject('Confirm register in sanchoigamethu.com');

        $emailName = substr($userEmail, 0, -10);
        echo $userEmail . ' _ ' . $emailName . ' _ ' . $userName . ' _ ' . $activeCode;

        $this->email->message(
            '<h3>Please click this link to active your account</h3><br>'.
            '<p>Hello '. $userName .', if you not create this account, just remove this email.</p>'.
            '<p>If not, click this link to verify your account: </p>'.
            '<a href="http://sanchoigamethu.com/verify_account/'. $emailName .'/'. $activeCode .'">'.
            'http://sanchoigamethu.com/verify_account/'. $emailName .'/'. $activeCode .
            '</a>'
        );
    }

    function rand_string( $length = 10 ) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $size = strlen( $chars );
        $returnString = '';

        for( $i = 0; $i < $length; $i++ ) {
            $str= $chars[ rand( 0, $size - 1 ) ];
            $returnString = $returnString.$str;
        }
        return $returnString;
    }

    function checkActiveCode($where = array()) {
        $resultList = $this->get_info_rule($where);
        foreach ($resultList as $row) {
            return true;
        }
        return false;
    }

    function activeAccount($email = '') {
        $user = $this->getActiveInfo('user_email', $email);
        $this->delete($user->id);
    }

    function getActiveInfo($columnName = '', $loginName = '') {
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
}