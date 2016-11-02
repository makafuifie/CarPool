<?php 
include_once("dbConnect.php");

class news extends dbConnect{
	function addNewItem($poolID, $memberID, $newsItem){
		$strQuery = "insert into news set
		poolID = '$poolID',
		memberid = '$memberID',
		newsItem = '$newsItem'";
		//echo $strQuery;
		return $this->query($strQuery); 


	}

	function getNewsItems($poolID){
		$strQuery= "select news.poolID, news.memberid,news.newsItem, CarPoolMembers.firstname as firstname, CarPoolMembers.lastname as lastname, news.newsTime, pool.destination from  news left join  CarPoolMembers on CarPoolMembers.memberID = news.memberid left join pool on pool.poolID = news.poolID where news.poolID=$poolID";

			
		//echo $strQuery;
		return $this->query($strQuery); 
	}
}

?>