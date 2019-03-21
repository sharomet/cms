<?php
namespace Engine\Helper;

class Common
{
    /**
     * @return bool
     */
    function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}