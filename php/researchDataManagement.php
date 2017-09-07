<?php

class researchDataManager
{
	
	public function addResearchData($productId,$name,$indcost,$QTY,$sampleCost,$addUnitPrice,$fba,$totalCost,$estProfit,$Life_cycle,$otherInfo)
	{
		$sql = "INSERT INTO research_result(ResultId,productName,indcost,QTY,sampleCost,addUnitPrice,FBA_fees,totalCost,estProfit,life_cycle,OtherInfo) VALUES('$productId','$name','$indcost','$QTY','$sampleCost','$addUnitPrice','$fba','$totalCost','$estProfit','$Life_cycle','$otherInfo');";
		echo $sql;
		return $this->execute($sql);
	}

	public function listData()
	{
		$sql = "SELECT * FROM research_result;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function deleteData($id)
	{
		$sql = "DELETE FROM research_result WHERE ResultId = '$id'; ";

		if($this->execute($sql))
		{	
			$sql = "DELETE FROM main_kw WHERE Product_id = '$id'; ";
			if($this->execute($sql))
			{
				$sql = "DELETE FROM other_kw WHERE Product_id = '$id'; ";
				if($this->execute($sql))
				{
					$sql = "DELETE FROM product WHERE id = '$id'; ";
					return $this->execute($sql);
				}
			}
		}

		return false;
	}

	public function getResearchData($id)
	{
		$sql = "SELECT * FROM research_result WHERE ResultId = '$id'";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function quickSearch($id)
	{	

	/*	$sql = "SELECT *
FROM research_result INNER JOIN main_kw ON research_result.ResultId = main_kw.Product_id INNER JOIN other_kw ON research_result.ResultId = main_kw.Product_id WHERE main_kw.Kw_id = '$id' OR other_kw.Kw_id = '$id';";
return $sql;*/
		$keywordList = $this->searchKWList($id);

		$final = [];
		$j =0;
		for($i = 0;$i < count($keywordList);$i++)
		{
			$kw = $keywordList[$i];
			$sql = "SELECT * FROM research_result WHERE ResultId = '$kw'; ";
			$result = $this->execute($sql);
			$temp = $this->get_data($result);

			if(count($temp) !=0)
			{	
				$final[$j] = $temp[0];
				$j++;		
			}
			
		}

		return $final;
	}

	private function searchKWList($kwId)
	{
		$sql = "SELECT Product_id FROM main_kw WHERE Kw_id = '$kwId';";
		$list = $this->execute($sql);
		$result = $this->get_data($list);
		
		$sql = "SELECT Product_id FROM other_kw WHERE Kw_id = '$kwId';";
		$list = $this->execute($sql);
		$otherKwList = $this->get_data($list);
		$re =[];

		$len = count($result);
		for ($i =0;$i<$len;$i++)
			$re[$i]=$result[$i]["Product_id"];

		$len = count($otherKwList);
		for ($j =0;$j<$len;$j++)
		{
			$re[$i]=$otherKwList[$j]["Product_id"];
			$i++;
		}
		return array_unique($re);

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