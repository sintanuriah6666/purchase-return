<?php

namespace App\Http\Controllers;

use App\Services\RajaOngkirService;

class RajaOngkirController extends Controller
{
    protected $rajaOngkirService;

    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }

    public function index()
    {
        $cities = $this->rajaOngkirService->getCities();
        return view('rajaongkir.index', compact('cities'));
    }

}
