<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 11:07 PM
 */

class AccountController
{
    public static function LoggedUser($user_id)
    {
        $user = new AccountModel();

        return $user->getLoggedUser($user_id);
    }

    public static function UpdateProductPrice($store_id, $product_id, $price)
    {
        $response = new AccountModel();

        return $response->updateProductPrice($store_id, $product_id, $price);
    }

    public static function Login($username, $password)
    {
        $response = new AccountModel();

        return $response->login($username, $password);
    }

    public  static function Register($post_data)
    {
        $response = new AccountModel();

        return $response->register($post_data);
    }
}