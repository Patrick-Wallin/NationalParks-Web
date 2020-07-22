<?php
    if(!isset($_SESSION)) {
        session_start();
    }

	function loadRegions() {
		$api_url = 'http://localhost/api/regions';

		$all_json_data = file_get_contents($api_url);
		$all_data = json_decode($all_json_data,false);
        $all_regions = $all_data->data;

        $firstColumn = true;
        foreach($all_regions as $data) {
            $id = $data->id;

            
            if($firstColumn == true) {
                echo "<li class='nav-item'>";
                $_SESSION['currentRegionId'] = $data->id;
                echo "<a class='nav-link regionmenu' regionid=$data->id href='#'>$data->name</a>";
                $firstColumn = false;
            }else {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link regionmenu' regionid=$data->id href='#'>$data->name</a>";

            }
            echo "</li>";
        }

    }

    function loadStates() {
		$api_url = 'http://localhost/api/states/' . $_SESSION['currentRegionId'];

		$all_json_data = file_get_contents($api_url);
		$all_data = json_decode($all_json_data,false);
        $all_states = $all_data->data;
        
        $cnt = 0;
        foreach($all_states as $data) {
            if($cnt == 0) {
                echo "<li class='nav-item'>";
            }else {
                echo "<li class='nav-item'>";
            }
            echo "<a class='nav-link selectedstatemenu' stateid=$data->id href='#'>$data->name</a>";
            echo "</li>";
            $cnt++;
        }

    }


?>