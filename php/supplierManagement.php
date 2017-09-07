<?php


include "database.php";

class supplierManager{


	public function addSupplier($comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo,$creator)
	{
		$Create_time=date("y:m:d:h:m:sa");
		$sql = "INSERT INTO supplier(ComName,Address,ContactPerson,Email,AlibabaSite,Ebsite, Skype, Fax, Phone,Role,OtherInfo,Creator, Create_time) VALUES('$comName','$address','$conPerson','$email','$aliSite','$ebsite','$skype','$fax','$phoneNo','$role','$otherInfo','$creator','$Create_time') ;";
		echo $sql;

		$result = $this->execute($sql);
		return $result;
	}


	public function hintSupplier($term)
	{	
		$variable="%".$term."%";
		$sql = "SELECT ComName FROM supplier WHERE ComName LIKE '$variable';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function listSupplier()
	{
		$sql = "SELECT * FROM supplier ORDER BY ComName DESC;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function getEditInfo($supplierId)
	{
		$sql = "SELECT * FROM supplier WHERE SupplierId = '$supplierId';";
		//$sql = "SELECT * FROM supplier WHERE SupplierId = 2;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function searchSupplier($query,$searchType)
	{
		if($searchType == "KW")
			$sql = "";
		else
			$sql = "SELECT * FROM supplier WHERE ComName = '$query';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function update($supplierId,$comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo)
	{
		$sql = "UPDATE supplier SET ComName = '$comName', Address= '$address', ContactPerson = '$conPerson', Email= '$email', AlibabaSite = '$aliSite', Ebsite = '$ebsite', Skype = '$skype', Fax = '$fax', Phone = '$phoneNo', Role = '$role', OtherInfo = '$otherInfo' WHERE SupplierId = '$supplierId';";
		return $this->execute($sql);
	}

	public function deleteSupplier($supplierId)
	{
		$sql = "DELETE FROM supplier WHERE SupplierId = '$supplierId';";
		return $this->execute($sql);
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

