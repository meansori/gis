<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <style>
        #map {
            weight: 500px;
            height: 500px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        var map = L.map('map').setView([-6.930588, 107.645393], 13);


        // Tile
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);


        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;

        googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // Marker dan alert
        // var marker = L.marker([-6.930588, 107.645393]).addTo(map).on('click', function(e){
        //     alert(e.latlng);
        // });

        // create a red polyline from an array of LatLng points
        var latlngs = [
            [
                -6.9305189722346086,
                107.6453731297305
            ],
            [
                -6.930527299209359,
                107.64543310583701
            ],
            [
                -6.930562688852817,
                107.64542807287734
            ],
            [
                -6.930561439806738,
                107.64540458573094
            ],
            [
                -6.9306068218156724,
                107.64539997218452
            ],
            [
                -6.930601825631712,
                107.64536264439789
            ],
            [
                -6.930553945528828,
                107.64536767735751
            ],
            [
                -6.93051813953528,
                107.64537271031372
            ]
        ];

        // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

        // zoom the map to the polyline
        // map.fitBounds(polyline.getBounds());


        // event pada polyline
        // polyline.on('click', (e)=>{

        //     polyline.setStyle({
        //         color: "yellow",
        //     });
        // });


        // create a red polygon from an array of LatLng points

        var polygon = L.polygon(latlngs, {
            color: 'red'
        }).addTo(map);

        // zoom the map to the polygon
        map.fitBounds(polygon.getBounds());
        var polygon = L.polygon(latlngs, {
            color: 'red'
        }).addTo(map);
        polygon.setStyle({
            color: 'yellow',
            fillcolor: 'blue'
        });



        $(document).ready(function(data) {
            $.getJSON('titik/json', function(data) {
                $.each(data, function(index) {
                    // L.marker([data[index].longitude, data[index].latitude]).addTo(map);
                    var d = [
                        [data[index].longitude, data[index].latitude]
                    ]
                    var polygon = L.polygon(d, {
                        color: 'red'
                    }).addTo(map);

                    // zoom the map to the polygon
                    map.fitBounds(polygon.getBounds());
                    var polygon = L.polygon(d, {
                        color: 'red'
                    }).addTo(map);
                });
            });
        });
    </script>
</body>

</html>