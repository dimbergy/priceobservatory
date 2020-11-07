<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 6:31 PM
 */

class GrocersModel extends Database
{

    public function getSuppliers()
    {
        $suppliers = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM suppliers ORDER BY sup_name ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $suppliers[] = $row;
            }
        }

        $stmt->close();

        return $suppliers;
    }

    public function getLocations()
    {
        $locations = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT id, loc_name FROM locations ORDER BY loc_name ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $locations[] = $row;
            }
        }

        $stmt->close();

        return $locations;
    }
}