<?php
require('config/config.php');

$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
	echo mysqli_error($db);
	die();
}
?>