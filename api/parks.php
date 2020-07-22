<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $data = new Park($db);

    $region_id = isset($_GET['region_id']) ? (EMPTY($_GET['region_id']) ? 0 : $_GET['region_id']) : 0;
    $state_id = isset($_GET['state_id']) ? (EMPTY($_GET['state_id']) ? 0 : $_GET['state_id']) : 0;
    $result = null;

    if($region_id == 0) {
        $result = $data->getAllParks();
    }else {
        $result = $data->getAllParksBasedOnRegionAndStates($region_id,$state_id);
    }

    $num = $result->rowCount();

    if($num > 0) {
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $post_item = array(
                'id' => $id,
                'park_id' => $park_id,
                'description' => $description,
                'designation' => $designation,
                'directionsinfo' => $directionsinfo,
                'directionsurl' => $directionsurl,
                'fullname' => $fullname,
                'latlong' => $latlong,
                'longitude' => $longitude,
                'name' => $name,
                'parkcode' => $parkcode,
                'states' => $states,
                'url' => $url,
                'weatherinfo' => $weatherinfo
            );
            array_push($post_arr['data'], $post_item);
        }

        echo json_encode($post_arr);
    }else {
        echo json_encode(array('message' => 'No park found.'));
    }

?>