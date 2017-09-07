<?php

include "productManagement.php";
include "researchDataManagement.php";
include "keywordManagement.php";
include "functions.php";

$type=$_POST['type'];

	
switch ($type) {

	case "listResearchData":
		$result = listData();
		echo json_encode($result);
		break;

	case "addResearchData":
		addResearchData();		
		break;

	case "deleteResearchData":
		$Message = deleteData();
		echo json_encode($Message);
		break;
	case "QsearchData":
		$result = quickSearchData();
		echo json_encode($result);
		break;

	case "getResearchData":
		$result = getResearchData();
		echo json_encode($result);
		break;
	
	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
		break;
}

function getResearchData()
{
	$id = $_POST["id"];
	$reDataManager = new researchDataManager();

	return $reDataManager->getResearchData($id);
}

function quickSearchData()
{	

	$query = $_POST["query"];
	$reDataManager = new researchDataManager();

	return $reDataManager->quickSearch(getKwId($query));
}

function deleteData()
{
	$id = $_POST["query"];
	$reDataManager = new researchDataManager();

	if($reDataManager->deleteData($id))
		return "Delete Successfully!";
	else
		return "Delete operation fail, please try again!";
}

function listData()
{
	$reDataManager = new researchDataManager();
	return $reDataManager->listData();
}

function addResearchData()
{

	$name= $_POST["proName"];
	$indcost= $_POST["indcost"];
	$QTY= $_POST["QTY"];
	$sampleCost= $_POST["sampleCost"];
	$addUnitPrice= $_POST["addUnitPrice"];
	$fba= $_POST["fba"];
	$totalCost= $_POST["totalCost"];
	$estProfit= $_POST["estProfit"];
	$Life_cycle= $_POST["Life_cycle"];
	$otherInfo= $_POST["otherInfo"];

	
	
	$productManager = new productManager();
	$productId = $productManager->addProductName($name);



	if($productId!=0)
	{	
		$reDataManager = new researchDataManager();	
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($productId,$mainKw,$otherKw);
		
		if($reDataManager->addResearchData($productId,$name,$indcost,$QTY,$sampleCost,$addUnitPrice,$fba,$totalCost,$estProfit,$Life_cycle,$otherInfo))
			echo "<script>
			alert('Add Successfully!');
			</script>";
		else
			echo "<script>
			alert('Add Product into qutation failed, Please try again later!');
			location.reload();
			</script>";
	}
	else
	{ 
		echo "<script>
		alert('Add Product into qutation failed, Please try again later!');
		location.reload();
		</script>";
	}
	
}





?>