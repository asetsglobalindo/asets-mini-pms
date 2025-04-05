<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpaceCategory;
use Validator;


class JenisRuanganController extends Controller
{
    public function index()
    {

        $daftar_jenis_ruangan = SpaceCategory::all();

        return view('inventory.jenis-ruangan.index', compact('daftar_jenis_ruangan'));
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

        $jenis_ruangan = SpaceCategory::create([
            'company_id' => 1,
            'name' => $request->name
        ]);

        return redirect()->route('jenis-ruangan.index');
    }

    public function update(Request $request, SpaceCategory $jenis_ruangan)
    {

        // $jenis_ruangan->company_id = $request->company_id;
        $jenis_ruangan->name = $request->name;
        $jenis_ruangan->save();

        return redirect()->route('jenis-ruangan.index');
    }

    public function destroy(Request $request, SpaceCategory $jenis_ruangan)
    {

        $jenis_ruangan->delete();

        return redirect()->route('jenis-ruangan.index');
    }
}
