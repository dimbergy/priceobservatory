<?php
include 'db_connect.php';

function getCategory($category) {

    $categories = [];

    global $conn;
    
    $sql="SELECT id, cat_name, cat_img FROM categories";

    if(isset($category) && !empty($category))  {
        $sql .= " WHERE id=".$category;
    }

    $result= mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        
    }

    return $categories;
}


function getProduct($category) {

    $products = [];

    global $conn;

    if(isset($category) && !empty($category)) {
        $sql="SELECT products.id AS prodid, prod_name, categories.id AS catid FROM products INNER JOIN categories ON products.id_cat=categories.id WHERE categories.id=".$category." ORDER BY prod_name ASC";
    } else {
        $sql="SELECT id, prod_name FROM products ORDER BY prod_name ASC";
    }

    $result= mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      
   while($row = mysqli_fetch_assoc($result)) {

       $products[] = $row;

   }
    }

return $products;

}


function getSingleProduct($product_id) {

    $product = [];

    global $conn;

    $sql = "SELECT id, prod_name, img FROM products WHERE id=".$product_id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $product[] = $row;

        }
    }

    return $product[0];
}

function getSupplier() {

    $suppliers = [];

    global $conn;
    
    $sql="SELECT id, sup_name, sup_logo, sup_base, sup_zipcode, sup_loc, sup_tel, sup_website, sup_img, sup_history FROM suppliers ORDER BY sup_name ASC";
    $result= mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $suppliers[] = $row;
        }
    }

    return $suppliers;
}

function getLocation() {

    $locations = [];

    global $conn;
    
    $sql="SELECT id, loc_name FROM locations ORDER BY loc_name ASC";
    $result= mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $locations[$row['id']]['id'] = $row['id'];
            $locations[$row['id']]['name'] = $row['loc_name'];
        }
    }

    return $locations;
    
}


function getStore() {

    $stores = [];

    global $conn;
    
    $sql="SELECT suppliers.sup_name AS supname, locations.loc_name AS locname, stores.id AS idstore, stores.address AS addstore FROM stores INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON stores.id_loc=locations.id ORDER BY suppliers.sup_name ASC";
    $result= mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $stores[] = $row;
        }
    }
    return $stores;
}


function getResults($products, $category, $suppliers, $locations) {

    $results = [];

    global $conn;

    $sql1 = "SELECT * FROM products";
    if($products == 0 && $category == 0) {
        $sql1 .= " ORDER BY products.prod_name ASC";
    } elseif($products == 0 && $category !=0) {
        $sql1 .= " WHERE id_cat=".$category." ORDER BY products.prod_name ASC";
    } elseif($products != 0) {
        $sql1 .= " WHERE id=".$products." ORDER BY products.prod_name ASC";
    }

    $res1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($res1) > 0) { //if res1
        while($row1 = mysqli_fetch_assoc($res1)) {


        $results[$row1['id']] = $row1;

            $sql2 = "SELECT products.prod_name AS proion, products.img AS image, pricing.price AS timi, suppliers.sup_name AS sm, suppliers.sup_logo AS logo, stores.address AS diefthinsi, stores.zipcode AS tk, stores.tel AS phone, locations.loc_name As periohi, stores.map AS googlemap FROM `products` INNER JOIN pricing ON products.id=pricing.id_prod INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc";
            if($suppliers==0 AND $locations==0)  {
                $sql2 .= " WHERE (pricing.up_date=1 AND products.id=".$row1['id'].") ORDER BY pricing.price ASC";
            } else if($suppliers!=0 AND $locations==0) {
                $sql2 .= " WHERE (pricing.up_date=1 AND products.id=".$row1['id']." AND suppliers.id=".$suppliers.") ORDER BY pricing.price ASC";
            } else if($suppliers==0 AND $locations!=0) {
                $sql2 .= " WHERE (pricing.up_date=1 AND products.id=".$row1['id']." AND locations.id=".$locations.") ORDER BY pricing.price ASC";
            } else {
                $sql2 .= " WHERE (pricing.up_date=1 AND products.id=".$row1['id']." AND suppliers.id=".$suppliers." AND locations.id=".$locations.") ORDER BY pricing.price ASC";
            }

            $res2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($res2) > 0) {
                while($row2 = mysqli_fetch_assoc($res2)) {
                    $results[$row1['id']]['data'][] = $row2;
                }
            }
        }
    }
    return $results;
}

function getSticky($case,$par,$value="", $initial="") {
    switch($case) {
        
        case 1:
            if (isset($_POST[$par]) && $_POST[$par]==$value) {
                
                echo " selected=\"selected\"";
            }

        break;
            
        case 2:
            if (isset($_POST[$par]) && $_POST[$par] !="") {
                
                echo " checked=\"checked\"";
            }

        break;
                    
        case 3:
            if (isset($_POST[$par]) && $_POST[$par] == $value) {
                
                echo " checked=\"checked\"";
            } else {
                
            if ($initial !="") {
               echo " checked=\"checked\"";
            }    
                
            }

        break;  
            
    }

}

