<?php

if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
		createPool();
		break;
		case 2:
		viewAllPools();
		break;
		case 3: 
		getOnePool();
		break;
		case 4:
		joinPool();
		break;
		case 5:
		getPoolMembers();
		break;
		case 6:
		getSession();
		break;
		case 7:
		getUserPools();
		break;
		default:
		echo "wrong command";
		break;
	}
}

function createPool(){
	$destination= $_REQUEST['destination'];
	$dateTime= $_REQUEST['dateTime'];
	$numbPoolers= $_REQUEST['numbPoolers'];
	$cost= $_REQUEST['cost'];
	$ownerid= $_REQUEST['owner'];
	include_once("pool.php");
	$pool = new pool();
	$row = $pool->addNewPool($destination, $ownerid, $dateTime, $numbPoolers, $cost);
	if($row==false){
		echo '{"result":0,"message":"error creating pool"}';

	}
	else{
		echo '{"result":1,"message":"pool successfully created"}';
	}
}

function viewAllPools(){
	include_once("pool.php");
	$pool = new pool();
	$row = $pool->getPools();
	if($row==false){
		echo '{"result":0,"message":"no pools found"}';
	}
	else{
		$result=$pool->fetch();
		if($result==false){
			echo '{"result":0,"message":"Error retrieving pools"}';
		}
		else{
			echo '{"result":1,"pool":[';
			while($result){
				echo json_encode($result);

				$result=$pool->fetch();
				if($result!=false){
					echo ",";
				}
			}
			echo "]}";
		}

	}

}
function getUserPools(){
	include_once("pool.php");
	$userID= $_REQUEST['id'];
	
	$pool = new pool();
	$row = $pool->usersPools($userID);
	if($row==false){
		echo '{"result":0,"message":"Pools not found"}';
	}
	else{
		$result=$pool->fetch();
		if($result==false){
			echo '{"result":0,"message":"Error retrieving your pools"}';
		}
		else{
			echo '{"result":1,"pool":[';
			while($result){
				echo json_encode($result);

				$result=$pool->fetch();
				if($result!=false){
					echo ",";
				}
			}
			echo "]}";
		}

	}
}

function getOnePool(){
	include_once("pool.php");
	$poolID= $_REQUEST['poolid'];
	//$ownerID= $_REQUEST['ownerid'];
	$pool = new pool();
	//$row = $pool->getPoolInfo($poolID, $ownerID);
	$row = $pool->getPoolInfo($poolID);
	if($row==false){
		echo '{"result":0,"message":"Pool not found"}';
	}
	else{
		$result=$pool->fetch();
		if($result==false){
			echo '{"result":0,"message":"Error retrieving pool"}';
		}
		else{
			echo '{"result":1,"pool":';
			echo json_encode($result);
			echo "}";
		}

	}

}

function joinPool(){
	include_once("joinPool.php");
	include_once("pool.php");
	$poolID = $_REQUEST['poolid'];
	$memberID = $_REQUEST['memberid'];
	$modeOfPayment = $_REQUEST['payment'];
	// $pool = new pool();
	// $poolRow = $pool->getPoolI
	$joinPool = new joinPool();
	$row = $joinPool->addNewMember($poolID, $memberID, $modeOfPayment);
	if($row==false){
		echo '{"result":0,"message":"error joining pool"}';

	}
	else{
		echo '{"result":1,"message":"You have successfully joined the pool"}';
	}
}

function getPoolMembers(){
	include_once("joinPool.php");
	$poolID= $_REQUEST['poolid'];
	
	$joinPool = new joinPool();
	$row = $joinPool->getPoolMembers($poolID);
	if($row==false){
		echo '{"result":0,"message":"Pool not found"}';
	}
	else{
		$result=$joinPool->fetch();
		if($result==false){
			echo '{"result":0,"message":"Error retrieving pool members"}';
		}
		else{
			echo '{"result":1,"member":[';
			while($result){
				echo json_encode($result);

				$result=$joinPool->fetch();
				if($result!=false){
					echo ",";
				}
			}
			echo "]}";
		}

	}
}

function getSession(){
	session_start();
	if(!isset($_SESSION['USER'])){
		echo '{"result":0,"message":"User not logged in"}';
	}
	else{
		echo '{"result":1,"user":';
		echo json_encode($_SESSION['USER']);
		echo "}";
		//var_dump($_SESSION['USER']);
	}
}





?>
