$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});





/* show options in form*/
      $("#create_template").on("change", function() {
        $("#selection").toggle();
      })

    
//login Tab
$('.form').find('input').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
      if( $this.val() === '' ) {
        label.removeClass('active highlight'); 
      } else {
        label.removeClass('highlight');   
      }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
        label.removeClass('highlight'); 
      } 
      else if( $this.val() !== '' ) {
        label.addClass('highlight');
      }
    }

});
$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});


 /*Entries for table*/
$(document).ready(function() {
    $('.table').dataTable( {
    "aLengthMenu": [[10,25, 50, 75, -1], [10,25, 50, 75, "All"]],
    "pageLength": 10
    } );
} );

/*carousel*/
$('.carousel').carousel()

url="http://localhost/stanbicEvent/APIController.php";
//vue admin page
/*app = new Vue({
  el: "#main",

  data: {
    "projects": [],
    "currentEvent": {},
    "selectedIndex":null
  },

  mounted: function() {
    this.getAll();
  },

  methods: {
    getAll:function () {
      axios
        .get(url)
        .then(function(result) {
          app.projects = result.data;
        });
    },
    editEvent: function(index) {
      this.currentEvent = this.projects[index];
    },
    confirmDelete: function (index) {
      this.projects[index].checked = true;
    },
    deleteEvent: function() {
      for (var i = this.projects.length - 1; i >= 0; i--) {
        if(this.projects[i].checked) {
          axios
            .post(url, {"_method": "DELETE", "id": this.projects[i].id,"index": i})
            .then(function(response) {
              this.projects.splice(i,1);

            });
        }
      }
       
    },
    addEvent: function(){
      this.currentEvent = {};
    },
    updateEvent: function(){
      console.log("fdfhv")
      this.currentEvent.status= "Saved";
      this.projects.push(this.currentEvent);
      axios
        .post(url,{"_method": "PATCH", "data": this.currentEvent})
        .then(function() {
          alert("updated");
        });
      this.currentEvent={};
    },
    saveEvent: function(){
      this.currentEvent.status= "Saved";
      var t_proj = JSON.parse(JSON.stringify(this.currentEvent));
      console.log(t_proj);
      axios
        .post(url, t_proj)
        .then(function() {
          app.projects.push(app.currentEvent);
          this.currentEvent={};
          alert("Saved");
        });
    },
  }
})*/


//map
function myMap() {
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng(5.5992589,-0.1775143);
    var mapOptions = {
      center: myCenter,
      zoom:13,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(mapCanvas,mapOptions);
    var marker = new google.maps.Marker({position: myCenter,draggable:true});

    marker.setMap(map);
}
// This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 5.5992589, lng: -0.1775143},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var marker = new google.maps.Marker({
                    draggable: true,
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                  });

            // drag response
                  google.maps.event.addListener(marker, 'dragend', function(e) {
                    displayPosition(this.getPosition());                    
                  });
                  // click response
                  google.maps.event.addListener(marker, 'click', function(e) {
                    displayPosition(this.getPosition());
                  });
          

            // Create a marker for each place.
            markers.push(new google.maps.Marker(marker));
            document.getElementById('lat').value=place.geometry.location.lat();
            document.getElementById('lng').value=place.geometry.location.lng();
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
          // displays a position on two <input> elements
            function displayPosition(pos) {
              document.getElementById('lat').value = pos.lat();
              document.getElementById('lng').value = pos.lng();
            }
        });

      }
      


      




  
 
