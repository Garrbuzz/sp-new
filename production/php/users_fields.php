<?php
include 'functions.php';
$j = @file_get_contents('users.json');
echo $j;
?>