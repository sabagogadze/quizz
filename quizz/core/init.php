<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'quiz';

	$db = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
	mysqli_set_charset($db,"utf8");
    
    if (mysqli_connect_errno()) {
        echo 'database connection failed with following errors: '.mysqli_connect_error();
        die();

};


	
 ?>