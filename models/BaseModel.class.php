<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 4:58 PM
 */

class BaseModel extends Database
{
    public function getConnection()
    {
        $conn = $this->connect();

        return $conn;
    }

    public function getPermalink()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $keys = parse_url($uri);
        if (array_key_exists('query', $keys) && !empty($keys['query'])) {
            $keys['path'] .= '?' . $keys['query'];
        }
        $path = explode("/", $keys['path']);
        $pathLength = sizeof($path);
//        $permalink = $path[($pathLength - 2)] != str_replace('/', '', Config::get('defaultNav')) ? $path[($pathLength - 2)] . '/' . end($path): end($path);
        $permalink = end($path);

        return $permalink;
    }

    public function getMenu($position, $session)
    {


        switch ($position) {
            case 'footer':
                $param['footer'] = true;
                break;
            default:
                $param['header'] = true;
        }

        $response = [];

        $menu = [
            [
                'title' => 'Αρχική',
                'identifier' => 'home',
                'target_url' => '',
                'icon' => 'fa-home',
                'header' => true,
                'footer' => true,
            ],
            [
                'title' => 'Σχετικά με μας',
                'identifier' => 'about',
                'target_url' => 'about',
                'icon' => 'fa-tags',
                'header' => true,
                'footer' => true,
            ],
            [
                'title' => 'Αναζήτηση τιμών',
                'identifier' => 'price',
                'target_url' => 'price',
                'icon' => 'fa-search',
                'header' => true,
                'footer' => true,
            ],
            [
                'title' => 'Συνεργάτες',
                'identifier' => 'grocers',
                'target_url' => 'grocers',
                'icon' => 'fa-users',
                'header' => true,
                'footer' => true,
            ],
            [
                'title' => 'Στατιστικά',
                'identifier' => 'statistics',
                'target_url' => 'statistics',
                'icon' => 'fa-line-chart',
                'header' => true,
                'footer' => true,
            ],
            [
                'title' => 'Διαχείριση',
                'identifier' => $session ? 'dashboard' : 'account',
                'target_url' => $session ? 'dashboard' : 'account',
                'icon' => 'fa-pencil-square-o',
                'header' => true,
                'footer' => false,
            ],
            [
                'title' => 'Επικοινωνία',
                'identifier' => 'contact',
                'target_url' => 'contact',
                'icon' => 'fa-at',
                'header' => true,
                'footer' => true,
            ]

        ];

        foreach ($menu as $filter) {
            if($param[$position] === $filter[$position]) {
                $response[] = $filter;
            }
        }

        return $response;
    }

    public function getPage($position, $session)
    {

        $permalink = self::getPermalink();
        $pages = self::getMenu($position, $session);
        $page = [];

        foreach ($pages as $item) {
            if($item['target_url'] === $permalink) {
                $page = $item;
            }
        }

        return $page;
    }
}