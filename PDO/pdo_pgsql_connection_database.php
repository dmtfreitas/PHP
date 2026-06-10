<?php

$host = '127.0.0.1';
$port = 5432;
$database = 'postgres';

$dsn = "pgsql:host=$host;port=$port;dbname=$database";

$user = 'postgres';
$password = 'postgres';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
	new PDO($dsn, $user, $password, $options);
	echo 'Connected PDO pgsql in database successful!';
} catch (PDOException $Error) {
	echo 'Error: ' . $Error->getMessage();
}

?>