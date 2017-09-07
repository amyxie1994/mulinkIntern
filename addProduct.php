
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="supplierJS.js"></script>
<script src="productJS.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
get_href();

getProductList();
//load_data();
</script>

<style>

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px;
    padding-left: 300px; /* Location of the box */
    left: 0;
    top: 0;
    width:100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.imgmodal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  padding-left: 300px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4); 
}

/* Modal Content */
.imgmodal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 40%;
  height: 40%;

}

/* Modal Content */
.modal-content {
	position:relative;
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 90%;
    max-width: :1200px;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 50px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #ff0000;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
</style>
</head>
<body>



	<!-- WRAPPER -->
	<div id="wrapper">

		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo.png" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li>
							<a href="#"><img src="assets/img/user.jpg" class="img-circle" alt="Avatar"> <span>Admin</span></a>
						</li>
							
						
						<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Overview</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-dice"></i><span>Supplier Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Add Supplier</a></li>
									<li><a href="page-login.html" class="">Supplier List/Searching</a></li>
									
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Research Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="#" class="">Add Research Data</a></li>
									<li><a href="page-login.html" class="">Data List/Searching</a></li>
									
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i><span>User Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="#" class="">Register new account</a></li>
									<li><a href="userInfo.php" class="">User List</a></li>
									
								</ul>
							</div>
						</li>
						
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Add Source</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		
		<div class="main">
		
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<div class="row">

						<div class="col-md-4">
							<!-- PANEL DEFAULT -->
              

							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title"><b>Supplier Information</b></h1>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<input type="hidden" class="form-control" placeholder="text field" id = "supplierId" name ="supplierId" >
									<p id= "ComName"></p>
									<p id= "Address"></p>
									<p id= "ConPerson"></p>
									<p id= "Email"></p>
									<p id= "AliSite"></p>
									<p id= "Ebsite"></p>
									<p id= "Fax"></p>
									<p id= "Skype"></p>
									<p id= "Phone"></p>
									<p id= "Role"></p>
									<p id= "OtherInfo"></p>
								</div>
                </div>
	<div id="myModal" class="modal">
  		<div class="modal-content" width = "100px">
  		<form action="php/productOperations.php" method="post"  enctype="multipart/form-data">
      	<div class="modal-header">
        	<button type="button" onclick = "closeModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Add Product</h4>
        	
      	</div>
      	<div class="modal-body">
     <input type="hidden" value = "addProduct" id = "type" name ="type">
<table style="width:100%">
    <tr>
        <td> Name: </td>
        <td> <input type="text"  placeholder="Name of Product" id = "productName" name ="productName"> </td>
        <td> <input type="hidden"  id = "supplierID" name ="supplierID"> </td>
    </tr>

    <tr>
        <td>Main Key Word</td>
        <td> <input type="text"  placeholder="Main Keyword" id = "mainKW" name ="mainKW"> </td>
        <td> Other Keyword </td>
        <td><input type="text"  placeholder="Other Keyword" id = "otherKW" name ="otherKW"></td>
   	</tr>
    <tr>
       <td> Craft:</td>
       <td> <input type="text"  placeholder="Craft" id = "Craft" name ="Craft"> </td>
       <td> Product Size:</td>
       <td> <input type="text"  placeholder="Product Size" id = "PSize" name ="PSize"></td>
    </tr>
    <tr>
    	<td>Sample Time:</td>
        <td><input type="text"  placeholder="Sample Time" id = "STime" name ="STime"></td>
		<td> Price:</td>
        <td> <input type="text"  placeholder="$ xxx" id = "Price" name ="Price"> </td>
   </tr>
   <tr> 
   		<td> Size: </td>
    	<td> <input type="text"  placeholder="Size" id = "Size" name ="Size"></td>
    	<td> Production Limition time:</td>
    	<td><input type="text"  placeholder="Production Limition time" id = "PLt" name ="PLt"></td>
    </tr> 
    
    <tr>
    	<td>Carton Size:</td>
        <td><input type="text"  placeholder="" id = "Csize" name ="Csize"></td>
        <td>Model:</td>
        <td><input type="text"  placeholder="Model" id = "Model" name ="Model"></td>
    </tr>
    <tr> 
    	<td>QTY</td>
        <td><input type="text"  placeholder="QTY" id = "QTY" name ="QTY"></td>
        <td>Packing </td>
        <td><input type="text"  placeholder="Packing time" id = "Packing" name ="Packing"></td>  
    </tr>
    <tr> 
    	<td> Other Info </td>
        <td><textarea rows="4" cols="50"  placeholder="Comments" id = "OtherInfo" name ="OtherInfo"></textarea></td>
        
    </tr>
    <tr>
    	<td>Product Images</td>
    	<td><input type="file" name="uploadFile[]" id="uploadFile" accept="image/*" multiple="multiple">
    	
    </tr>
      </table> 
            
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value = "Submit" class="btn btn-default" data-dismiss="modal" ">Add</button>
        
      </div>
       </form>
    </div>

</div>


<div id="productInfoModal" class="modal">
  		<div class="modal-content" width = "100px">
      	<div class="modal-header">
        	<button type="button" onclick = "closeProModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title"><b>Product Infomation</b></h4>
        	
      	</div>
			<div class="modal-body">
		
				<p id= "name">dsfsd</p> 
				<p id= "mainkw"></p>
				<p id= "otherkw"></p>
				<p id= "craft"></p>
				<p id= "psize"></p>
				<p id= "price"></p>
				<p id= "Size2"></p>
				<p id= "PLt2"></p>
				<p id= "SLt"></p>
				<p id= "Csize2"></p>
				<p id= "Model2"></p>
				<p id= "QTY2"></p>
				<p id= "Packing2"></p>
				<p id= "comment"></p>	
			</div>
			</div>
</div>
<!-- /**********************************************************************/ -->
<div id="imgModal" class="imgmodal">
 <span class="close cursor"  style="color:#ff0000" onclick="closeImgModal()">&times;</span>
 <div class="imgmodal-content" id="modalReplace">

 
 </div>
</div>
<!-- /*****************************************************************************/ -->


							</div>
							<!-- END PANEL DEFAULT -->
						</div>
					</div>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
				
						<div class="panel" width="20px";>
								<div class="panel-heading">
									<h3 class="panel-title" width= >Qutation Information</h3>
							<p class="panel-subtitle">Product Information</p>
							
								</div>
								<div class="panel-body">
								
<button type="button" id = "addProduct" onclick = "clickFunction()" class="btn btn-success">Add Product</button>
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Main KeyWords</th>
                                            <th>OtherKeywords</th>
                                            <th>Price</th>
                                            <th>Product Size</th>
                                            <th>QTY</th>
                                            <th>Packing</th>
                                            <th>Model</th>
                                            <th>Image</th>                                      
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                           
                                    </tbody>
                                </table>
            </div>




									</div>
								</div>
							</div>
						
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
			</div>
		</footer>
	</div>


	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="productJS.js"></script>
	<script type="text/javascript">

$(function() {

var url = window.location.href;
var str = url.split("=");
var supplierId= str[1];
$('#supplierID').val(supplierId);

$("#mainKW").autocomplete({

  source: function(request, response){ 

    $.ajax({
      type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
      data:{type:"keywordHint",query:request.term},
      success: function(data){

        var result=[];
        for(var i =0;i<data.length;i++)
          result[i]=data[i].Keyword;
        response(result);

      }
    });

  }
 

});

$("#otherKW").autocomplete({

  source: function(request, response){ 

    $.ajax({
      type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
      data:{type:"keywordHint",query:request.term},
      success: function(data){
        
        var result=[];
        for(var i =0;i<data.length;i++)
          result[i]=data[i].Keyword;
        response(result);

      }
    });

  }
 

});

$("#productName").autocomplete({

  source: function(request, response){ 

  	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
  		data:{type:"productNameHint",query:request.term},
  		success: function(data){
  			var row;
  			var result =[];
  			var ProductName;
  			var MainKW;
  			var OtherKW;
  			for(var i = 0; i < data.length;i++)
  			{
  				row = data[i];
  				ProductName = row.ProductName;  				
  				MainKW = getMainKW(row.id);
  				//alert(MainKW);
  				OtherKW = getOtherKW(row.id);
  				result.push({label: row.ProductName,
  							//data:[row.mainKeyword,row.OtherKeyword] });
  							data:[MainKW,OtherKW] });

  			}

  			response(result);

  		}
  	});

  },
  select: function( event, ui ) {
	$('#mainKW').val(ui.item.data[0]);
    $('#otherKW').val(ui.item.data[1]);
  },

});

});





</script>

</body>

</html>
