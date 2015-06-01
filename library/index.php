<?php
$config = parse_ini_file('config/db.ini');
//var_dump($config);
$db = mysqli_connect($config['host'],
					$config['user'],
					$config['password'],
					$config['db_name'])
	or die("Error".mysqli_error($db));
$result = mysqli_query($db,'SELECT * FROM user');
while($row=mysqli_fetch_assoc($result)){
	var_dump($row);
}