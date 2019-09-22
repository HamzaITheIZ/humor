<?php

/**
 * 
 */
class Manage {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function deleteRecord($table, $pk, $id) {
        $pre_stmt = $this->con->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
        $pre_stmt->bind_param("i", $id);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            if ($table === 'rumor') {
                $date = date("d/m/Y H:i:s");
                $insertquery = "insert into history values('Deleted','" . $_SESSION['adminusername'] . "','" . $date . "')";
                $this->con->query($insertquery) or die($this->con->error);
            }
            return "DELETED";
        }
    }

    public function getSingleRecord($table, $pk, $id) {
        $pre_stmt = $this->con->prepare("SELECT * FROM " . $table . " WHERE " . $pk . "= ? LIMIT 1");
        $pre_stmt->bind_param("i", $id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    public function update_record($table, $where, $fields) {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='" . $value . "', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $condition;
        if (mysqli_query($this->con, $sql)) {
            if ($table == 'rumor') {
                $date = date("d/m/Y H:i:s");
                $insertquery = "insert into history values('Update','" . $_SESSION['adminusername'] . "','" . $date . "')";
                $this->con->query($insertquery) or die($this->con->error);
            }
            return "UPDATED";
        }
    }

    public function consultRumors($table) {
        $sql = "Select * from ".$table;
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows];
    }
   
}

?>