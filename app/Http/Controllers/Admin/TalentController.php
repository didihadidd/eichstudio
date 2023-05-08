<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TalentRequest;
use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Talent::all(); //karena mau ngambil semua data travel package

         return view('pages.admin.talent.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.talent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TalentRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title); //ngekonversi title menjadi slug yg bs dibaca oleh id

        //panggil modelnya
        Talent::create($data); //ambil data dr request & tambahan slug
        return redirect()->route('data-talent.index');
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
        $item = Talent::findOrFail($id); // findOrFail = jika datanya ada akan dimunculin, jd gaada akan 404
        return view('pages.admin.talent.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TalentRequest $request, string $id) // buat validasi hrs isi form
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Talent::findOrFail($id);

        $item->update($data);

        return redirect()->route('data-talent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Talent::findorFail($id);
        $item->delete();

        return redirect()->route('data-talent.index');
    }
}
