<?php

require_once '../config/db_config.php';

 class Database {
 	private $host;
 	private $username;
 	private $password;
 	private $database;
 	public $conn;

 	public function __construct(){
 		$this->host =  DB_HOST;
 		$this->username = DB_USER;
 		$this->password = DB_PASSWORD;
 		$this->database = DB_NAME;
 		
 		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
 		if($this->conn->connect_error){
 			die("Connection failed: " . $this->conn->connect_error);
 		}
 	}
 	public function query($sql){
 		return $this->conn->query($sql);
 	}
 }

