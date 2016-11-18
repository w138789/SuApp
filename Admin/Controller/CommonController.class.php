<?php

class CommonController extends Controller
{
    public function __init()
    {
        if (empty($_SESSION['user_id']) && empty($_SESSION['name']))
        {
            go(__APP__ . '?c=Login');
        }
    }
}