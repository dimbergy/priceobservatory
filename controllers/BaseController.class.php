<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 6:20 PM
 */

class BaseController
{
    public static function Conn()
    {
        $conn = new BaseModel();

        return $conn->getConnection();
    }

    public static function Banners($zone)
    {
        $banners = new HomeModel();

        return $banners->getBanners($zone);
    }

    public static function Stores()
    {
        $stores = new StoresModel();

        return $stores->getStores();
    }

    public static function Menu($position, $session)
    {
        $menu = new BaseModel();

        return $menu->getMenu($position, $session);
    }

    public static function Page($position, $session)
    {
        $page = new BaseModel();

        return $page->getPage($position, $session);
    }
}