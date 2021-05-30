<?php

use vendor\dosamigos\google\maps\LatLng;
use vendor\dosamigos\google\maps\services\DirectionsWayPoint;
use vendor\dosamigos\google\maps\services\TravelMode;
use vendor\dosamigos\google\maps\overlays\PolylineOptions;
use vendor\dosamigos\google\maps\services\DirectionsRenderer;
use vendor\dosamigos\google\maps\services\DirectionsService;
use vendor\dosamigos\google\maps\overlays\InfoWindow;
use vendor\dosamigos\google\maps\overlays\Marker;
use vendor\dosamigos\google\maps\Map;
use vendor\dosamigos\google\maps\services\DirectionsRequest;
use vendor\dosamigos\google\maps\overlays\Polygon;
use vendor\dosamigos\google\maps\layers\BicyclingLayer;

$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
$map = new Map([
    'center' => $coord,
    'zoom' => 18,
    'width' => '100%',
    'height' => 450,
    //'language' => 'ja',
        ]);

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
        ]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
        new InfoWindow([
    'content' => '<p>This is my super cool content</p>'
        ])
);

// Add marker to the map
$map->addOverlay($marker);

// Display the map -finally :)
echo $map->display(); 


?>



  <p><a class="btn btn-default" href='/about'>Предстоящие события</a></p>

