<?php 
	include_once("dbConnect.php");

	class members extends dbConnect{
		function addNewMember($firstname, $lastname, $email, $password, $phone){
			$strQuery = "insert into carpoolmembers set
			 firstname = '$firstname',
			 lastname = '$lastname',
			 email = '$email',
			 password = '$password',
			 phoneNumber = '$phone'";
			 //echo $strQuery;
			return $this->query($strQuery); 


		}

		function login($email, $password){
			$strQuery  ="Select * from carpoolmembers where 
			password='$password' and email = '$email'";
			//echo $strQuery;
			return $this->query($strQuery); 
		}
	}

?>