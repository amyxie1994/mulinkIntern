<!doctype html>
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
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
				
						<div class="panel" width="20px";>
								<div class="panel-heading">
									<h3 class="panel-title" width= >Add Supplier Information</h3>
							<p class="panel-subtitle">Input information</p>
							
								</div>
								<div class="panel-body">
								<form class="form-horizontal" action="php/supplierOperations.php" method="post">
								<input type="hidden" class="form-control" placeholder="text field" id = "type" name ="type" value = "addSupplier">
								Company Name:
								<br>
									<input type="text" class="form-control" placeholder="text field" id = "comName" name ="comName">
								<br>
								Address:
									<br>
									<input type="text" class="form-control" placeholder="address field" id="address" name="address">
									<br>

								Contact Person:
									<br>
									<input type="text" placeholder="someone: xxx" class="form-control"  id="conPerson" name="conPerson">
									<br>

								Email:
									<br>
									<input type="email" class="form-control" placeholder="eg: name@gmail.com" id="email" name="email">
									<br>

								Source(Alibaba) Site:
									<br>
									<input type="text" placeholder="address on alibaba" class="form-control"  id="aliSite" name="aliSite">
									<br>

								Ebsite:
									<br>
									<input type="text" placeholder="company website address" class="form-control"  id="ebsite" name="ebsite">
									<br>

								Skype:
									<br>
									<input type="text" class="form-control"  id="skype" name="skype">
									<br>

								Fax:
									<br>
									<input type="text" class="form-control"  id="fax" name="fax">
									<br>

								Phone Number:
									<br>
									<input type="text" class="form-control"  id="phoneNo" name="phoneNo">
									<br>

								Role:
									<br>
									<input type="radio" name="role" value="Trading"> Trading company &emsp;
  									<input type="radio" name="role" value="Manufacture">Manufacture &emsp;
  									<input type="radio" name="role" value="Both"> Both
									<br>
<br>
								Other Information:
									<br>
									<textarea class="form-control" placeholder="comment" id = "otherInfo" name="otherInfo" rows="4"></textarea>
									<br>

								
									<br>
									<span class="input-group-btn"><button type="submit"  class="btn btn-primary">Add</button></span>
									</form>

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
	
</body>

</html>