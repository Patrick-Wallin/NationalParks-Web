<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    function loadParkDetail($park_id) {
        $api_url = 'http://localhost/api/park/detail/';
        
        $api_url .= $park_id;

		$all_json_data = file_get_contents($api_url);
		$all_data = json_decode($all_json_data,false);
        $all_detail = $all_data->data;

        //print_r($all_detail);

        foreach($all_detail as $data) {
            echo "<div class='container'>";
              echo "<h1 class='text-center' style='color:#114875;text-decoration: underline;'>$data->fullname</h1>";
              echo "<p class='lead text-muted' >$data->description</p>";
              echo "<div class='container'>";
              
              //echo "<div class='card-deck mb-3 text-center'>";
              echo "<div class='row text-center'>";
                
                echo "<div class='col' style='padding:10px text-center'>";
                    echo"<div class='card mb-4 shadow-sm'>";
                        echo "<div class='card-header'>";
                        echo "<h4 class='my-0 font-weight-normal'>Activities</h4>";
                        echo "</div>";

                        echo "<div class='card-body'>";
                            if(!empty($data->activity)) {                
                                echo "<ul class='list-unstyled mt-3 mb-4'>";
                                foreach($data->activity as $activity) {
                                    echo "<li>";
                                    echo $activity->name;
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }else {
                                echo "<p>No Activity</p>";

                            }                            
                        echo "</div>";                

                    echo "</div>";
                echo "</div>";

                echo "<div class='col' style='padding:10px text-center'>";
                    echo"<div class='card mb-4 shadow-sm'>";
                        echo "<div class='card-header'>";
                        echo "<h4 class='my-0 font-weight-normal'>Topics</h4>";
                        echo "</div>";

                        echo "<div class='card-body'>";
                            if(!empty($data->topic)) {                
                                echo "<ul class='list-unstyled mt-3 mb-4'>";
                                foreach($data->topic as $topic) {
                                    echo "<li>";
                                    echo $topic->name;
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }else {
                                echo "<p>No Topic</p>";

                            }                            
                        echo "</div>";                

                    echo "</div>";
                echo "</div>";

                echo "<div class='col' style='padding:10px text-center'>";
                    echo"<div class='card mb-4 shadow-sm'>";
                        echo "<div class='card-header'>";
                        echo "<h4 class='my-0 font-weight-normal'>Entrance Fees</h4>";
                        echo "</div>";

                        echo "<div class='card-body'>";
                            if(!empty($data->entrancefee)) {  
                                echo "<div class='list-group'>";              
                                foreach($data->entrancefee as $entrancefee) {

                                    //echo "<a href='#' class='list-group-item list-group-item-action'>";
                                    echo "<div class='d-flex w-100 justify-content-between' style='text-align: left;'>";
                                    echo "<h5 class='mb-1'>$entrancefee->title</h5>";
                                    //echo "<small>3 days ago</small>";
                                    echo "</div>";
                                    echo "<p class='mb-1' style='text-align:left'>$entrancefee->description</p>";
                                    $snum = number_format($entrancefee->cost,2,".",",");
                                    echo "<div style='float:right'>Cost: $snum</div>";
                                    //echo "</a>";

                                }
                                echo "</div>";
                            }else {
                                echo "<p>No Entrance Fee</p>";

                            }                            
                        echo "</div>";                

                    echo "</div>";
                echo "</div>";

                echo "<div class='col' style='padding:10px text-center'>";
                    echo"<div class='card mb-4 shadow-sm'>";
                        echo "<div class='card-header'>";
                        echo "<h4 class='my-0 font-weight-normal'>Entrance Passes</h4>";
                        echo "</div>";

                        echo "<div class='card-body'>";
                            if(!empty($data->entrancepass)) {  
                                echo "<div class='list-group'>";              
                                foreach($data->entrancepass as $entrancepass) {
                                    //echo "<a href='#' class='list-group-item list-group-item-action'>";
                                    echo "<div class='d-flex w-100 justify-content-between' style='text-align: left;'>";
                                    echo "<h5 class='mb-1'>$entrancepass->title</h5>";
                                    //echo "<small>3 days ago</small>";
                                    echo "</div>";
                                    echo "<p class='mb-1' style='text-align:left'>$entrancepass->description</p>";
                                    $snum = number_format($entrancepass->cost,2,".",",");
                                    echo "<div style='float:right'>Cost: $snum</div>";
                                    //echo "</a>";

                                }
                                echo "</div>";
                            }else {
                                echo "<p>No Entrance Fee</p>";

                            }                            
                        echo "</div>";                

                    echo "</div>";
                echo "</div>";

              
              echo "</div>";
              echo "</div>";
            echo "</div>";
        }
        /*
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
                    echo "<a href='#' class='stretched-link parkdetail' style='float:right'>Continue reading</a>";
                    echo "</div>";

                echo "</div>";

            echo "</div>";

            $numberOfColumns++;
        }
        echo "</div>";
        */
    }
    

?>