<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/26/2018
 * Time: 4:00 PM
 */
function giaodien_url($url = '') {
	$string = base_url() . 'giaodien/' . $url;
	return $string;
}