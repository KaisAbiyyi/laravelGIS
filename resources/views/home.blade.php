<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet-vector@3.1.3/dist/esri-leaflet-vector.js"
        integrity="sha512-2sbebld2cAnzUw4nloopGcKE7AGl7xUlCXg8amUWS47veGTKMH6tx1VsT7U9ukwXPAVzecigXK0jMtS5UcllDg=="
        crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Leaflet Project</title>
    <style>
        #map {
            height: 400px
        }

        .marker-label {
            font-size: 40px;
            color: maroon;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="map"></div>
</body>

<script>
    var map = L.map('map').setView([-6.9676561, 107.6568906], 13);

    // Hybrid: s,h;
    // Satellite: s;
    // Streets: m;
    // Terrain: p;

    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    var marker = L.marker([-6.9676561, 107.6568906]).addTo(map).on('click', function(e) {
        alert(e.latlng);
    });

    var latlngs = [
        [
            -6.87666492821222,
            107.55168914794922,
        ],
        [
            -6.9540322251573325,
            107.56404876708984,
        ],
        [
            -6.946193825642211,
            107.62035369873047,
        ],
        [
            -6.9042732142533625,
            107.61451721191406,
        ],
        [
            -6.905977376721612,
            107.6107406616211,
        ]
    ];

    // var polyline = L.polyline(latlngs, {
    //     color: 'maroon'
    // }).addTo(map);

    // // zoom the map to the polyline
    // map.fitBounds(polyline.getBounds());

    // polyline.on('click', (e) => {
    //     // alert(e.latlng);
    //     polyline.setStyle({
    //         color: 'red'
    //     });
    // })

    var latlngs = [
        [
            -6.8650757864858285,
            107.52971649169922,
        ],
        [
            -6.958803360835595,
            107.55409240722655,
        ],
        [
            -6.951305840153171,
            107.58739471435547,
        ],
        [
            -6.925745212318305,
            107.57743835449217,
        ],
        [
            -6.943467395179296,
            107.60936737060547,
        ],
        [
            -6.93358395234781,
            107.63992309570311,
        ],
        [
            -6.899501526694438,
            107.5949478149414,
        ],
        [
            -6.851441140808389,
            107.62104034423828,
        ],
        [
            -6.860303704893429,
            107.57057189941406,
        ],
        [
            -6.892684746773636,
            107.56988525390624,
        ],
        [
            -6.860644569450538,
            107.56130218505858,
        ],
        [
            -6.85825851242774,
            107.55992889404297,
        ],
        [
            -6.8650757864858285,
            107.52971649169922,
        ]
    ];

    var polygon = L.polygon(latlngs, {
        color: 'red'
    }).addTo(map);

    // zoom the map to the polygon
    map.fitBounds(polygon.getBounds());

    polygon.on('click', (e) => {
        alert('Kais Abiyyi')
    })

    $(document).ready(function() {
        $.getJSON('marker/json', function(data) {
            $.each(data, function(index) {
                L.marker([data[index].longitude, data[index].latitude]).addTo(map)
            })
        })
    });
    $.getJSON('/maps/map.geojson', function(json) {
        geoLayer = L.geoJson(json, {
            style: function(feature) {
                return {
                    fillOpacity: 0.5,
                    weight: 5,
                    opacity: 1,
                    color: 'maroon'
                };
            },
            onEachFeature: function(feature, layer) {
                //alert(feature.properties.name)
                var iconLabel = L.divIcon({
                    className: 'marker-label',
                    html: '<b>' + feature.properties.name + '</b>',
                    iconSize: [100, 20]
                });

                L.marker(layer.getBounds().getCenter(), {icon: iconLabel}).addTo(map);

                layer.addTo(map);
            }
        })
    })
</script>

</html>
