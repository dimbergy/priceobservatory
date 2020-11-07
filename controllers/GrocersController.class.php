<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 6:33 PM
 */

class GrocersController
{
    public static function Suppliers()
    {
        $suppliers = new GrocersModel();

        return $suppliers->getSuppliers();
    }

    public static function Locations()
    {
        $locations = new GrocersModel();

        return $locations->getLocations();
    }
}