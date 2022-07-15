<?php 

$host 	= 'localhost';
$acc 	= 'root';
$pass 	= '';
$dbname = 'BKSNet';
$port 	= 3306;

class database{
	public $conn;

	public function __construct(){
		$this->connect();
	}
	public function __destruct(){
		$this->disconnect();
	}

	public function connect($host='localhost', $acc='root', $pass='', $dbname='BKSNet', $port=3306){
		try{
			$this->conn = new mysqli($host, $acc, $pass, $dbname, $port);
		} catch (Exception $e){
			echo $e->getMessage();
		}
		return $this->conn;
	}

	public function disconnect(){
		$this->conn = null;
	}

	public function query($query){
		try{
			$res = $this->conn->query($query);
			return $res;
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

}


?>


