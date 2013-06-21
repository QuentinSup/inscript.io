<?php

require('config.ini.php');

// get http method used
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET') {
	$feed 	 = $_GET['name'];
	$results = DB::query('SELECT * FROM feeds WHERE fed_name=%s', $feed);
	echo json_encode(array('message' => 'OK', 'data' => $results));
} elseif($method == 'POST') {
	$feed = $_GET['name'];
	$data = array('fed_name' => $feed);
	try {
		DB::insert('feeds', $data);
		$data['fed_id'] = DB::insertId();
		echo json_encode(array('message' => 'OK', 'data' => $data));
	} catch(exception $e) {
		echo json_encode(array('message' => 'NOK'));
	}
}


?>