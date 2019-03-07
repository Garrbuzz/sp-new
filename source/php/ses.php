<?php 
session_start();
	
if (isset($_SESSION['user'])){
		$r = true;
	} else{
		$r = false;
	}
	$res = json_encode($r);
		echo $res;

	
?>