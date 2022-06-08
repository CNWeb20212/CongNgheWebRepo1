<?php
class Model extends SQLQuery {
	protected $_model;

	function __construct() {

		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_table = "items";
	}

	function __destruct() {
	}
}
