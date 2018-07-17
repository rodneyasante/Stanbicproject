<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminDashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset("css/admin.css")}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand text-colour" href="#"><img class="logosize" src="images/Standard_Bank_Logo.png" class="rounded" alt="Cinque Terre"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a class="text-colour" href="Userdash.html">Dashboard</a></li>
	        <li><a class="text-colour" href="AdminDashboard.html">Manage Events</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#" class="glyphicon glyphicon-bell nav-icon-colour"><span></span></a></li>
	        <li><a href="#" class="glyphicon glyphicon-envelope nav-icon-colour"><span></span></a></li>        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle text-colour" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a  href="#">Update Profile</a></li>
	            <li><a  href="#">Sign Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<ol class="breadcrumb">
	  <li><a href="#">Upcoming</a></li>
	  <li><a href="#">History</a></li>
	  <li class="active">All</li>
	</ol>
    <div class="container-fluid" id="main">
		<!-- Publish Modal HTML -->
		<div id="publishEventModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Publish</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Select the various Department you want to send notification</p>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							  <label class="form-check-label" for="defaultCheck1">
							    All
							  </label>
							</div>					
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Cards and Payment
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Digital Transformation
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Credit
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Risk
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Legal
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Marketing
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Finance
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Human Capital
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Enterprise Banking
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Business Banking
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Executive Banking
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Finance Banking
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Home Loans
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Wealth
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    TPS
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Global Markets
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    VAF
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Product
						  	  </label>
						  	</div>
						  	
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    Sale
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    IT
						  	  </label>
						  	</div>
						  	<div class="form-check">
						  	  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	  <label class="form-check-label" for="defaultCheck1">
						  	    PMO
						  	  </label>
						  	</div>				
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-info" value="Publish">
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<!--script src="js/vue.min.js"></script-->
	<script src={{asset("js/axios.min.js")}}></script>
	<script src={{asset("js/script.js")}}></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRG7FsaNVyoTs7rR3yAEbFquzB3yq90MU&libraries=places&callback=initAutocomplete"
         async defer></script>
</body>
</html>                                		                            