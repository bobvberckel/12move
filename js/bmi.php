<?php
$gewicht = $_GET["gewicht"];
$lengte = $_GET["lengte"];

function bmi($gewicht, $lengte) {
    return round(
        $gewicht /
        ($lengte/ 100 * $lengte/ 100),
        2);
}
echo bmi($gewicht, $lengte);