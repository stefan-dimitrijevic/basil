<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends BasicController
{
    public function show404()
    {
        return view('errors.404_error', $this->data);
    }
}
