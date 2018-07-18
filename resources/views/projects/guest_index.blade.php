<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Event</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="{{asset("css/styles.css")}}">

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
	        <li><a class="text-colour" href="{{route('projects.index')}}">Dashboard</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<ol class="breadcrumb">
	  <li><a href="#upcoming">Upcoming</a></li>
	  <li><a href="#pastevent">History</a></li>
	</ol>
	<section id="carousel">
		<div class="container-fluid container-fluid-carousel">
		       <div id="myCarousel" class="carousel slide" data-ride="carousel">
		       <ol class="carousel-indicators">
		           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		           <li data-target="#myCarousel" data-slide-to="1"></li>
		           <li data-target="#myCarousel" data-slide-to="2"></li>
		           <!-- Setting the items in each slide. -->
		   </ol>
		       <!-- First image. -->
		    <div class="carousel-inner">
		    	@foreach($projects as $project)
				    <div class="item {{$loop->first ? 'active' : ''}}">
					    <img class="img-responsive center-block">
					    <img src='{{ url('/storage/'.$image=$project->ProjectsPhoto->first()->filename) }}' alt="Slideshow image here." style="width:100%; height:86vh" >
					    <div class="carousel-caption">
					       	<h3 style="text-transform: uppercase;"><a href="{{route('projects.show',$project)}}">{{$project->event_name}}</a></h3>
					        <p>{{$project->start_date->format('d-m-y')}}</p>
					        <p>{{$project->venue}}</p>
					    </div>
				    </div>
				    @break($loop->index>=2)
				@endforeach

		     <!-- Controls -->
		         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		             <span class="glyphicon glyphicon-chevron-left"></span>
		             <span class="sr-only">Previous</span>
		         </a>
		         <a class="right carousel-control" href="#myCarousel" data-slide="next">
		             <span class="glyphicon glyphicon-chevron-right"></span>
		             <span class="sr-only">Next</span>
		         </a>
		       </div>
		     </div>
		   </div>
    </section>

	<section id="upcoming">
		<div class="container containeruser">
	    	<div class="row">
	    		<div class="page-header">
	    			<h1 id="">Upcoming</h1>
	    		</div>
	    		<div id="timeline"><div class="row timeline-movement timeline-movement-top">
	    		    <div class="timeline-badge timeline-future-movement">
	    		        <a href="#">
	    		            <span class="glyphicon glyphicon-plus"></span>
	    		        </a>
	    		    </div>
	    		    <div class="timeline-badge timeline-filter-movement">
	    		        <a href="#">
	    		            <span class="glyphicon glyphicon-time"></span>
	    		        </a>
	    		    </div>
	    		</div>
	    		@foreach($projects as $project)
					@if($loop->index > 2 && $project->start_date>=now())
		    		<div class="row timeline-movement">

		    		    <div class="timeline-badge">
		    		        <span class="timeline-balloon-date-day">{{$project->start_date->format('d')}}</span>
		    		        <span class="timeline-balloon-date-month" style="text-transform: uppercase;">{{$project->start_date->format('M')}}</span>
		    		    </div>

		    		    @if($loop->index % 2 )
			    		    <div class="col-sm-offset-6 col-sm-6  timeline-item">
			    		@else
			    		    <div class="col-sm-6  timeline-item">
			    		@endif
		    		        <div class="row">
		    		            <div class="{{$loop->index % 2 ? 'col-sm-offset-1 ' : ''}} col-sm-11">
		    		                <div class="timeline-panel {{$loop->index % 2 ? 'debits' : 'credits'}}">
		    		                    <ul class="timeline-panel-ul">
		    		                        <li><span href="{{route('projects.show',$project)}}" class="importo">{{$project->event_name}}</span></li>
		    		                        <li><span class="causale">{{str_limit($project->description, 200)}}</span></li>
		    		                        	     <a href="{{route('projects.show',$project)}}" class="btn btn-info btn-sm">Check It Out</a>
		    		                            <!--This displays button when text is above 100
		    		                            @if (strlen($project->description) > 200)
		    		                        	     <a href="{{route('projects.show',$project)}}" class="btn btn-info btn-sm">Check It Out</a>
		    		                            @endif-->
		    		                        
		    		                        <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$project->start_date->format('d-m-y')}}</small></p> </li>
		    		                    </ul>
		    		                </div>

		    		            </div>
		    		        </div>
		    		    </div>
		    		</div>
					@endif
				@endforeach
	    		</div>
	    		</div>
	    		</div>
	     	</div>
	    </div>
    </section>
    <section id="pastevent">
		<div class="container containeruser">
	    	<div class="row">
	    		<h1>Past Event</h1>
	    		<div class="col-md-12">
					<table class="table table-striped table-hover">
		                <thead>
		                    <tr>
		                        <th>Event Name</th>
		                        <th>Date</th>
		                        <th>Decription</th>
		                        <th>Venue</th>
		                        <th>Contact Person</th>
		                        <th>Contact No</th>
		                        
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($beforeprojects as $beforeproject)
		                	@if($beforeproject->start_date<now())
		                    <tr>
		                        <td><a href="{{route('projects.show',$beforeproject)}}">{{$beforeproject->event_name}}</a></td>
		                        <td>{{$beforeproject->start_date->format('d-m-y')}}</td>
		                        <td>{{str_limit($beforeproject->description,300)}}</td>
		                        <td>{{$beforeproject->venue}}</td>
		                        <td>{{$beforeproject->contact_person}}</td>
		                        <td>{{$beforeproject->contact_no}}</td>
		                    </tr>
		                    @endif
		                    @endforeach
		                </tbody>
					</table>
					
				</div>		
	     	</div>
	    </div>
    </section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="{{asset("js/script.js")}}"></script>
</body>
</html>