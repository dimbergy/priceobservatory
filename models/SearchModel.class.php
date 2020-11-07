<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 6:41 PM
 */

class SearchModel extends Database
{

    public function getProducts($category)
    {
        $products = [];

        $conn = $this->connect();
        if(isset($category) && !empty($category)) {
            $stmt = $conn->prepare("SELECT products.id AS prodid, prod_name, categories.id AS catid FROM products INNER JOIN categories ON products.id_cat=categories.id WHERE categories.id= ? ORDER BY prod_name ASC");
            $stmt->bind_param("i", $category);
        } else {
            $stmt = $conn->prepare("SELECT id, prod_name FROM products ORDER BY prod_name ASC");
        }

        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $products[] = $row;
            }
        }

        $stmt->close();

        return $products;
    }

    public function getSingleProduct($product_id) {


        $product = [];
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT id, prod_name, img FROM products WHERE id=?");
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $product[] = $row;
            }
        }

        $stmt->close();

        return $product[0];
    }

    public function getRageProduct($product_id, $low)
    {

        $conn = $this->connect();

        $query = "SELECT pricing.price AS timi, products.prod_name AS proion, products.img AS image, suppliers.sup_name AS sm, suppliers.sup_logo AS logo, stores.address AS diefthinsi, stores.zipcode AS tk, stores.tel AS phone, locations.loc_name As periohi, stores.map AS googlemap FROM products INNER JOIN pricing ON products.id=pricing.id_prod INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 AND products.id= ?";
        if($low) {
            $query .= " ORDER BY pricing.price ASC LIMIT 1";
        } else {
            $query .= " ORDER BY pricing.price DESC LIMIT 1";
        }

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_object();

        $stmt->close();
        return $product;

    }

    public function getRangeSupplier($min)
    {
        $conn = $this->connect();

        $query = "SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_base AS base, suppliers.sup_zipcode AS zipcode, suppliers.sup_loc AS loc, suppliers.sup_tel AS tel, suppliers.sup_website AS website FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id WHERE pricing.up_date=1 GROUP BY suppliers.id";
        if($min) {
            $query .= " ORDER BY mesos ASC LIMIT 1";
        } else {
            $query .= " ORDER BY mesos DESC LIMIT 1";
        }

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $supplier = $result->fetch_object();

        $stmt->close();
        return $supplier;

    }


    public function getRangeStore($min)
    {
        $conn = $this->connect();

        $query = "SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_website AS website, stores.address AS storeadd, stores.zipcode AS storezipcode, stores.tel AS storetel, stores.map AS storemap, locations.loc_name AS location FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 GROUP BY stores.id";
        if($min) {
            $query .= " ORDER BY mesos ASC LIMIT 1";
        } else {
            $query .= " ORDER BY mesos DESC LIMIT 1";
        }

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $store = $result->fetch_object();

        $stmt->close();
        return $store;

    }

    public function getCategories($category_id) {

        $categories = [];

        $conn = $this->connect();

        $query = "SELECT id, cat_name, cat_img FROM categories";
        if(isset($category_id) && !empty($category_id))  {
            $query .= " WHERE id= ?";
        }
        $stmt = $conn->prepare($query);
        if(isset($category_id) && !empty($category_id))  {
            $stmt->bind_param("i", $category_id);
        }
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

    public function getResults($product_id, $category_id, $supplier_id, $location_id)
    {
        $results = [];

        $conn = $this->connect();

        $query = "SELECT * FROM products";
        if($product_id == 0 && $category_id == 0)  {
            $query .= " ORDER BY products.prod_name ASC";
        } elseif($product_id == 0 && $category_id != 0) {
            $query .= " WHERE id_cat=? ORDER BY products.prod_name ASC";
        } elseif($product_id != 0) {
            $query .= " WHERE id=? ORDER BY products.prod_name ASC";
        }
        $stmt = $conn->prepare($query);
        if($product_id == 0 && $category_id != 0) {
            $stmt->bind_param("i", $category_id);
        } elseif($product_id != 0) {
            $stmt->bind_param("i", $product_id);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $results[$row->id] = $row;

                $sql = "SELECT products.prod_name AS proion, products.img AS image, pricing.price AS timi, suppliers.sup_name AS sm, suppliers.sup_logo AS logo, stores.address AS diefthinsi, stores.zipcode AS tk, stores.tel AS phone, locations.loc_name As periohi, stores.map AS googlemap FROM `products` INNER JOIN pricing ON products.id=pricing.id_prod INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc";
                if($supplier_id == 0 AND $location_id == 0)  {
                    $sql .= " WHERE (pricing.up_date=1 AND products.id=?) ORDER BY pricing.price ASC";
                } else if($supplier_id!=0 AND $location_id==0) {
                    $sql .= " WHERE (pricing.up_date=1 AND products.id=? AND suppliers.id=?) ORDER BY pricing.price ASC";
                } else if($supplier_id==0 AND $location_id!=0) {
                    $sql .= " WHERE (pricing.up_date=1 AND products.id=? AND locations.id=?) ORDER BY pricing.price ASC";
                } else {
                    $sql .= " WHERE (pricing.up_date=1 AND products.id=? AND suppliers.id=? AND locations.id=?) ORDER BY pricing.price ASC";
                }
                $stmt1 = $conn->prepare($sql);
                if($supplier_id == 0 AND $location_id == 0)  {
                    $stmt1->bind_param("i", $row->id);
                } else if($supplier_id!=0 AND $location_id==0) {
                    $stmt1->bind_param("ii", $row->id, $supplier_id);
                } else if($supplier_id==0 AND $location_id!=0) {
                    $stmt1->bind_param("ii", $row->id, $location_id);
                } else {
                    $stmt1->bind_param("iii", $row->id,$supplier_id, $location_id);
                }
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                if($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_object()) {
                        $results[$row->id]->data[] = $row1;
                    }
                }
                $stmt1->close();
            }
        }

        $stmt->close();

        return $results;
    }

}