<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessStatus;
// use App\Models\BusinessStatus;
use Validator;

class BisnisStatusController extends Controller
{
    public function index()
    {

        $daftar_bisnis_starus = BusinessStatus::all();

        return view('manajemen-bisnis.bisnis-status.index', compact('daftar_bisnis_starus'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'name' => ['required'],
            'color' => ['required']
        ];

        $messages = [
            'name.required' => 'Nama kategori bisnis wajib diisi',
        ];


        $validates = Validator::make($input, $rules, $messages)->validate();

        $bisnis_status = BusinessStatus::create([
            'company_id' => 1,
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect()->route('bisnis-status.index');
    }

    public function update(Request $request, BusinessStatus $bisnis_status)
    {

        // $bisnis_status->company_id = $request->company_id;
        $bisnis_status->company_id = 1;
        $bisnis_status->name = $request->name;
        $bisnis_status->color = $request->color;
        $bisnis_status->save();

        return redirect()->route('bisnis-status.index');
    }

    public function destroy(Request $request, BusinessStatus $bisnis_status)
    {

        $bisnis_status->delete();

        return redirect()->route('bisnis-status.index');
    }
}
