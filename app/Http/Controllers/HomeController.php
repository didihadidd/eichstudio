<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = Talent::with(['galleries'])->get(); //buat ambil fotonya
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
