<?php

class Request
{
    public $get;
    public $post;
    public $request;

    function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
    }

    function get($get)
    {
        return isset($_GET[$get]) ? $_GET[$get] : null;
    }

    function post($post)
    {
        return isset($_POST[$post]) ? $_POST[$post] : null;
    }
    
    function request($request)
    {
        return isset($_REQUEST[$request]) ? $_REQUEST[$request] : null;
    }
}