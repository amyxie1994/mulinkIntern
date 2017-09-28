<?php

include "competitorManagement.php";


$type=$_POST['type'];

	
switch ($type) {

	case "addCompetitor": 
		addCompetitor();
	break;

	case "getCompetitorData":
		$result = getCompetitorData();
		echo json_encode($result);
	break;

	case "deleteCompetitor":
		$result = deleteCompetitor();
		echo json_encode($result);
	break;

	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
	break;
}

function deleteCompetitor()
{
	$id = $_POST["id"];
	$competitorManager = new competitorManager();
	if($competitorManager->deleteCompetitor($id))
		return "Delete Successfully!";
	else
		return "Delete Fail, Please try again!";
}

function getCompetitorData()
{
	$id = $_POST["id"];
	$competitorManager = new competitorManager();
	return $competitorManager->getCompetitorData($id);
}

function addCompetitor()
{
	$competitorManager = new competitorManager();
	$BrandName = $_POST["BrandName"];
	$BSR = $_POST["BSR"];
	$Sales = $_POST["Sales"];
	
	$Size = $_POST["Size"];
	$LaunchDay = $_POST["LaunchDay"];
	$Link = $_POST["Link"];
	$Review= $_POST["Review"];
	$Pros = $_POST["Strength"];
	$Cons = $_POST["Weakness"];
	$ResultId = $_POST["reDataId"];
	$competitorManager->addCompetitor($BrandName,$BSR,$Sales,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons,$ResultId);
		
	header('Location: ../addCompetitorAnalysis.php?id='.$ResultId);
}


?>