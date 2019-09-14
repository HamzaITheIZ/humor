<?php

/**
 * 
 */
class DBOperation {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
        public function addRumor($admin, $date, $type, $title, $article, $image) {
        $pre_stmt = $this->con->prepare("INSERT INTO `rumor`(`admin`, `date`, `type`, `title`, `article`, `image`)
		 VALUES (?,?,?,?,?,?)");
        $pre_stmt->bind_param("ssssss", $admin, $date, $type, $title, $article, $image);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "Rumor_Added";
        } else {
            return 0;
        }
    }
}