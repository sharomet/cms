<?php
namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $servicesName = 'router';

    /**
     * @return mixed
     */
    public function init()
    {
        $router = new Router('http://cms/');
        $this->di->set($this->servicesName, $router);
    }
}