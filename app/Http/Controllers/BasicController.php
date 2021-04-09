<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['menu'] = Menu::all();
    }
}
