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
            $date = date("d/m/Y H:i:s");
            $insertquery = "insert into history values('Insert','" . $_SESSION['adminusername'] . "','" . $date . "')";
            $this->con->query($insertquery) or die($this->con->error);
            return "Rumor_Added";
        } else {
            return 0;
        }
    }

    public function addPersonalRumor($from, $to, $rumor) {
        $pre_stmt = $this->con->prepare("INSERT INTO `selfrumors`(`fromUser`, `toUser`, `date`, `rumor`)
		 VALUES (?,?,?,?)");
        $date = date("d/m/Y");
        $pre_stmt->bind_param("ssss", $from, $to, $date, $rumor);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "SelfRumor_Added";
        } else {
            return 0;
        }
    }

    public function addSuggestRumor($username, $title, $article) {
        $pre_stmt = $this->con->prepare("INSERT INTO `suggestrumors` (`username`, `title`, `article`, `date`) VALUES (?,?,?,?)");
        $date = date("M") . ' ' . date("d") . ', ' . date("Y");
        $pre_stmt->bind_param("ssss", $username, $title, $article, $date);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "Suggest_Added";
        } else {
            return 0;
        }
    }

    public function addContactMessage($username, $message) {
        $pre_stmt = $this->con->prepare("INSERT INTO `usercontact` (`username`, `message`, `date`) VALUES (?,?,?)");
        $date = date("M") . ' ' . date("d") . ', ' . date("Y");
        $pre_stmt->bind_param("sss", $username, $message, $date);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "Contact_message_Added";
        } else {
            return 0;
        }
    }

    public function getAllRecord($table) {
        $query = "SELECT * FROM " . $table;
        $pre_stmt = $this->con->prepare($query);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }
        public function getAllStat($table) {
        $sql = "SELECT Count(*) as 'totale' FROM " . $table;
        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else if ($result->num_rows > 1) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return $rows;
        }
    }

}