function getLowestPriceProduct($product) {

    global $conn;

    $sql_prodmin="SELECT pricing.price AS timi, products.prod_name AS proion, products.img AS image, suppliers.sup_name AS sm, suppliers.sup_logo AS logo, stores.address AS diefthinsi, stores.zipcode AS tk, stores.tel AS phone, locations.loc_name As periohi, stores.map AS googlemap FROM `products` INNER JOIN pricing ON products.id=pricing.id_prod INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 AND products.id=".$product." ORDER BY pricing.price ASC LIMIT 1";
    $result_prodmin= mysqli_query($conn, $sql_prodmin);
    return mysqli_fetch_assoc($result_prodmin);
}

function getHighestPriceProduct($product) {

    global $conn;

    $sql_prodmax="SELECT pricing.price AS timi, products.prod_name AS proion, products.img AS image, suppliers.sup_name AS sm, suppliers.sup_logo AS logo, stores.address AS diefthinsi, stores.zipcode AS tk, stores.tel AS phone, locations.loc_name As periohi, stores.map AS googlemap FROM `products` INNER JOIN pricing ON products.id=pricing.id_prod INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 AND products.id=".$product." ORDER BY pricing.price DESC LIMIT 1";
    $result_prodmax= mysqli_query($conn, $sql_prodmax);
    return mysqli_fetch_assoc($result_prodmax);

}

function getMinSupplier() {

    global $conn;

    $sql_supmin="SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_base AS base, suppliers.sup_zipcode AS zipcode, suppliers.sup_loc AS loc, suppliers.sup_tel AS tel, suppliers.sup_website AS website FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id WHERE pricing.up_date=1 GROUP BY suppliers.id ORDER BY mesos ASC LIMIT 1";
    $result_supmin= mysqli_query($conn, $sql_supmin);
    return mysqli_fetch_assoc($result_supmin);

}

function getMaxSupplier() {

    global $conn;

    $sql_supmax="SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_base AS base, suppliers.sup_zipcode AS zipcode, suppliers.sup_loc AS loc, suppliers.sup_tel AS tel, suppliers.sup_website AS website FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id WHERE pricing.up_date=1 GROUP BY suppliers.id ORDER BY mesos DESC LIMIT 1";
    $result_supmax= mysqli_query($conn, $sql_supmax);
    return mysqli_fetch_assoc($result_supmax);
}

function getMinStore() {

    global $conn;

    $sql_storemin="SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_website AS website, stores.address AS storeadd, stores.zipcode AS storezipcode, stores.tel AS storetel, stores.map AS storemap, locations.loc_name AS location FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 GROUP BY stores.id ORDER BY mesos ASC LIMIT 1";
    $result_storemin= mysqli_query($conn, $sql_storemin);
    return mysqli_fetch_assoc($result_storemin);

}

function getMaxStore() {

    global $conn;

    $sql_storemax="SELECT AVG(pricing.price) AS mesos, suppliers.sup_name AS sm, suppliers.sup_img AS img, suppliers.sup_logo AS logo, suppliers.sup_website AS website, stores.address AS storeadd, stores.zipcode AS storezipcode, stores.tel AS storetel, stores.map AS storemap, locations.loc_name AS location FROM pricing INNER JOIN stores ON pricing.id_store=stores.id INNER JOIN suppliers ON stores.id_sup=suppliers.id INNER JOIN locations ON locations.id=stores.id_loc WHERE pricing.up_date=1 GROUP BY stores.id ORDER BY mesos DESC LIMIT 1";
    $result_storemax= mysqli_query($conn, $sql_storemax);
    return mysqli_fetch_assoc($result_storemax);

}

function updateProduct($store_id, $product_id, $price) {

    $response = [];

    global $conn;

    $sql_update ="UPDATE pricing SET up_date=0 WHERE id_store='".$store_id."' AND id_prod='".$product_id."'";
    $result_update = mysqli_query($conn,$sql_update);

    $sql_price = "INSERT into pricing (id, price, date_time, up_date, id_prod, id_store) VALUES (DEFAULT, '$price', now(), 1, '".$product_id."', '".$store_id."')";
    $result_price = mysqli_query($conn,$sql_price);
    if($result_update && $result_price){
        $response['success'] = true;
        $response['message'] = 'Η τιμή του προϊόντος ανανεώθηκε με επτυχία.';
    } else {
        $response['success'] = false;
        $response['message'] = 'Η ανανέωση της τιμής του προϊόντος απέτυχε. Πρασπάθησε πάλι.';
    }

    return $response;
}

function getLoggedUser($user) {

    global $conn;

    $sql="SELECT users.id_store AS store_id, users.username AS nickname, users.lname AS lastname, users.fname AS firstname, users.email AS useremail, suppliers.sup_name AS smname, suppliers.sup_logo AS smlogo, stores.address AS storeaddress, stores.zipcode AS storezipcode, stores.tel AS storetel, locations.loc_name AS storelocation FROM users INNER JOIN stores ON stores.id=users.id_store INNER JOIN suppliers ON suppliers.id=stores.id_sup INNER JOIN locations ON locations.id=stores.id_loc WHERE users.id='".$user."'";
    $result= mysqli_query($conn, $sql);
    $response = mysqli_fetch_assoc($result);

    return $response;

}

?>