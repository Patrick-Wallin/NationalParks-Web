<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    function loadParks() {
        $api_url = 'http://localhost/api/parks/';
        
        $region_id = $_SESSION['currentRegionId'];
        $state_id = $_SESSION['currentStateId'];

        $api_url .= $region_id . '/' . $state_id;

		$all_json_data = file_get_contents($api_url);
		$all_data = json_decode($all_json_data,false);
        $all_park = $all_data->data;

        //print_r($all_park);
        $numberOfColumns = 0;
        echo "<div class='row row-cols-1 row-cols-sm-2  row-cols-md-2 row-cols-lg-3 row-cols-xl-4'>";
        foreach($all_park as $data) {
            $id = $data->id;

            echo "<div class='col' style='padding:10px'>";
                echo"<div class='card h-100 shadow-sm'>";
                echo "<div class='embed-responsive embed-responsive-16by9'>";
                echo "<img class='card-img-top embed-responsive-item' src='";
                echo getImageUrl($id);
                // echo "' width='100%' height='225'>";
                echo "'>";
                echo "</div>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$data->fullname</h5>";
                        echo "<h6 class='card-subtitle mb-2 text-muted'>$data->states</h6>";
                        echo "<p class='card-text'>";
                        echo strlen($data->description) > 250 ? substr($data->description,0,250) . '...': $data->description;
                        echo "</p>";
                    
                    echo "</div>";                
                    echo "<div style='margin-bottom:10px;margin-right:10px'>";
                    echo "<a href='#' class='stretched-link parkdetail' parkid=$id style='float:right'>Continue reading</a>";
                    echo "</div>";

                echo "</div>";

            echo "</div>";

            $numberOfColumns++;
        }
        echo "</div>";
    }
    
    function getImageUrl($park_id) {
        $api_url = 'http://localhost/api/image/' . $park_id;

		$image_json_data = file_get_contents($api_url);
        $image_data = json_decode($image_json_data,false);
        $all_images = $image_data->data;

        $result_image_url = '';

        
        foreach($all_images as $data) {
            $result_image_url = $data->url;
            break;
        }

        return $result_image_url;

    }


?>