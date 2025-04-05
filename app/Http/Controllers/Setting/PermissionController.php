<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::query()
        ->when(!empty($request->search), function ($q) use ($request) {
            $search = $request->search;
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('display_name', 'like', "%{$search}%")
                ->orWhere('group', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('setting.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'name' => 'required|string|max:255|unique:permissions,name',
            'display_name' => 'required|string|max:255',
            'group' => 'required|string|max:255',
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

        $permission = Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'group' => $request->group,
        ]);

        return redirect()->route('permission.index');
    }

    public function update(Request $request, Permission $permission)
    {

        $input = $request->all();

        $rules = [
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'display_name' => 'required|string|max:255',
            'group' => 'required|string|max:255',
        ];

        $messages = [
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            // Redirect kembali dengan error dan membuka modal
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('openModal', 'modal-edit-' . $permission->id);
        }

        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->group = $request->group;
        $permission->save();


        return redirect()->route('permission.index');
    }

    public function destroy(Request $request, Permission $permission)
    {

        $permission->delete();

        return redirect()->route('permission.index');
    }
}
