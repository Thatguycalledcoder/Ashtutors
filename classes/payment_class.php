<?php
//connect to database class
require_once dirname (__FILE__)."/../settings/db_class.php";


class Payment_class extends db_connection
{
	//--INSERT--//
	/**
	*Register a student
	*@param takes a contact name, email, password, country, city, contact, image
	*@return boolean
	**/
	function addPayment($amount, $currency, $bookhist_id, $student_id, $tutor_id, $payment_date) {
		$sql = "INSERT INTO payment(amount, currency, bookhist_id, student_id, tutor_id, payment_date) 
				VALUES('$amount', '$currency', '$bookhist_id', '$student_id', '$tutor_id', '$payment_date')";
		return $this->run_query($sql);
	}


	//--SELECT--//
	
	
	//--UPDATE--//
	function updatePayment($amount, $bookhist_id, $student_id, $tutor_id, $payment_date) {
		$sql = "UPDATE payment SET amount = '$amount' AND payment_date = '$payment_date'";
		return $this->run_query($sql);
	}
	

	//--DELETE--//
	
}	

?>