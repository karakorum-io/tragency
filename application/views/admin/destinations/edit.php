<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('map-key'); ?>&libraries=places"></script>
    <style>
        .book_fixed {
            display: none;
        }

        #pac-input {
            display: none;
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
        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class=" h5 mr-2">Update Destination</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form action="<?php echo base_url('admin/destinations/edit/'.$destination->id) ?>"
                                            method="post" enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label for="email">Name</label>
                                                    <input name="name" value="<?php echo $destination->name ?>"
                                                        class="form-control " id="email" type="text" required="">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Add Image</label>
                                                    <input type="file" name="image" accept="image/*"
                                                        class="form-control ">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <img class="img-thumbnail"
                                                    style="    height: 103px;width: auto;"
                                                    src="<?php echo base_url() ?>uploads/destinations/<?php echo $destination->image; ?>"
                                                    />
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                    <input id="pac-input" class="controls" type="text"
                                                        placeholder="Search Box" />
                                                    <div id="map">
                                                    </div>
                                                    <p id="current_position"></p>
                                                    <p id="showMe" class="btn btn-warning">
                                                        <i class="nav-icon i-Map-Marker"></i> Get Lat&Lng
                                                    </p>
                                                    <span id='message'></span>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="email">Latitude</label>
                                                    <input name="latitude" value="<?php echo $destination->latitude ?>"
                                                        class="form-control " id="lat" type="text" required="">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="email">Longitude</label>
                                                    <input name="longitude"
                                                        value="<?php echo $destination->longitude ?>"
                                                        class="form-control " id="lng" type="text" required="">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="email">Overview</label>
                                                    <textarea name="overview" class="form-control"
                                                        required=""><?php echo $destination->description ?></textarea>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="email">Weather</label>
                                                    <textarea name="weather" class="form-control"
                                                        required=""><?php echo $destination->weather ?></textarea>
                                                </div>
                                                <div class="form-group col-sm-12 text-right">
                                                    <a href="<?php echo base_url()?>admin/destinations" class="btn btn-default">Cancel</a>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow-1"></div>
    </div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('overview');
        CKEDITOR.replace('weather');
    </script>
    <script>

        const mapArea = document.getElementById('map');
        const actionBtn = document.getElementById('showMe');
        let Gmap, Gmarker;
        const __KEY = "<?php echo $this->config->item('map-key'); ?>";
        actionBtn.addEventListener('click', e => {
            actionBtn.style.display = "none";
            document.getElementById("pac-input").style.display = "block";
            document.getElementById("message").innerHTML = ' ';

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

        showMap = (latlng, lat, lng) => {
            let mapOptions = {
                center: latlng,
                zoom: 11
            };

            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            Gmap = new google.maps.Map(mapArea, mapOptions);
            Gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            Gmap.addListener("bounds_changed", () => {
                searchBox.setBounds(Gmap.getBounds());
            });
            Gmap.addListener('drag', function () {
                Gmarker.setPosition(this.getCenter());
            });
            Gmap.addListener('dragend', function () {
                Gmarker.setPosition(this.getCenter());
            });
            Gmap.addListener('idle', function () {
                Gmarker.setPosition(this.getCenter());
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
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    Gmap.fitBounds(bounds);
                });
                if (Gmarker.getPosition().lat() !== lat || Gmarker.getPosition().lng() !== lng) {
                    setTimeout(() => {
                        updatePosition(this.getCenter().lat(), this.getCenter().lng()); // update position display
                    }, 2000);
                }
            });
        }

        createMarker = (latlng) => {
            let markerOptions = {
                position: latlng,
                map: Gmap,
                animation: google.maps.Animation.BOUNCE,
                clickable: true
            };
            Gmarker = new google.maps.Marker(markerOptions);
        }

        updatePosition = (lat, lng) => {
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }

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