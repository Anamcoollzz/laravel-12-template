<?php

namespace App\Http\Controllers;

class LogViewerController extends StislaController
{
    public function index()
    {
        $check = $this->checkIsDemo('Laravel Log Viewer');
        if ($check && $check[0]) {
            return response($check[1]);
        }
        return (new \Rap2hpoutre\LaravelLogViewer\LogViewerController)->index();
    }
}
