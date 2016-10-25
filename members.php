<?php 
	include_once("dbConnect.php");

	class members extends dbConnect{
		function addNewMember($firstname, $lastname, $email, $password, $phone){
			$strQuery = "insert into CarPoolMembers set
			 firstname = '$firstname',
			 lastname = '$lastname',
			 email = '$email',
			 password = MD5('$password'),
			 phoneNumber = '$phone";
			return $this->query($strQuery); 


		}

		function login($email, $password){
			$strQuery  ="Select * from CarPoolMembers where 
			password=md5('$password') and email = '$email'";
			return $this->query($strQuery); 
		}
	}

?>