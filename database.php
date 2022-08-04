<?php

class Database{	

	protected $localhost = "localhost";
	protected $servername = "root";
	protected $password = "";
	protected $database = "oop";
	public $con;	
	

	public function connection(){
	    // Create connection
	    $this->con = new mysqli($this->localhost, $this->servername, $this->password, $this->database);
	    // Check connection
	    if ($this->con->connect_error) {
		die("Connection failed: " . $this->con->connect_error);
	    }
	    return $this->con;
	}


}