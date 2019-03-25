<?php
	function setConnect($user, $pass){
		$host = 'localhost';
	    $db   = 'sptraining';
	    $charset = 'utf8';
	    // $user = 'root';
	    // $pass = '';

	    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	    $opt = [
	        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	        PDO::ATTR_EMULATE_PREPARES   => false,
	    ];
	    $pdo = new PDO($dsn, $user, $pass, $opt);
	    return ($pdo);
	}
	
?>