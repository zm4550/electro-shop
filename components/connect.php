<?php

$db_database = getenv('SHOP_DB_NAME') ?: 'shop_db';
$pdo_options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false,
];

$configured_host = getenv('SHOP_DB_HOST');
$connection_candidates = $configured_host ? [[
	'host' => $configured_host,
	'port' => getenv('SHOP_DB_PORT') ?: '3306',
	'user' => getenv('SHOP_DB_USER') ?: 'root',
	'password' => getenv('SHOP_DB_PASSWORD') ?: '',
]] : [
	// MAMP defaults on macOS.
	['host' => '127.0.0.1', 'port' => '8889', 'user' => 'root', 'password' => 'root'],
	// XAMPP, Homebrew and standard MySQL defaults.
	['host' => '127.0.0.1', 'port' => '3306', 'user' => 'root', 'password' => ''],
	['host' => '127.0.0.1', 'port' => '3306', 'user' => 'root', 'password' => 'root'],
];

$conn = null;
$last_exception = null;
foreach($connection_candidates as $database_config){
	try {
		$server_dsn = "mysql:host={$database_config['host']};port={$database_config['port']};charset=utf8mb4";
		$server = new PDO($server_dsn, $database_config['user'], $database_config['password'], $pdo_options);
		$server->exec("CREATE DATABASE IF NOT EXISTS `{$db_database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
		$database_dsn = $server_dsn . ";dbname={$db_database}";
		$conn = new PDO($database_dsn, $database_config['user'], $database_config['password'], $pdo_options);
		break;
	} catch (PDOException $exception) {
		$last_exception = $exception;
	}
}

if(!$conn){
	error_log($last_exception ? $last_exception->getMessage() : 'No database connection configuration was available.');
	http_response_code(500);
	exit('Database connection failed. Start MySQL and verify the settings in components/connect.php.');
}

// Keep databases imported from older project versions compatible.
$products_table_exists = $conn->query("SHOW TABLES LIKE 'products'")->fetchColumn();
if($products_table_exists){
	$category_column_exists = $conn->query("SHOW COLUMNS FROM `products` LIKE 'category'")->fetchColumn();
	if(!$category_column_exists){
		$conn->exec("ALTER TABLE `products` ADD COLUMN `category` varchar(50) NOT NULL DEFAULT 'uncategorized' AFTER `name`");
	}
}

?>