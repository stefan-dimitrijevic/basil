<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends BasicController
{
    public function index(Request $request)
    {
        $this->data['date'] = new Carbon($request->get('date', today()));

        $filePath = storage_path("logs\laravel-{$this->data['date']->format('Y-m-d')}.log");

        if (File::exists($filePath)) {
            $this->data['logs'] = [
                'lastModified' => new Carbon(File::lastModified($filePath)),
                'file' => File::get($filePath)
            ];

        }

        return view('admin.logs', $this->data);
    }
}
