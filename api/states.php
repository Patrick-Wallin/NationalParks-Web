<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $data = new RegionsAndStates($db);

    $region_id = isset($_GET['region_id']) ? (EMPTY($_GET['region_id']) ? 0 : $_GET['region_id']) : 0;

    if($region_id == 0) {
        echo json_encode(array('message' => 'Please enter region id. Example: states/1'));
    }else {
        $result = $data->getAllStatesBasedonRegions($region_id);
        
        $num = $result->rowCount();

        if($num > 0) {
            $post_arr = array();
            $post_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'id' => $id,
                    'name' => $name,
                    'abbreviation' => $abbreviation,
                    'region_id' => $region_id
                );
                array_push($post_arr['data'], $post_item);
            }

            echo json_encode($post_arr);
        }else {
            echo json_encode(array('message' => 'No state found.'));
        }
    }
?>