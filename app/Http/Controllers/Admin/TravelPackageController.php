<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = TravelPackage::all(); //karena mau ngambil semua data travel package

         return view('pages.admin.travel-package.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title); //ngekonversi title menjadi slug yg bs dibaca oleh id

        //panggil modelnya
        TravelPackage::create($data); //ambil data dr request & tambahan slug
        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = TravelPackage::findOrFail($id); // findOrFail = jika datanya ada akan dimunculin, jd gaada akan 404
        return view('pages.admin.travel-package.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPackageRequest $request, string $id) // buat validasi hrs isi form
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TravelPackage::findOrFail($id);

        $item->update($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = TravelPackage::findorFail($id);
        $item->delete();

        return redirect()->route('travel-package.index');
    }
}
