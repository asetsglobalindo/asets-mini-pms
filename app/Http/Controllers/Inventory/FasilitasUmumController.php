<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Legend;
use Storage;
use Str;
use Validator;

class FasilitasUmumController extends Controller
{
    public function index()
    {

        $daftar_fasilitas_umum = Legend::all();

        return view('inventory.fasilitas-umum.index', compact('daftar_fasilitas_umum'));
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

        $fasiltias_umum = Legend::create([
            'company_id' => 1,
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
        ]
        );

        return redirect()->route('fasilitas-umum.index');
    }

    public function update(Request $request, Legend $fasiltias_umum)
    {

        // $fasiltias_umum->company_id = $request->company_id;
        $fasiltias_umum->name = $request->name;
        $fasiltias_umum->slug = Str::slug($request->name, "-");
        $fasiltias_umum->save();

        return redirect()->route('fasilitas-umum.index');
    }

    public function destroy(Request $request, Legend $fasiltias_umum)
    {

        $fasiltias_umum->delete();

        return redirect()->route('fasilitas-umum.index');
    }
}
