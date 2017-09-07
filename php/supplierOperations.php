<?php

include "supplierManagement.php";

$type=$_POST['type'];

	
switch ($type) {

	case "addSupplier":
		addSupplier();
		break;

	case "listSupplier":
		listSupplier();
		break;
	case "supplierHint":
		supplierHint();
		break;

	case "searchSupplier":
		searchSupplier();
		break;

	case "deleteSupplier":
		deleteSupplier();
		break;

	case "editSupplier":
		editSupplier();
		break;

	case "updateSupplier":
		updateSupplier();
		break;
	
	default:
		$Message = "Unknown operations!";
		break;
}


function updateSupplier()
{
	$supplierId = $_POST["supplierId"];
	$comName = $_POST["comName"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$conPerson = $_POST["conPerson"];
	$aliSite= $_POST["aliSite"];
	$ebsite = $_POST["ebsite"];
	$skype = $_POST["skype"];
	$fax = $_POST["fax"];
	$phoneNo = $_POST["phoneNo"];
	$role = $_POST["role"];
	$otherInfo = $_POST["otherInfo"];
	$supplierManager = new supplierManager();
	if($supplierManager->update($supplierId,$comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo))
		header('Location: ../supplierInfo.php');
	else
	{
		echo "<script>
		alert('Update supplier info failed, Please try again later!');
		location.reload();
		</script>";
		
	}
}

function editSupplier()
{

	$supplierId = $_POST["supplierId"];
	$supplierManager = new supplierManager();
	echo json_encode($supplierManager->getEditInfo($supplierId));

}

function searchSupplier()
{
	$query = $_POST["query"];
	$supplierManager = new supplierManager();
	$result = $supplierManager->searchSupplier($query,"CN");
	echo json_encode($result);

	/*$keywordManager = new keywordManager();

	if($keywordManger->check_keywork($query))
		$result = $supplierManager->searchSupplier($query,"KW");
	else
		$result = $supplierManager->searchSupplier($query,"CN");
*/

}

function deleteSupplier()
{

	$supplierId = $_POST["SupplierID"];
	$supplierManager = new supplierManager();

	if($supplierManager->deleteSupplier($supplierId))
		echo json_encode("Delete supplier Successfully!");
	else
		echo json_encode("Failed to delete suppllier!");

}

function supplierHint()
{	
	$term = $_POST["query"];
	$supManager = new supplierManager();
	$result = $supManager->hintSupplier($term);

	echo json_encode($result);
}

function listSupplier()
{
	$supManager = new supplierManager();

	$result = $supManager->listSupplier();
	echo json_encode($result);


}



function addSupplier()
{
	$comName = $_POST["comName"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$conPerson = $_POST["conPerson"];
	$aliSite= $_POST["aliSite"];
	$ebsite = $_POST["ebsite"];
	$skype = $_POST["skype"];
	$fax = $_POST["fax"];
	$phoneNo = $_POST["phoneNo"];
	$role = $_POST["role"];
	$otherInfo = $_POST["otherInfo"];
	//$creator = $_POST["creator"];

	$creator = "admin";
	$supManager = new supplierManager();
	$result = $supManager->addSupplier($comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo,$creator);

	if($result)
		header('Location: ../supplierInfo.php');
	else
	{
		echo "<script>
		alert('Add supplier info failed, Please try again later!');
		window.location.href='../addSupplier.php';
		</script>";
	}

	
}


?>