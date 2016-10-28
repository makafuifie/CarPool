<?php 
include_once("dbConnect.php");

class pool extends dbConnect{
	function addNewPool($destination, $owner, $dateTime, $numbPoolers, $cost){
		$strQuery = "insert into pool set
		poolTime = '$dateTime',
		poolOwner = $owner,
		numberNeeded = $numbPoolers,
		amount = $cost,
		enableJoin = 1,
		
		destination='$destination'
		";
		//echo $strQuery;
		return $this->query($strQuery); 


	}

	function getPools($filter=false){
		$strQuery = "select pool.poolID, pool.poolOwner, pool.poolTime, pool.destination, pool.amount, pool.enableJoin, pool.numberNeeded from pool where pool.enableJoin=1";
		if($filter!=false){
				$strQuery=$strQuery . " where $filter";
			}
		return $this->query($strQuery); 
	}

	function getPoolInfo($id){
		$strQuery = "select pool.poolOwner, pool.amount, pool.destination, pool.poolTime, pool.enableJoin, pool.numberNeeded, CarPoolMembers.firstname as firstname, CarPoolMembers.lastname as lastname from pool left join CarPoolMembers on pool.poolOwner = CarPoolMembers.memberid where poolID=$id";
		//and CarPoolMembers.memberid=$owner 	
		//echo $strQuery;
		return $this->query($strQuery); 	
		// left join CarPoolMembers on pool.poolOwner = CarPoolMembers.memberid
	}

	function usersPools($userid){
		$strQuery = "select poolID, poolOwner, poolTime, destination, amount, enableJoin, numberNeeded from pool where pool.enableJoin=1 and pool.poolOwner=$userid";

		// $strQuery = "select pool.poolID, pool.poolOwner, pool.poolTime, pool.destination, pool.amount, pool.enableJoin, pool.numberNeeded, joinPool.memberID from pool left join joinPool on joinPool.poolID=pool.poolID where pool.enableJoin=1 and pool.poolOwner=$userid";

		return $this->query($strQuery);
	}
}





?>