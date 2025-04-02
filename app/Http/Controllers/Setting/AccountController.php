<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Flux\Flux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::with('company')->get();
        $roles = Role::all();
        $companies = Company::all();

        return view('setting.account.index', compact('users', 'roles', 'companies'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|max:255|confirmed',
            'role_id' => 'required|exists:roles,id',
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

        $user = User::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        $roleName = Role::findOrFail($request->role_id)->name;
        $user->syncRoles([$roleName]);

        return redirect()->route('account.index');
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $rules = [
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|max:255|unique:users,email,' . ($user->id ?? 'NULL'),
            'role_id' => 'required|exists:roles,id',
        ];

        $messages = [
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            // Redirect kembali dengan error dan membuka modal
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('openModal', 'modal-edit-' . $user->id);
        }

        $user->company_id = $request->company_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        $roleName = Role::findOrFail($request->role_id)->name;
        $user->syncRoles([$roleName]);

        return redirect()->route('account.index');
    }

    public function destroy(Request $request, User $user)
    {

        $user->delete();

        return redirect()->route('account.index');
    }
}
