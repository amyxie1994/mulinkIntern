<?php
include_once "database.php";


class sourceManager
{


/**********Register*******************************************/

	public function addSource($SourceName,$Creator)
	{	
		$sql = "INSERT INTO source(SourceName,Creator) VALUES('$SourceName','$Creator');";

		$result = $this->execute($sql);
		return $result;
	}

	public function getSourceList()
	{
		$sql = "SELECT * FROM source;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function deleteSource($id)
	{
		$sql = "DELETE FROM source WHERE Id = '$id';";
		return $this->execute($sql);

	}
/**********Edit****************************************/	
	
	public function get_userInfo($user_id)
	{
		$sql = "SELECT * FROM user WHERE UserID = '$user_id';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function get_info_basedOnName($username)
	{
		$sql = "SELECT * FROM user WHERE Username = '$username';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function update_user($user_id,$username,$password,$add_supOrPro,$add_ReData,$vOrS_a_sudata,$vOrS_o_sudata,$vOrS_a_redata,$vOrS_o_redata)
	{
		$sql = "UPDATE user SET Username ='$username',Password ='$password',add_Supplier = '$add_Supplier',add_ReData = '$add_ReData',vOrS_a_sudata = '$vOrS_a_sudata',vOrS_o_sudata = '$vOrS_o_sudata',vOrS_a_redata= '$vOrS_a_redata',vOrS_o_redata= '$vOrS_o_redata' WHERE UserID = '$user_id';";
		

		$result = $this->execute($sql);
		//echo $result;
		return $result;
	}

/**********Execute****************************************/	
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