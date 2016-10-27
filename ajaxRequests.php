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
	
	include_once("pool.php");
	$pool = new pool();
	$row = $pool->addNewPool($destination, $dateTime, $numbPoolers, $cost);
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

function getOnePool(){
	include_once("pool.php");
	$poolID= $_REQUEST['id'];
	$pool = new pool();
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





?>
