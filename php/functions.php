<?php
function keywordHint()
{
	$query = $_POST['query'];
	$keywordManager = new keywordManager();
	return $keywordManager->keywordHint($query);
}

function showProduct()
{
	$productId = $_POST["productId"];
	$productManager = new productManager();
	
	return $productManager->showProduct($productId);
}

function getList()
{
	$SupplierId = $_POST["supplierId"];
	//return $SupplierId;
	$productManager = new productManager();
	//return $SupplierId;
	return $productManager->productList($SupplierId);
}

function deleteProduct()
{
	$productId = $_POST["productId"];
	$productManager = new productManager();
	return $productManager->deleteProduct($productId);
}


function updateImgNum($productId,$imgNum)
{	
	$productManager = new productManager();
	$productManager->updateImgNum($productId,$imgNum);
}

function updateKw($productId,$mainKw,$otherKw)
{
	$otherkws = explode(",", $otherKw);
	$tag=[];

	$keyword[0]=$mainKw;
	for($i=1;$i<=count($otherkws);$i++)
		$keyword[$i]=$otherkws[$i-1];
	//print_r($keyword);


	for($i=0;$i<count($keyword);$i++)
	{
		$tag[$i]=getKwId($keyword[$i]);
	}

	if($tag[0]==0)
	{	
		$newId=addKeyword($mainKw);
		addMainKw($productId,$newId);
		updatePreKw($newId,$tag,0);
		$tag[0]=$newId;
	}
	else
	{
		addMainKw($productId,$tag[0]);

	}


	for($i=1;$i<count($keyword);$i++)
	{	

		if($tag[$i]==0&&$keyword[$i]!="")
		{
			$newId=addKeyword($keyword[$i]);
			updatePreKw($newId,$tag,$i);
			//addOtherKw($productId,$newId);

		}
		else
			addOtherKw($productId,$tag[$i]);
	}
}

function updatePreKw($newId,$tag,$position)
{

	for($i= 0;$i<count($tag);$i++)
	{	
		if($i != $position && $tag[$i]!= 0)
		{
	
			$products=getProducts($tag[$i]);
			
			if($products!=null)
				for($j=0;$j<count($products);$j++){
				
					//echo $products[$j]["Product_id"];
					addOtherKw((int)$products[$j]["Product_id"],$newId);
				}
		}
	}
}

function getProducts($keywordId)
{
	$keywordManager = new keywordManager();
	return $keywordManager->getProducts($keywordId);
}

function addKeyword($keyword)
{
	$keywordManager = new keywordManager();
	return $keywordManager->addKeyWord($keyword);
}
 
function addMainKw($productid,$kw_id)
{
	$keywordManager = new keywordManager();
	$keywordManager->addMainKw($productid,$kw_id);
}

function addOtherKw($productid,$keyword)
{
	$keywordManager = new keywordManager();
	$keywordManager->addOtherKw($productid,$keyword);
}

function getKwId($keyword)
{
	$keywordManager = new keywordManager();
	return $keywordManager->getKwId($keyword);
}

function getMainKW()
{
	$query = $_POST['query'];
	$productManager = new productManager();
	return $productManager->getMainKW($query);
}

function getOtherKW()
{
	$query = $_POST['query'];
	//return $query;
	$productManager = new productManager();
	return $productManager->getOtherKW($query);
}
?>