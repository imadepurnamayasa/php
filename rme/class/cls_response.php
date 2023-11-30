<?php

class Response
{
    function redirect($location)
    {
        header("Location: $location");
        die();
    }
}