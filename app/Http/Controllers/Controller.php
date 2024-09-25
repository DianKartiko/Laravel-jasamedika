<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function base()
    {
        return view('layout.base');
    }
}
