<?php
class DB {
    public $conn;

    public function __construct() {
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "plants";
        $this->conn = new mysqli($servername, $user, $pass, $dbname);
    }
}
?>
