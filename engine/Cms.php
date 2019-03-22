<?php
namespace Engine;

use Engine\Helper\Common;

class Cms
{
    private $di;
    public $router;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
    * Run Cms
    */
    public function run()
    {
        $this->router -> add('home', '/', 'HomeController:index');
        $this->router -> add('news', '/news', 'HomeController:news');
        $this->router -> add('user', '/user/12', 'UserController:index');

        $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

        list($class, $action) = explode(':', $routeDispatch->getController(), 2);

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routeDispatch->getParameters());

        //print_r($this->di);
        //print_r($routeDispatch);
    }

}