<?php
namespace Engine;

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
        /*$this->router -> add('home', '/', 'HomeController:index');
        $this->router -> add('product', '/product/{id}', 'ProductController:index');*/

        //$routeDispatch = $this->router->dispatch('GET');
        //print_r($this->di);
        print_r($_SERVER);
    }

}