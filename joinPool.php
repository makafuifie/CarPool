<?php 
	include_once("dbConnect.php");

	class joinPool extends dbConnect{
		function addNewMember($poolID, $memberID){
			$strQuery = "insert into carpoolmembers set
			 firstname = '$firstname',
			 lastname = '$lastname',
			 email = '$email',
			 password = '$password',
			 phoneNumber = '$phone'";
			 //echo $strQuery;
			return $this->query($strQuery); 


		}

		function getPoolMembers($joinID){
			$strQuery= "select pool.poolID, pool.poolOwner, pool.destination, 
			.LASTNAME,
			GENDER, students.EMAIL, students.PHONENUMBER, HEIGHT, WEIGHT, BLOODTYPE,
			emergencycontact.FIRSTNAME as CONTACTFIRSTNAME, emergencycontact.LASTNAME as CONTACTLASTNAME
			from students left join studentHasRecord on students.STUDENTID= studentHasRecord.STUDENTID left join emergencycontact on
			students.EMERGENCYCONTACTID= emergencycontact.CONTACTID";

			//pool stuff should be different from getting members

		}
	}

?>