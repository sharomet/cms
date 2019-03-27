<?php
namespace Engine\Services\View;

use Engine\Services\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $servicesName = 'view';

    /**
     * @return mixed
     */
    public function init()
    {
        $view = new View();
        $this->di->set($this->servicesName, $view);
    }
}