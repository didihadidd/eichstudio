<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = TravelPackage::with(['galleries'])->get(); //buat ambil fotonya
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
