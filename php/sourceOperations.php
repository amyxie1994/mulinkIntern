<?php


include "sourceManagement.php";


$type=$_POST['type'];
//echo json_encode($type);
	
switch ($type) {

	case "addSource":
		addSource();
		break;

	case "getSourceList":
		$result = getSourceList();
		echo json_encode($result);
		break;

	case "deleteSource":
		$result= deleteSource();
		echo json_encode($result);
		break;

	
	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
		break;
}

function addSource()
{
	$name = $_POST["sourceName"];
	session_start();
	$user = $_SESSION["username"];
	$sourceManager = new sourceManager();
	if($sourceManager->addSource($name,$user))
	{
		
		echo "<script>
		window.location = \"../addSource.php\";
			alert('Add Successfully!');
			</script>";

	}	
	else
	{
		echo "<script>
		window.location = \"../addSource.php\";
			alert('Add failed!');
			</script>";
	}
}

function getSourceList()
{
	$sourceManager = new sourceManager();
	$result = $sourceManager->getSourceList();
	return $result;
}

function deleteSource()
{
	$id = $_POST["id"];
	$sourceManager = new sourceManager();
	if($sourceManager->deleteSource($id))
		return "Delete successfully!";
	else
		return "Delete failed, try again!";

}

?>