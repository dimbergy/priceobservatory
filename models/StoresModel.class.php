<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 8:01 PM
 */

class StoresModel extends Database
{
    public function getStores()
    {
        $stores = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT suppliers.sup_name AS supname, locations.loc_name AS locname, stores.id AS idstore, stores.address AS addstore FROM stores INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON stores.id_loc=locations.id ORDER BY suppliers.sup_name ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $stores[] = $row;
            }
        }

        $stmt->close();

        return $stores;
    }
}