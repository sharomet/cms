<?php
namespace Engine;

use Engine\Core\Router\DispatchedRoute;
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
        try {

            require_once __DIR__ . '/../cms/Route.php';

            $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

            if ($routeDispatch == null) {
                $routeDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routeDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routeDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}