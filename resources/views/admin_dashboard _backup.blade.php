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
<link rel="stylesheet" href="css/admin.css">
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
	<ol class="breadcrumb">
	  <li><a href="#">Upcoming</a></li>
	  <li><a href="#">History</a></li>
	  <li class="active">All</li>
	</ol>
    <div class="container-fluid" id="main">
    	<div class="row">
    		<div class="col-md-9 col-sm-12">
		    	<div class="table-wrapper">
		            <div class="table-title">
		                <div class="row">
		                    <div class="col-sm-6">
								<h2>Manage <b>Events</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="#publishEventModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Publish</span></a>
								<a class="btn btn-primary" href="{{route('projects.create')}}"><i class="material-icons">&#xE147;</i> <span>Add Event</span></a>
								<a href="#deleteEventModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
							</div>
		                </div>
		            </div>
		            <table class="table table-striped table-hover">
		                <thead>
		                    <tr>
								<th>
									<span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span>
								</th>
		                        <th>Event Name</th>
		                        <th>Start Date</th>
								<th>End Date</th>
		                        <th>Description</th>
		                        <th>Venue</th>
		                        <th>Contact Person</th>
		                        <th>Contact No</th>
		                        <th>Status</th>
		                        <th>Actions</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($projects as $project)
		                    <tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1" v-model="event.checked">
										<label for="checkbox1"></label>
									</span>
								</td>
		                        <td>{{$project->event_name}}</td>
		                        <td>{{$project->start_date->format('d-m-Y')}}</td>
		                        <td>{{$project->end_date->format('d-m-Y')}}</td>
		                        <td>{{str_limit($project->description, 200)}}</td>
		                        <td>{{$project->venue}}</td>
		                        <td>{{$project->contact_person}}</td>
		                        <td>{{$project->contact_no}}</td>
		                        <td>{{$project->status}}</td>
		                        <td>
			                            <a class="edit" href="{{route('projects.edit', $project)}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">edit</i></a>
			                            <a class="delete" href="#deleteEventModal" data-id="{{$project->id}}" name="confirmDelete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></a>
			                            <a class="publish" href="#publishEventModal" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="publish">publish</i></a>
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
    		</div>
    		<div class="col-md-3 col-sm-12">
				<div class = "widget">
					  <div class = "calender">
					    <div class = "calender__month">
					      <i class="material-icons calender__month--icon calender__month--icon--left">keyboard_arrow_left</i>
					      <h2 class = "calender__month--text"></h2>
					      <i class="material-icons calender__month--icon calender__month--icon--right">keyboard_arrow_right</i>
					    </div>
					    <div class = "calender__days">
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">S</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">M</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">T</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">W</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">T</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">F</p>
					      </div>
					      <div class = "calender__cell calender__cell--dOfW">
					        <p class = "calender__text--dOfW">S</p>
					      </div>
					    </div>
					  </div>
					  <div class = "schedule">
					    <div class = "schedule__title">
					      <h2 class = "schedule__title--text">Schedule</h2>
					      <p class = "schedule__title--date"></p>
					    </div>
					    <div class = "schedule__taskWrapper">
					<!--       <div class = "task">
					        <input class = "task__time" type = "text">
					        <input class = "task__name" type = "text">
					      </div> -->
					      <div class = "schedule__formWrapper">
					        <div class = "schedule__form">
					          <div class = "schedule__">
					            <h4>Time</h4>
					            <input class = "task__time" type = "text">
					          </div>
					          <input class = "task__name" type = "text">
					          <button class = "task__add" type = "button">Add</button>
					        </div>
					      </div>
					      <div class = "schedule__add" onclick = "addTask(this)">
					        <i class="material-icons schedule__add--icon">add</i>
					      </div>
					    </div>
					    <div>
					    </div>
					  </div>
				</div>
    		</div>
    	</div>
		<!-- Add Modal HTML -->
		<div id="addEventModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post">
						<div class="modal-header">						
							<h4 class="modal-title">Add Event</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Event Name</label>
								<input type="text" class="form-control" name="event_name" required spellcheck="true" v-model="currentEvent.event_name">
							</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Category</label>
						    	<select class="form-control" id="exampleFormControlSelect1" v-model="currentEvent.category">
						      		<option value="Conference">Conference</option>
						      		<option value="CommunityEngagement">Community Engagement</option>
						    	</select>
						  	</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Type</label>
						    	<select class="form-control" id="exampleFormControlSelect1" v-model="currentEvent.type" >
						      		<option value="Internal">Internal</option>
						      		<option value="external">External</option>
						    	</select>
						  	</div>
							<div class="form-group">
								<label>Start Time</label>
								<input type="date" class="form-control" required name="start_time" v-model="currentEvent.start_time">
							</div>
							<div class="form-group">
								<label>End Time</label>
								<input type="date" class="form-control" required name="end_time" v-model="currentEvent.end_time">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" required spellcheck="true" v-model="currentEvent.description" name="description"></textarea>
							</div>
							<div class="form-group">
								<label>Venue</label>
								<input type="text" class="form-control" spellcheck="true" required v-model="currentEvent.venue" name="venue">
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							  <label class="form-check-label" for="defaultCheck1">
							    Check location
							  </label>
							</div>
							<div class="form-group">
								<label>Location on map</label>
								<input id="pac-input" class="controls" type="text" placeholder="Search Box">
								<div id="map" style="width:100%;height:500px"></div>
							</div>
							<div class="form-group">
								<label>Contact Person</label>
								<input type="text" class="form-control" required v-model="currentEvent.contact_person" name="contact_person">
							</div>
							<div class="form-group">
								<label>Contact No</label>
								<input type="text" class="form-control" name="contact_no" required v-model="currentEvent.contact_no">
							</div>
						  	<div class="form-group">
						  		<label for="exampleFormControlFile1">Add Image</label>
						  	    <input type="file" class="form-control-file" id="exampleFormControlFile1">
						  	</div>
							<div class="form-group">
								<p>Do you want to create url from template</p>					
							  	<select class="form-control" id="exampleFormControlSelect1" v-model="currentEvent.template">
						      		<option value="yes">Yes</option>
						      		<option value="no">No</option>
						    	</select>
								<label v-show="currentEvent.template == 'no'">If no enter URL</label>
								<input v-show="currentEvent.template == 'no'" type="text" class="form-control" required placeholder="Leave blank for no URL" v-model="currentEvent.url">
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="button" class="btn btn-success" data-dismiss="modal" @click="saveEvent()" value="Save">
							<input type="button" class="btn btn-success" value="Publish">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editEventModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Edit Event</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Event Name</label>
								<input type="text" class="form-control" required spellcheck="true" v-model="currentEvent.event_name">
							</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Category</label>
						    	<select class="form-control" id="exampleFormControlSelect1"  v-model="currentEvent.category">
						      		<option>Conference</option>
						      		<option>Community Engagement</option>
						    	</select>
								<label v-show="currentEvent.category == 'conference'"> Tickets</label>
						    	<select class="form-control" id="exampleFormControlSelect1" v-show="currentEvent.category == 'conference' ">
						      		<option value="yes">Yes</option>
						      		<option value="no">No</option>
						    	</select>
						    	<input type="text" v-show="currentEvent.category == 'yes'" placeholder="enter the amount">
						  	</div>
							<div class="form-group">
						    	<label for="exampleFormControlSelect1">Event Type</label>
						    	<select class="form-control" id="exampleFormControlSelect1" v-model="currentEvent.type">
						      		<option>Internal</option>
						      		<option>External</option>
						    	</select>
						  	</div>
							<div class="form-group">
								<label>Start Time</label>
								<input type="date" class="form-control" required  v-model="currentEvent.start_time">
							</div>
							<div class="form-group">
								<label>End Time</label>
								<input type="date" class="form-control" required  v-model="currentEvent.end_time">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" required spellcheck="true"  v-model="currentEvent.description"></textarea>
							</div>
							<div class="form-group">
								<label>Venue</label>
								<input type="text" class="form-control" spellcheck="true" required v-model="currentEvent.venue">
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							  <label class="form-check-label" for="defaultCheck1">
							    Check location
							  </label>
							</div>
							<div class="form-group">
								<label>Location on map</label>
								<div id="map" style="width:100%;height:500px"></div>
							</div>
							<div class="form-group">
								<label>Contact Person</label>
								<input type="text" class="form-control" required  v-model="currentEvent.contact_person">
							</div>
							<div class="form-group">
								<label>Contact No</label>
								<input type="text" class="form-control" required  v-model="currentEvent.contact_no">
							</div>
						  	<div class="form-group">
						  		<label for="exampleFormControlFile1">Add Image</label>
						  	    <input type="file" class="form-control-file" id="exampleFormControlFile1">
						  	</div>
							<div class="form-group">
								<p>Do you want to create url from template</p>					
							  	<select class="form-control" id="exampleFormControlSelect1" v-model="currentEvent.template">
						      		<option value="yes">Yes</option>
						      		<option value="no">No</option>
						    	</select>
								<label v-show="currentEvent.template == 'no'">If no enter URL</label>
								<input v-show="currentEvent.template == 'no'" type="text" class="form-control" required placeholder="Leave blank for no URL" v-model="currentEvent.url">
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="button" class="btn btn-success" data-dismiss="modal" @click="updateEvent()" value="Update">
							<input type="submit" class="btn btn-success" value="Publish">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<div id="deleteEventModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="#" id="delete_form">
						@csrf()
						@method("DELETE")
						<div class="modal-header">						
							<h4 class="modal-title">Delete Event</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default"   data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" name=delete id="delete" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Publish Modal HTML -->
		<div id="publishEventModal" class="modal fade">
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
	<script src="js/axios.min.js"></script>
	<script src="{{asset("js/script.js")}}"></script>
	<script>
		var form = $("#delete_form");
		
		$("[data-id]").on("click", function() {
			form.attr("action",  "/projects/"+$(this).data('id'));
		});

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRG7FsaNVyoTs7rR3yAEbFquzB3yq90MU&libraries=places&callback=initAutocomplete"
         async defer></script>
</body>
</html>                                		                            