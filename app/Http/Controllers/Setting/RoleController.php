<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('setting.role.index', compact('roles'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'name' => 'required|string|max:255',
        ];

        $messages = [];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            // Redirect kembali dengan error dan membuka modal
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('openModal', 'insert-data');
        }

        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }

    public function update(Request $request, Role $role)
    {

        $input = $request->all();

        $rules = [
            'name' => 'required|string|max:255',
        ];

        $messages = [
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            // Redirect kembali dengan error dan membuka modal
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('openModal', 'modal-edit-' . $role->id);
        }

        $role->name = $request->name;
        $role->save();


        return redirect()->route('role.index');
    }

    public function destroy(Request $request, Role $role)
    {

        $role->delete();

        return redirect()->route('role.index');
    }
}
