<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutMeController extends BasicController
{
    public function index()
    {
        return view('about', $this->data);
    }
}
