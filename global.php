<?php
	if(!isset($_SESSION))  {
		session_start();
	}

    $_SESSION['currentRegionId'] = 1;
    $_SESSION['currentStateId'] = 0;
?>