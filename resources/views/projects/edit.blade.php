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
	      <a class="navbar-brand text-colour logo-padding" href="#"><img class="logosize" src='{{asset("images/Standard_Bank_Logo.png")}}' class="rounded" alt="Cinque Terre"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a class="text-colour" href="{{route('projects.preview')}}">Dashboard</a></li>
	        <li><a class="text-colour" href="{{route('projects.index')}}">Manage Events</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#" class="glyphicon glyphicon-bell nav-icon-colour"><span></span></a></li>
	        <li><a href="#" class="glyphicon glyphicon-envelope nav-icon-colour"><span></span></a></li>        
	        <li class="dropdown">
                <a   href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
    <div class="container-fluid" id="main">
		<!-- Edit Modal HTML -->
		<div id="editEventModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="{{route('projects.update', $project)}}" enctype="multipart/form-data">
						@csrf()
						@method('PATCH')
						<div class="modal-header">						
							<h4 class="modal-title">Edit Event</h4>
							<a href="{{route('projects.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Event Name</label>
								<input type="text" name="event_name" class="form-control" required spellcheck="true" value="{{$project->event_name}}">
							</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Category</label>
						    	<select class="form-control" id="exampleFormControlSelect1" name="category" value="{{$project->category}}">
						      		<option value="Conference" name="Conference">Conference</option>
						      		<option value="CommunityEngagement" name="CommunityEngagement">Community Engagement</option>
						    	</select>
						  	</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Type</label>
						    	<select class="form-control" id="exampleFormControlSelect1" name="type" value="{{$project->type}}">
						      		<option value="internal">Internal</option>
						      		<option value="external">External</option>
						    	</select>
						  	</div>
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" name ="start_date" class="form-control" required
									min="{{$project->created_at->format('Y-m-d')}}" value="{{$project->start_date->format('Y-m-d')}}">
							</div>
							<div class="form-group">
								<label>End Date</label>
								<input type="date" name ="end_date" class="form-control" required
									min="{{$project->created_at->format('Y-m-d')}}" value="{{$project->end_date->format('Y-m-d')}}">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name ="description"required spellcheck="true"  value="{{$project->description}}">{{$project->description}}</textarea>
							</div>
							<div class="form-group">
								<label>Venue</label>
								<input type="text" class="form-control" name ="venue" spellcheck="true" required value="{{$project->venue}}">
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox"  id="defaultCheck1">
							  <label class="form-check-label" for="defaultCheck1">
							    Check location on map
							  </label>
							</div>
							<div class="form-group">
								<label>Location on map</label>
								<input id="pac-input" class="controls" type="text" placeholder="Search Box">
								<div id="map" style="width:100%;height:500px"></div>
								<input type="hidden" id="lat" value="" name="latitude" />
								<input type="hidden" id="lng" value=""  name="longitude" />
							</div>
							<div class="form-group">
								<label>Contact Person</label>
								<input type="text" name ="contact_person" class="form-control" required  value="{{$project->contact_person}}">
							</div>
							<div class="form-group">
								<label>Contact No</label>
								<input type="text" name="contact_no" class="form-control" required  value="{{$project->contact_no}}">
							</div>
						  	<div class="form-group">
						  		<label for="exampleFormControlFile1">Add Image</label>
						  		<input type="file" name="photos[]" multiple />
						  	</div>
							<div class="form-group">
								<p>Do you want to create url from template</p>					
							  	<select class="form-control" id="create_template" value="{{$project->template}}">
						      		<option value=1>Yes</option>
						      		<option value=0>No</option>
						    	</select>
						    	<div id="selection" style="{{$project->template ? 'display:none' : ''}}">
									<label>If no enter URL</label>
									<input type="text" class="form-control" placeholder="Leave blank for no URL" value='{{$project->url}}' name="url">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="{{route('projects.index')}}"><input type="button" class="btn btn-default" value="Cancel"></a>
							<input type="submit" class="btn btn-success" value="Update">
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