<?php 
include_once("dbConnect.php");

class pool extends dbConnect{
	function addNewPool($destination, $dateTime, $numbPoolers, $cost){
		$strQuery = "insert into pool set
		poolTime = '$dateTime',
		numberNeeded = $numbPoolers,
		amount = $cost,
		enableJoin = 1,
		
		destination='$destination'
		";
		//echo $strQuery;
		return $this->query($strQuery); 


	}

	function getPools(){
		$strQuery = "select pool.poolID, pool.poolOwner, pool.poolTime, pool.destination, pool.amount, pool.enableJoin, pool.numberNeeded from pool";
		return $this->query($strQuery); 
	}

	function getPoolInfo($id){
		$strQuery = "select pool.poolOwner, pool.amount, pool.destination, pool.poolTime, pool.enableJoin, pool.numberNeeded from pool where poolID=$id"; 	
		echo $strQuery;
		return $this->query($strQuery); 	

	}
}





?>