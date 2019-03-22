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

    /**
     * @return bool|string
     */
    function getPathUri()
    {
        $pathUri = $_SERVER['REQUEST_URI'];
        if($position = strpos($pathUri, '?'))
        {
            $pathUri = substr($pathUri, 0, $position);
        }
        return $pathUri;
    }
}