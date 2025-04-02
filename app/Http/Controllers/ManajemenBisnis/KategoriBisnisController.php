<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\BusinessCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoriBisnisController extends Controller
{

    public function index()
    {

        $daftar_kategori_bisnis = BusinessCategory::all();

        return view('manajemen-bisnis.kategori-bisnis.index', compact('daftar_kategori_bisnis'));
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

        $kategori_bisnis = BusinessCategory::create([
            'company_id' => 1,
            'name' => $request->name
        ]);

        return redirect()->route('kategori-bisnis.index');
    }

    public function update(Request $request, BusinessCategory $kategori_bisnis)
    {

        // $kategori_bisnis->company_id = $request->company_id;
        $kategori_bisnis->name = $request->name;
        $kategori_bisnis->save();

        return redirect()->route('kategori-bisnis.index');
    }

    public function destroy(Request $request, BusinessCategory $kategori_bisnis)
    {

        $kategori_bisnis->delete();

        return redirect()->route('kategori-bisnis.index');
    }
}
