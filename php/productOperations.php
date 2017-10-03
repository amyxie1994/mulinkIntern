<?php

include "productManagement.php";
include "keywordManagement.php";
include "fileOperations.php";
include "functions.php";
include "userManagement.php";


$type=$_POST['type'];
//echo json_encode($type);
	
switch ($type) {

	case "productNameHint":
		$result = productNameHint();
		echo json_encode($result);
		break;

	case "getMainKW":
		$result = getMainKW();
		echo json_encode($result);
		break;

	case "getOtherKW":
		$result = getOtherKW();
		echo json_encode($result);
		break;

	case "keywordHint":
		$result = keywordHint();
		echo json_encode($result);
		break;

	case "addProduct":
		addProduct();		
		break;

	case "deleteProduct":
		$result = deleteProduct();
		echo json_encode($result);
		break;

	case "getProductList":
		$result=getList();
		echo json_encode($result);
		break;

	case "showProduct":
		$result=showProduct();
		echo json_encode($result);
		break;

	case "loadProductList":	
		$result = loadProductList();
		echo json_encode($result);
	break;
	
	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
		break;
}

function loadProductList()
{	
	$query = $_POST['query'];
	$keywordManager = new keywordManager();
	$keywordList = $keywordManager->getKeywordList($query);

	$result = $keywordManager->getProductInfoByKW($keywordList);

	$userManager = new userManager();
	session_start();
	$user = $_SESSION["username"];
	$userInfo = $userManager->get_info_basedOnName($user);
	$permission = $userInfo[0]["vOrS_a_sudata"];

	$productManager = new productManager();
	return $productManager->getProductInfo($result,$user,$permission);

	//return $result;
}

function productNameHint()
{
	$query = $_POST['query'];
	$productManager = new productManager();
	return $productManager->getNameHint($query);
}

function addProduct()
{

	$name= $_POST["productName"];
	$SupplierId = $_POST["supplierID"];

	$Craft = $_POST["Craft"];
	$Psize = $_POST["PSize"];

	$STime = $_POST["STime"];
	$Price = $_POST["Price"];

	$Size = $_POST["Size"];
	$PLt = $_POST["PLt"];

	$SampleSize = $_POST["Csize"];
	$Model = $_POST["Model"];
	
	$QTY = $_POST["QTY"];
	$Packing = $_POST["Packing"];

	$OtherInfo = $_POST["OtherInfo"];
	$Res_Mark = 0;
	
	$productManager = new productManager();
	$productId = $productManager->addProduct($name,$SupplierId,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo,$Res_Mark);

	if($productId!=0)
	{	
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($productId,$mainKw,$otherKw);
		
		$imgNum = getUploadFile($productId);
		updateImgNum($productId,$imgNum);
//
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Successfully!');
		</script>";
	}
	else
	{ 
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Product into qutation failed, Please try again later!');
		location.reload();
		</script>";
	}
	
}



?>