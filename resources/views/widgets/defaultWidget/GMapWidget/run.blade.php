@if(!empty($options['api_key']))
    <?php
    $options['latitude'] = (isset($options['latitude']) && ('' !== $options['latitude'])) ? $options['latitude'] : 0;
    $options['longitude'] = (isset($options['longitude']) && ('' !== $options['longitude'])) ? $options['longitude'] : 0;
    $options['zoom'] = (isset($options['zoom']) && ('' !== $options['zoom'])) ? $options['zoom'] : 7;
    ?>
    <div class="gmap">
        <div id="map"></div>
    </div>

    <style>
        #map {
            height: {{ empty($options['height']) ? "100%" : $options['height']."px" }};
            width: {{ empty($options['width']) ? "100%" : $options['width']."px" }};
        }
    </style>

    <script>
        function initMap() {
            var myLatLng = {
                lat: {{ (float)$options['latitude'] }},
                lng: {{ (float)$options['longitude'] }}
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: {{ (int)$options['zoom'] }},
                center: myLatLng
            });

                    <?php if(isset($options['latitude']) && isset($options['longitude'])){ ?>
            var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: "{{$options['title']}}"
                    });
            <?php } ?>
        }
    </script>
    <script async defer
            src="{{ "https://maps.googleapis.com/maps/api/js?key={$options['api_key']}&callback=initMap" }}">
    </script>
@endif