<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=<?= $this->config->item('map-key'); ?>"></script>
<script>

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }
    function showPosition(position) {
        GetAddress(position.coords.latitude, position.coords.longitude)
    }

    function GetAddress(lat, lng) {
        var ecountries = ["Austria","Belgium","Croatia","Cyprus","Estonia","Finland","France","Germany","Greece","Ireland","Italy","Latvia","Lithuania","Luxembourg","Malta","the Netherlands","Portugal","Slovakia","Slovenia","Spain"];
        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = geocoder = new google.maps.Geocoder();
        geocoder.geocode({'latLng': latlng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[1].address_components;
                    for (var i = 0, iLen = address.length; i < iLen; i++) {
                        if (address[i].types[0] === 'country') {
                            var countryName = address[i].short_name;
                            if(ecountries.includes("countryName")){
                             <?php $this->session->set_userdata('user_currency','EUR');?> 
                            }else{
                                 <?php $this->session->set_userdata('user_currency','USD');?> 
                            }
                        }
                    }
                }
            }
        });
    }
    
    getLocation()
    
</script>