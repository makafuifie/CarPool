<?php 
include_once("dbConnect.php");

class joinPool extends dbConnect{
	function addNewMember($poolID, $memberID, $modeOfPayment){
		$strQuery = "insert into joinPool set
		poolID = '$poolID',
		memberID = '$memberID',
		modeOfPayment = '$modeOfPayment'";
		echo $strQuery;
		return $this->query($strQuery); 


	}

	function getPoolMembers($poolID){
		$strQuery= "select joinPool.poolID, joinPool.memberID,joinPool.modeOfPayment, CarPoolMembers.firstname as firstname, CarPoolMembers.lastname as lastname, pool.destination from  joinPool left join  CarPoolMembers on CarPoolMembers.memberID = joinPool.memberID left join pool on pool.poolID = joinPool.poolID";

			//pool stuff should be different from getting members
		//echo $strQuery;
		return $this->query($strQuery); 
	}
}

?>