<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function __construct()
    {
        $this->Marker = new Marker();
    }

    public function index()
    {
        return view('home');
    }

    public function json()
    {
        $result = $this->Marker->allData();
        return json_encode($result);
    }
}
