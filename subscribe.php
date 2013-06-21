<?php

require('config.ini.php');

// get http method used
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET') {
	$feedId  = $_GET['feedId'];
	$results = DB::query('SELECT accounts.* FROM subscribes, accounts WHERE sub_acc_id = acc_id AND sub_fed_id=%s', $feedId);
	echo json_encode(array('message' => 'OK', 'data' => $results));
} elseif($method == 'POST') {
	$feedId = $_GET['feedId'];
	$accountId = $_GET['accountId'];
	$data = array('sub_fed_id' => $feedId, 'sub_acc_id' => $accountId);
	try {
		DB::insert('subscribes', $data);
		$data['sub_id'] = DB::insertId();
		echo json_encode(array('message' => 'OK', 'data' => $data));
	} catch(exception $e) {
		echo json_encode(array('message' => 'NOK'));
	}
}


?>