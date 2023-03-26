<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
     <script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('map-key');?>&libraries=places"></script>
     <style>
        .book_fixed{
            display:none;
        }
          #pac-input{
            display:none;
            background: none padding-box rgb(255, 255, 255);
      width: 476px;
    max-width: 100%;
    padding: 0px 17px;
    text-transform: none;
     
    overflow: hidden; 
    height: 40px;
   
    color: rgb(0, 0, 0);
    font-family: Roboto, Arial, sans-serif;
    font-size: 18px;
    border-bottom-left-radius: 2px;
    border-top-left-radius: 2px;
    box-shadow: rgb(0 0 0 / 30%) 0px 1px 4px -1px;
    min-width: 35px;
    font-weight: 500;
        }
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
        
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
              
               
                    <!-- ICON BG-->
                 
        <form action = "<?=base_url('master/add_category_action')?>" method = "post" enctype='multipart/form-data'>
                       <?php echo form_open('form'); ?> 
            
              
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG--> 
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                        <div class="card mb-3">
                             <div class="card-header text-center">
                                 <h1 class=" h5 mr-2"><b>Fill The Form</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                             <div class="form-group col-sm-6">
                                <label for="email">Name</label>
                                <input name="name" class="form-control " id="email" type="text" required="">
                            </div>
                              <div class="form-group col-sm-6">
                                        <label class="form-label">Add Image</label>
                                         <input type="file" name="image"  accept="image/*"    class="form-control " required="">
                                         </div>
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
      <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
      <div id="map">
  </div>
 
  <p id="current_position"></p>

  <p id="showMe" class="btn btn-warning center-align" style="color:#000;
    background: #ebebeb;
    padding: 10px;cursor:pointer;
    border-radius: 10px;">
 <i class="nav-icon i-Map-Marker"></i> Use Map
  </p>
                                           
     
     <span id='message'></span> 
    
  </div>
       
                                          <div class="form-group col-sm-6">
                                <label for="email">Latitude</label>
                                <input id="lat" name="latitude" class="form-control " id="email" type="text" required="">
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Longitude</label>
                                <input id="lng" name="longitude" class="form-control " id="email" type="text" required="">
                            </div>
                            
                            
                                         <div class="form-group col-sm-12">
                                <label for="email">Overview</label>
                                 <textarea name="overview" class="form-control"  required=""></textarea>

                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email">Weather</label>
                                 <textarea name="weather" class="form-control"  required=""></textarea>

                            </div>
                            <div class="form-group col-sm-12">
                                 <button type="submit" class="btn btn-primary btn-lg">Submit</button> 
                            </div>
                            
                                  </div>
                                  </div>
                                  </div>
                                 
                                  </div> </div> 
                                   
                        </div>
                    </div>
                    
               </div>
               
                  </form>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
         
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <?php $this->load->view('admin/include/footerscript');?>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'overview' );
                        CKEDITOR.replace( 'weather' );
                       
                </script>
                <script>
//This div will be used to show Google map
const mapArea = document.getElementById('map');


 
const actionBtn = document.getElementById('showMe');  
let Gmap, Gmarker;

const __KEY = "<?=$this->config->item('map-key');?>";

actionBtn.addEventListener('click', e => {
  // hide the button 
  actionBtn.style.display = "none";
  document.getElementById("pac-input").style.display = "block";
 document.getElementById("message").innerHTML = ' ';
 
   
  // call Materialize toast to update user 
//   M.toast({ html: 'I am fetching your current location', classes: 'rounded' });

  // get the user's position
  getLocation();

});
getLocation = () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayLocation, showError, options)

  }
  else {
    M.toast({ html: 'Sorry, your browser does not support this feature... Please Update your Browser to enjoy it', classes: 'rounded' });
  }
}

// displayLocation
displayLocation = (position) => {
    
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
document.getElementById('lat').value = lat;
document.getElementById('lng').value = lng;
  const latlng = { lat, lng }

  showMap(latlng, lat, lng);
  createMarker(latlng);
  mapArea.style.display = "block";
   mapArea.style.height = "300px";
    mapArea.style.marginTop = "10px";
     mapArea.style.marginBottom = "10px";
  

}

// Recreates the map
showMap = (latlng, lat, lng) => {
  let mapOptions = {
    center: latlng,
    zoom: 11
  };
  
    // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);

 

  Gmap = new google.maps.Map(mapArea, mapOptions);
 Gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  Gmap.addListener("bounds_changed", () => {
    searchBox.setBounds(Gmap.getBounds());
  });
  Gmap.addListener('drag', function () {
    Gmarker.setPosition(this.getCenter()); // set marker position to map center
  });

  Gmap.addListener('dragend', function () {
    Gmarker.setPosition(this.getCenter()); // set marker position to map center
  });

  Gmap.addListener('idle', function () {

    Gmarker.setPosition(this.getCenter()); // set marker position to map center
 searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      Gmarker.setPosition(place.geometry.location);

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    Gmap.fitBounds(bounds);
  });


    if (Gmarker.getPosition().lat() !== lat || Gmarker.getPosition().lng() !== lng) {
      setTimeout(() => {
        // console.log("I have to get new geocode here!")
        updatePosition(this.getCenter().lat(), this.getCenter().lng()); // update position display
      }, 2000);
    }
  });

}

// Creates marker on the screen
createMarker = (latlng) => {
  let markerOptions = {
    position: latlng,
    map: Gmap,
    animation: google.maps.Animation.BOUNCE,
    clickable: true
    // draggable: true
  };
  Gmarker = new google.maps.Marker(markerOptions);

}

// updatePosition on 
updatePosition = (lat, lng) => {
document.getElementById('lat').value = lat;
document.getElementById('lng').value = lng;
  
}

// Displays the different error messages
showError = (error) => {
  mapArea.style.display = "block"
  switch (error.code) {
    case error.PERMISSION_DENIED:
      mapArea.innerHTML = "You denied the request for your location."
      break;
    case error.POSITION_UNAVAILABLE:
      mapArea.innerHTML = "Your Location information is unavailable."
      break;
    case error.TIMEOUT:
      mapArea.innerHTML = "Your request timed out. Please try again"
      break;
    case error.UNKNOWN_ERROR:
      mapArea.innerHTML = "An unknown error occurred please try again after some time."
      break;
  }
}

const options = {
  enableHighAccuracy: true
}

</script> 
 
</body>


</html>