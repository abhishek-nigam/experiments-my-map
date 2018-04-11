<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'headcontent.partial.php' ?>
</head>
<body>
    
    <?php require 'navbar.partial.php' ?>

    <div class="places-container">

        <div class="places-list">
            Hello
        </div>

        <div class="places-map" id="google-map">
            Google Map
        </div>

    </div>

    
    
    
    <script>
    
        function initMap() {

            // Map options
            var options = {
                zoom: 8,
                center: {
                    lat: 28.6315,
                    lng: 77.2167
                }
            };

            // New map
            var map = new google.maps.Map(document.getElementById('google-map'), options);

            // Array of markers
            var markers = [
                <?php foreach($result as $row): ?>
                {
                    coords: {
                        lat: <?= $row['latitude']?>,
                        lng: <?= $row['longitude']?>
                    },
                    content: '<h1><?= $row['title']?></h1><h2><?= $row['description']?></h2>'
                },
                <?php endforeach;?>
            ];

            //Loop through markers
            for(var i=0; i<markers.length; i++) {
                addMarker(markers[i]);
            }

            function addMarker(props) {
                var marker = new google.maps.Marker({
                    position: props.coords,
                    map:map
                });

                if(props.content) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: props.content
                    });

                    marker.addListener('click', function() {
                        infoWindow.open(map, marker);
                    });
                }
            }

        }

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADBEbYuaYW0k6p5LZ3Qrfg4phg8TyPLVM&callback=initMap">
    </script>

</body>
</html>