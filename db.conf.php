<?
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','shop');
define('DB_USER','root');
define('DB_PASS','');

try
{
    $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
    $db = new PDO($connect_str,DB_USER,DB_PASS);
}
catch(PDOException $e) {die("Error: ".$e->getMessage());}

