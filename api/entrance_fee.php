<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $data = new EntranceFee($db);

    $park_id = isset($_GET['park_id']) ? (EMPTY($_GET['park_id']) ? 0 : $_GET['park_id']) : 0;

    if($park_id == 0) {
        echo json_encode(array('message' => 'Please enter park id. Example: entrance_fee/1'));
    }else {
        $result = $data->getAllEntranceFeeBasedOnParkId($park_id);

        $num = $result->rowCount();

        if($num > 0) {
            $post_arr = array();
            $post_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'id' => $id,
                    'park_id' => $park_id,
                    'cost' => $cost,
                    'description' => $description,
                    'title' => $title
                );
                array_push($post_arr['data'], $post_item);
            }

            echo json_encode($post_arr);
        }else {
            echo json_encode(array('message' => 'No entrance fee found.'));
        }
    }
?>