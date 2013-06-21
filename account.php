<?php

require('config.ini.php');

// get http method used
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET') {
	$accountId 	 = $_GET['accountId'];
	$results = DB::query('SELECT * FROM accounts WHERE acc_id=%s', $accountId);
	echo json_encode(array('message' => 'OK', 'data' => $results));
} elseif($method == 'PUT') {
	$accountId = $_GET['accountId'];
	$name = $_GET['name'];
	$data = array('acc_id' => $accountId, 'acc_name' => $name);
	try {
		DB::update('accounts', $data);
		echo json_encode(array('message' => 'OK', 'data' => $data));
	} catch(exception $e) {
		echo json_encode(array('message' => 'NOK'));
	}
} elseif($method == 'POST') {
	$name = $_GET['name'];
	$data = array('acc_name' => $name);
	try {
		DB::insert('accounts', $data);
		$data['acc_id'] = DB::insertId();
		echo json_encode(array('message' => 'OK', 'data' => $data));
	} catch(exception $e) {
		echo json_encode(array('message' => 'NOK'));
	}
}


?>