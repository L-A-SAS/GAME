<?php

include("classes/connect.php");

function get_confirmed_locations(){
    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"SELECT location_id ,lat,lng,description,location_status,question AS isconfirmed FROM `locations` WHERE  location_status = 1 ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

 

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

function get_location_id(){

}