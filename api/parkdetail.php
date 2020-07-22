<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $data = new Park($db);

    $park_id = isset($_GET['park_id']) ? (EMPTY($_GET['park_id']) ? 0 : $_GET['park_id']) : 0;

    if($park_id == 0) {
        echo json_encode(array('message' => 'Please enter park id. Example: park/detail/1'));
    }else {
        $reserve_park_id = $park_id;

        $result = $data->getParkDetail($reserve_park_id);
        
        $num = $result->rowCount();

        if($num > 0) {
            $post_arr = array();
            $post_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'id' => $id,
                    'description' => $description,
                    'designation' => $designation,
                    'directionsinfo' => $directionsinfo,
                    'directionsurl' => $directionsurl,
                    'fullname' => $fullname,
                    'latlong' => $latlong,
                    'longitude' => $longitude,
                    'states' => $states,
                    'url' => $url,
                    'weatherinfo' => $weatherinfo,
                    'entrancefee' => array(),
                    'entrancepass' => array(),
                    'activity' => array(),
                    'topic' => array(),
                    'address' => array(),
                    'contact_email_address' => array(),
                    'contact_phone_number' => array(),
                    'image' => array(),
                    'operating_hour' => array()
                );
                
                $entranceFee = new EntranceFee($db);
                $resultFee = $entranceFee->getAllEntranceFeeBasedOnParkId($reserve_park_id);
                $numFee = $resultFee->rowCount();

                $post_fee = array();
    
                if($numFee > 0) {
                    while($row = $resultFee->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_fee = array(
                            'id' => $id,
                            'cost' => $cost,
                            'description' => $description,
                            'title' => $title
                        );

                        array_push($post_item['entrancefee'],$post_fee);
                    }        
                }

                $entrancePass = new EntrancePass($db);
                $resultPass = $entrancePass->getAllEntrancePassBasedOnParkId($reserve_park_id);
                $numPass = $resultPass->rowCount();

                $post_pass = array();
    
                if($numPass > 0) {
                    while($row = $resultPass->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_pass = array(
                            'id' => $id,
                            'cost' => $cost,
                            'description' => $description,
                            'title' => $title
                        );

                        array_push($post_item['entrancepass'],$post_pass);
                    }        
                }

                $activity = new Activity($db);
                $resultActivity = $activity->getAllActivityBasedOnParkId($reserve_park_id);
                $numActivity = $resultActivity->rowCount();

                $post_activity = array();
    
                if($numActivity > 0) {
                    while($row = $resultActivity->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_activity = array(
                            'id' => $id,
                            'name' => $name
                        );

                        array_push($post_item['activity'],$post_activity);
                    }        
                }

                $topic = new Topic($db);
                $resultTopic = $topic->getAllTopicBasedOnParkId($reserve_park_id);
                $numTopic = $resultTopic->rowCount();

                $post_topic = array();
    
                if($numTopic > 0) {
                    while($row = $resultTopic->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_topic = array(
                            'id' => $id,
                            'name' => $name
                        );

                        array_push($post_item['topic'],$post_topic);
                    }        
                }

                $address = new Address($db);
                $resultAddress = $address->getAllAddressBasedOnParkId($reserve_park_id);
                $numAddress = $resultAddress->rowCount();

                $post_address = array();
    
                if($numAddress > 0) {
                    while($row = $resultAddress->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_address = array(
                            'id' => $id,
                            'postalcode' => $postalcode,
                            'city' => $city,
                            'statecode' => $statecode,
                            'line1' => $line1,
                            'type' => $type,
                            'line3' => $line3,
                            'line2' => $line2
                        );

                        array_push($post_item['address'],$post_address);
                    }        
                }


                $contactEmailAddress = new ContactEmailAddress($db);
                $resultContactEmailAddress = $contactEmailAddress->getAllEmailAddressBasedOnParkId($reserve_park_id);
                $numContactEmailAddress = $resultContactEmailAddress->rowCount();

                $post_contactemailaddress = array();
    
                if($numContactEmailAddress > 0) {
                    while($row = $resultContactEmailAddress->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_email_address = array(
                            'id' => $id,
                            'emailaddress' => $emailaddress,
                            'description' => $description
                        );

                        array_push($post_item['contact_email_address'],$post_email_address);
                    }        
                }

                $contactPhoneNumber = new ContactPhoneNumber($db);
                $resultContactPhoneNumber = $contactPhoneNumber->getAllPhoneNumberBasedOnParkId($reserve_park_id);
                $numContactPhoneNumber = $resultContactPhoneNumber->rowCount();
    
                if($numContactPhoneNumber > 0) {
                    while($row = $resultContactPhoneNumber->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_phone_number = array(
                            'id' => $id,
                            'phonenumber' => $phonenumber,
                            'description' => $description,
                            'extension' => $extension,
                            'type' => $type
                        );

                        array_push($post_item['contact_phone_number'],$post_phone_number);
                    }        
                }

                $image = new Image($db);
                $resultImage = $image->getAllImageBasedOnParkId($reserve_park_id);
                $numImage = $resultImage->rowCount();
    
                if($numImage > 0) {
                    while($row = $resultImage->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_image = array(
                            'id' => $id,
                            'credit' => $credit,
                            'alttext' => $alttext,
                            'title' => $title,
                            'caption' => $caption,
                            'url' => $url
                        );

                        array_push($post_item['image'],$post_image);
                    }        
                }

                $operatingHour = new OperatingHours($db);
                $resultOperatingHour = $operatingHour->getAllOperatingHourBasedOnParkId($reserve_park_id);
                $numOperatingHour = $resultOperatingHour->rowCount();
    
                if($numOperatingHour > 0) {
                    while($row = $resultOperatingHour->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_operating_hour = array(
                            'id' => $id,
                            'description' => $description,
                            'name' => $name,
                            'standard_hours' => $standard_hours
                        );

                        array_push($post_item['operating_hour'],$post_operating_hour);
                    }        
                }



                array_push($post_arr['data'], $post_item);




            }

            




            echo json_encode($post_arr);
        }else {
            echo json_encode(array('message' => 'No park found.'));
        }
    }
?>