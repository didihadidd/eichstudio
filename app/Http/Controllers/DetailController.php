<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = TravelPackage::with(['galleries'])
            ->where('slug', $slug) //saya akan ambil data travel_package dgn galery jika slugnya sama dgn slug yg masuk ke dalam?? dan panggil datanya yg paling pertama / gagalkan kl datanya ga ketemu
            ->firstOrFail();
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
