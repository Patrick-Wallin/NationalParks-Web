<?php
    class Park {
        private $conn;
        private $table = 'park';

        public $id;
        public $park_id;
        public $description;
        public $designation;
        public $directionsinfo;
        public $directionsurl;
        public $fullname;
        public $latlong;
        public $longitude;
        public $name;
        public $parkcode;
        public $states;
        public $url;
        public $weatherinfo;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllParks() {
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY fullname asc';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getAllParksBasedOnRegionAndStates($regionid, $stateid) {
            if($stateid == 0) {
                $query = "SELECT park.* FROM park INNER JOIN states ON park.states LIKE CONCAT('%', states.abbreviation, '%') and states.region_id = $regionid ORDER BY fullname asc";
            }else {
                $query = "SELECT park.* FROM park INNER JOIN states ON park.states LIKE CONCAT('%', states.abbreviation, '%') and states.id = $stateid ORDER BY fullname asc";
            }
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getParkDetail($parkid) {
            // need the following
            // park.id, park.description,park.directionsinfo,park.latlong,park.weatherinfo
            // activity.name
            // entrancefee.cost, entrancefee.description, entrancefee.title
            // entrancepass.cost,description,title
            $query = "select * from park WHERE id = " . $parkid;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        

    }

    class ContactEmailAddress {
        private $conn;
        private $table = 'contact_email_address';

        public $id;
        public $park_id;
        public $emailaddress;
        public $description;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllEmailAddressBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class ContactPhoneNumber {
        private $conn;
        private $table = 'contact_phone_number';

        public $id;
        public $park_id;
        public $phonenumber;
        public $description;
        public $extension;
        public $type;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllPhoneNumberBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class EntranceFee {
        private $conn;
        private $table = 'entrancefee';

        public $id;
        public $park_id;
        public $cost;
        public $description;
        public $title;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllEntranceFeeBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class EntrancePass {
        private $conn;
        private $table = 'entrancepass';

        public $id;
        public $park_id;
        public $cost;
        public $description;
        public $title;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllEntrancePassBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class Image {
        private $conn;
        private $table = 'image';

        public $id;
        public $park_id;
        public $credit;
        public $alttext;
        public $title;
        public $caption;
        public $url;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllImageBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class Topic {
        private $conn;
        private $table = 'topic';

        public $id;
        public $park_id;
        public $topic_id;
        public $name;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllTopicBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class Activity {
        private $conn;
        private $table = 'activity';

        public $id;
        public $park_id;
        public $activity_id;
        public $name;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllActivityBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class Address {
        private $conn;
        private $table = 'address';

        public $id;
        public $park_id;
        public $postalcode;
        public $city;
        public $statecode;
        public $line1;
        public $type;
        public $line3;
        public $line2;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllAddressBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class OperatingHours {
        private $conn;
        private $table = 'operating_hour';

        public $id;
        public $park_id;
        public $description;
        public $name;
        public $standard_hours;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllOperatingHourBasedOnParkId($parkId) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE park_id = ' . $parkId;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }

    class RegionsAndStates {
        private $conn;
        private $table_regions = 'regions';
        private $table_states = 'states';

        public $regions_id;
        public $regions_name;
        public $states_id;
        public $states_name;
        public $states_abbreviation;
        public $states_region_id;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAllRegions() {
            $query = 'SELECT * FROM ' . $this->table_regions;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getAllStatesBasedonRegions($region_id) {
            $query = 'SELECT * FROM ' . $this->table_states . ' WHERE region_id = ' . $region_id;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

    }

?>