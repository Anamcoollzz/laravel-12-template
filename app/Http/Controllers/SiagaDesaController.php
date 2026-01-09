<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiagaDesaController extends Controller
{
    public function index()
    {
        return view('stisla.homes.siaga-desa.order-history');
    }

    public function orderForm()
    {
        return view('stisla.homes.siaga-desa.order-form');
    }
}
