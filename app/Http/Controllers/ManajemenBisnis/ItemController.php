<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Validator;

class ItemController extends Controller
{
    public function index()
    {

        $daftar_item = Item::all();

        return view('manajemen-bisnis.item.index', compact('daftar_item'));
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

        $item = Item::create([
            'company_id' => 1,
            'name' => $request->name
        ]);

        return redirect()->route('item.index');
    }

    public function update(Request $request, Item $item)
    {

        $item->company_id = 1;
        $item->name = $request->name;
        $item->save();

        return redirect()->route('item.index');
    }

    public function destroy(Request $request, Item $item)
    {

        $item->delete();

        return redirect()->route('item.index');
    }
}
