<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;
use Storage;
use Str;
use Validator;

class FasilitasListingController extends Controller
{
    public function index()
    {

        $daftar_fasitilas_listing = Facility::all();

        return view('inventory.fasilitas-listing.index', compact('daftar_fasitilas_listing'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'name' => ['required']
        ];

        $messages = [
            'name.required' => 'Nama kategori bisnis wajib diisi',
        ];


        $validates = Validator::make($input, $rules, $messages)->validate();

        $fasilitas_listing = Facility::create([
            'company_id' => 1,
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
        ]
        );

        return redirect()->route('fasilitas-listing.index');
    }

    public function update(Request $request, Facility $fasilitas_listing)
    {

        $fasilitas_listing->company_id = 1;
        $fasilitas_listing->name = $request->name;
        $fasilitas_listing->slug = Str::slug($request->name, "-");
        $fasilitas_listing->save();

        return redirect()->route('fasilitas-listing.index');
    }

    public function destroy(Request $request, Facility $fasilitas_listing)
    {

        $fasilitas_listing->delete();

        return redirect()->route('fasilitas-listing.index');
    }
}
