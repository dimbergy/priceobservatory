<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 14/9/20
 * Time: 10:37 PM
 */

require_once ('autoload.php');

if(isset($_POST['type']) && $_POST['type'] == 'statistics' && $_POST['product_id']) {

    $product_id = (int)$_POST['product_id'];

    $response['lowest'] = SearchController::RangeProduct($product_id, true);
    $response['highest'] = SearchController::RangeProduct($product_id, false);

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();

}

if(isset($_POST['type']) && $_POST['type'] == 'search_category' && $_POST['category_id']) {

    $category_id = (int)$_POST['category_id'];

    $response['category'] = $category_id !== 0 ? SearchController::Categories($category_id) : SearchController::Categories();
    $response['products'] = $category_id !== 0 ? SearchController::Products($category_id) : SearchController::Products();


    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();

}

if(isset($_POST['type']) && $_POST['type'] == 'search_results' && $_POST['product'] && $_POST['category'] && $_POST['supplier'] && $_POST['store']) {

    $product = (int)$_POST['product'];
    $category = (int)$_POST['category'];
    $supplier = (int)$_POST['supplier'];
    $store = (int)$_POST['store'];

    $response = SearchController::Results($product, $category, $supplier, $store);

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();

}

if(isset($_POST['type']) && $_POST['type'] == 'dashboard_product' && $_POST['product_id'] && $_POST['store_id']) {

    $product_id = (int)$_POST['product_id'];

    $response['product'] = SearchController::SingleProduct($product_id);
    $response['store_id'] = (int)$_POST['store_id'];

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();

}


if(isset($_POST['type']) && $_POST['type'] == 'submit_price' && $_POST['product_id'] && $_POST['store_id']) {

    $response = [];

    if(!empty($_POST['price']) && (float)$_POST['price']> 0) {
        $product_id = (int)$_POST['product_id'];
        $price = (float)$_POST['price'];
        $store_id = (int)$_POST['store_id'];

        $response = AccountController::UpdateProductPrice($store_id, $product_id, $price);

        $response['product_id'] = $product_id;
        $response['price'] = $price;
        $response['store_id'] = (int)$_POST['store_id'];
    } else {
        $response['error'] = true;
    }


    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();

}