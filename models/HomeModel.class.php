<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 5:03 PM
 */

class HomeModel extends Database
{
    public function getBanners($zone)
    {
        $banners = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM banners WHERE zone = ? ORDER BY ordering ASC");
        $stmt->bind_param("s", $zone);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $banners[] = $row;
            }
        }

        $stmt->close();

        return $banners;
    }

    public function getCategories()
    {
        $categories = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM categories");
//        $stmt->bind_param("i", $langID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $categories[] = $row;
            }
        }

        $stmt->close();

        return $categories;
    }
}