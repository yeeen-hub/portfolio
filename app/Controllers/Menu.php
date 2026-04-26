<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function index()
    {
        // loads app/Views/menu.php
        return view('menu');
    }
}