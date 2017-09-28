<?php
include "database.php";

class competitorManager
{
	
	public function addCompetitor($BrandName,$BSR,$Sales,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons,$ResultId)
	{
		$Create_time=date("y:m:d:h:m:sa");
		$sql = "INSERT INTO competitor_analysis(BrandName,BSR,Sales,Size,LaunchDay,Link,Review,Pros,Cons,ResultId,Create_time) VALUES('$BrandName','$BSR','$Sales','$Size','$LaunchDay','$Link','$Review','$Pros','$Cons','$ResultId','$Create_time');";

	 
		return $this->execute($sql);
	}

	public function deleteCompetitor($id)
	{
		$sql = "DELETE FROM competitor_analysis WHERE Id ='$id'; ";
		return $this->execute($sql);
	}

	public function getCompetitorData($id)
	{
		$sql = "SELECT * FROM competitor_analysis WHERE ResultId = '$id';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	private function execute($sql)
	{
		$db = new Db();
		$result = $db->query($sql);
		return $result;
	}

	private function get_data($source)
	{
		$db = new Db();
		$result = $db->fetch_data($source);
		return $result;
	}
}


?>