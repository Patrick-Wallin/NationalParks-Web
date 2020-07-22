<?php
    require_once 'loadregionsandstates.php';
    require_once 'loadparks.php';
    require_once 'loadparkdetail.php';

    if (isset($_GET['region_id'])) {
        $_SESSION['currentRegionId']  = $_GET['region_id'];
        return loadStates();
    }else {
        if (isset($_GET['state_id'])) {
            $_SESSION['currentStateId']  = $_GET['state_id'];
            return loadParks();
        }else {
            if (isset($_GET['park_id'])) {
                return loadParkDetail($_GET['park_id']);
            }
    
        }

    }
?>