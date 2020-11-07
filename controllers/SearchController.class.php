<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 6:45 PM
 */

class SearchController
{
    public static function Products($category)
    {
        $products = new SearchModel();

        return $products->getProducts($category);
    }

    public static function Categories($category)
    {
        $categories = new SearchModel();

        return $categories->getCategories($category);
    }

    public static function Results($product_id, $category_id, $supplier_id, $location_id)
    {
        $results = new SearchModel();

        return $results->getResults($product_id, $category_id, $supplier_id, $location_id);
    }

    public static function RangeProduct($product_id, $ordering)
    {
        $product = new SearchModel();

        return $product->getRageProduct($product_id, $ordering);
    }

    public static function RangeSupplier($min)
    {
        $supplier = new SearchModel();

        return $supplier->getRangeSupplier($min);
    }

    public static function RangeStore($min)
    {
        $store = new SearchModel();

        return $store->getRangeStore($min);
    }

    public static function SingleProduct($product_id)
    {
        $product = new SearchModel();

        return $product->getSingleProduct($product_id);
    }
}