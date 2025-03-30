<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBisnis;
use App\Models\Company;
use Validator;

class KategoriBisnisController extends Controller
{

    public function index(){

        $daftar_kategori_bisnis = KategoriBisnis::all();

        $daftar_perusahaan = Company::all();


        return view('manajemen-bisnis.kategori-bisnis.index',compact('daftar_kategori_bisnis','daftar_perusahaan'));
    }

    public function store(Request $request){

        $input = $request->all();

        $rules = [
            'company_id' => ['nullable'],
            'name' => ['required']
        ];

        $messages = [
            // 'company_id.required' => 'Perusahaan wajib dipilih',
            'name.required' => 'Nama kategori bisnis wajib diisi',
        ];


        $validates = Validator::make($input, $rules, $messages)->validate();

        $kategori_bisnis = KategoriBisnis::create([
            // 'company_id' => $request->company_id,
            'name' => $request->name
        ]);

        return redirect()->route('kategori-bisnis.index');

    }

    public function update(Request $request, KategoriBisnis $kategori_bisnis){

        // $kategori_bisnis->company_id = $request->company_id;
        $kategori_bisnis->name = $request->name;
        $kategori_bisnis->save();

        return redirect()->route('kategori-bisnis.index');
    }

    public function destroy(Request $request, KategoriBisnis $kategori_bisnis){

        $kategori_bisnis->delete();

        return redirect()->route('kategori-bisnis.index');

    }
}
