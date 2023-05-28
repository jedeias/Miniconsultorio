<?php

abstract class Host{
    private $host = "localhost";
    private $userName = "root";
    private $pass = "";
    private $dbName = "clinic";

	public function getHost() {
		return $this->host;
	}
	public function getUserName() {
		return $this->userName;
	}
	public function getPass() {
		return $this->pass;
	}
	public function getDbName() {
		return $this->dbName;
	}
}

?>