<?php

include "database.php";

class productManager{

	public function getNameHint($query)
	{

		$variable="%".$query."%";
		$sql = "SELECT MIN(id) as id, ProductName FROM product WHERE ProductName LIKE '$variable' GROUP BY ProductName;";
		$result = $this->execute($sql);
		return $this->get_data($result);
		//$name_hint = $this->get_data($result);
	}

	public function updateImgNum($id,$num)
	{
		$sql = "UPDATE product_info SET imgNum = '$num' WHERE ProductId = '$id';";
		return $this->execute($sql);
	}



	public function getMainKW($productID)
	{

		$sql = "SELECT Keyword FROM keyword INNER JOIN Main_kw ON keyword.KwId = Main_kw.Kw_id WHERE Main_kw.Product_id = '$productID' ;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function getOtherKW($productID)
	{

		$sql = "SELECT Keyword FROM keyword INNER JOIN Other_kw ON keyword.KwId = Other_kw.Kw_id WHERE Other_kw.Product_id = '$productID' ;";
		$result = $this->execute($sql);
		//return $this->get_data($result);
		return $this->get_data($result);
	}


	public function addProduct($name,$SupplierId,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo,$Res_Mark)
	{	
		
		$ProductId = $this->addProductName($name);

		$sql = "INSERT INTO product_info(ProductId,ProductName,Craft,ProductSize,Price,Size,ProductionLt,OtherInfo,SampleLt,CartonSize,Model,SupplierId,QTY,Packing,Res_Mark) VALUES('$ProductId','$name','$Craft','$Psize','$Price','$Size','$PLt','$OtherInfo','$STime','$SampleSize','$Model','$SupplierId','$QTY','$Packing','$Res_Mark');";
		
		if($this->execute($sql))
		{	
			return $ProductId;
		}
		else
			return 0;

	}

	/*public function getProductInfoByKW($keywordList)
	{	
		for($i = 0;$i<count($keywordList);$i++)
		{
			$sql = "";
		}
		return $keywordList;
	}*/


	public function getProductInfo($list)
	{	
		$result = [];
		for($i=0,$j=0;$i<count($list);$i++)
		{
			$sql = "SELECT * FROM product_info  INNER JOIN supplier ON supplier.SupplierId = product_info.SupplierId WHERE product_info.ProductId= '$list[$i]';";
			$source = $this->execute($sql);
			$data = $this->get_data($source);
			if(count($data)>0)
			{
				$result[$j] = $data[0];
				$j++;
			}

		}
		return $result;

	}

	public function addProductName($name)
	{
		$sql = "INSERT INTO product(ProductName) VALUES('$name');";
		if($this->execute($sql))
		{	
			
			$db = new Db();

		return $db->connect()->insert_id;
		}
		else
			return 0;
	}

	public function deleteProduct($productId)
	{
		$sql = "DELETE FROM product_info WHERE ProductId = '$productId';";
		if($this->execute($sql))
		{
			$sql = "DELETE FROM main_kw WHERE Product_id = '$productId';";
			if($this->execute($sql))
			{
				$sql = "DELETE FROM other_kw WHERE Product_id = '$productId';";
				$result = $this->execute($sql);
				$sql = "DELETE FROM product WHERE Product_id = '$productId';";
				return $this->execute($sql);

			}
			else
				return 0;
		}
		else
			return 0;
	}


	public function productList($SupplierId)
	{
		$sql = "SELECT * FROM product_info WHERE SupplierId = '$SupplierId';";
		$result = $this->execute($sql);
		return $this->get_data($result);
		
	}

	public function showProduct($productId)
	{
		$sql = "SELECT * FROM product_info WHERE ProductId = '$productId';";
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