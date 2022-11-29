<?php
//database

//database credentials
require_once dirname (__FILE__).'/./db_cred.php';

/**
 *@author David Sampah
 *@version 1.1
 */
class db_connection
{
	//properties
	public $database;
	public $result;

	//connect
	/**
	*Database connection
	*@return bolean
	**/
	function db_connect() {
		//Connect to database
		$this->database = mysqli_connect(SERVERNAME, HOSTNAME, PASSWD, DATABASE);

		//Check if connection is successful
		if(mysqli_connect_errno()) 
			return false;
		else 
			return true;
	}

	//execute a query
	/**
	*Query the Database
	*@param takes a connection and sql query
	*@return bolean
	**/
	function run_query($query) {
		if(!$this->db_connect() || $this->database == null)
			return false;
		$this->result = mysqli_query($this->database, $query);
		if($this->result == false)
			return false;
		else
			return true;
	}

	//execute a query with mysqli real escape string
	//to saveguard from sql injection
	/**
	*Query the Database
	*@param takes a connection and sql query
	*@return bolean
	**/
	
	


	//fetch a data
	/**
	*get select data
	*@return a record
	**/
	function fetch() {
		if($this->result == null || $this->result == false)
			return false;

		return mysqli_fetch_assoc($this->result);
	}


	//fetch all data
	/**
	*get select data
	*@return all record
	**/
	


	//count data
	/**
	*get select data
	*@return a count
	**/
	
	
}
?>