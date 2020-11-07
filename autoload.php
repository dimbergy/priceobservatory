<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 4:59 PM
 */

function __autoload($class_name) {

    if(file_exists('classes/'.$class_name.'.class.php')) {
        require_once 'classes/'.$class_name.'.class.php';
    } elseif (file_exists('controllers/'.$class_name.'.class.php')) {
        require_once 'controllers/'.$class_name.'.class.php';
    } elseif (file_exists('models/'.$class_name.'.class.php')) {
        require_once 'models/'.$class_name.'.class.php';
    }
}
