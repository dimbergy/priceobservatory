<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 5:05 PM
 */

class HomeController
{
    public static function Categories()
    {
        $categories = new HomeModel();

        return $categories->getCategories();
    }

}