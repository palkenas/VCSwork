<?php
include './Models/Db.php';

class Plant
{
    public $id;
    public $namelt;
    public $namelat;
    public $isperennial;
    public $age;
    public $height;

    public function __construct($id, $namelt, $namelat, $isperennial, $age, $height)
    {
        $this->id = $id;
        $this->namelt = $namelt;
        $this->namelat = $namelat;
        $this->isperennial = $isperennial;
        $this->age = $age;
        $this->height = $height;
    }

    public static function find($id)
    {
        $db = new Db();
        $stmt = $db->conn->prepare("SELECT * FROM plants_registration WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $plant = new Plant($row['id'], $row['namelt'], $row['namelat'], $row['isperennial'], $row['age'], $row['height']);
        }
        $db->conn->close();
        return $plant;
    }

    public static function all()
    {
        $plants = [];
        $db = new DB();
        $sql = "SELECT * FROM `plants_registration`";
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $plants[] = new Plant($row['id'], $row['namelt'], $row['namelat'], $row['isperennial'], $row['age'], $row['height']);
        }
        $db->conn->close();
        return $plants;
        print_r($plants);
    }

    public static function create()
    {
        $db = new DB();
        print_r($db);
        $stmt = $db->conn->prepare("INSERT INTO plants_registration (namelt, namelat, isperennial, age, height) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiid", $_POST["namelt"], $_POST["namelat"], $_POST["isperennial"], $_POST["age"], $_POST["height"]);
        $stmt->execute();
        $stmt->close();
        print_r($db->conn);
        $db->conn->close();
    }
    public static function update()
    {
        $db = new DB();
        print_r($db);
        $stmt = $db->conn->prepare("UPDATE plants_registration SET namelt = ?, namelat = ?, isperennial = ?, age = ?, height = ? WHERE id = ?");
        $stmt->bind_param("ssiidi", $_POST["namelt"], $_POST["namelat"], $_POST["isperennial"], $_POST["age"], $_POST["height"], $_POST["id"]);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }
    public static function destroy()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM plants_registration WHERE id = ?");
        $stmt->bind_param("i", $_POST["id"]);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }
}
