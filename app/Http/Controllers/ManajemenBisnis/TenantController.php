<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\BusinessCategory;
use Illuminate\Support\Facades\Validator;


class TenantController extends Controller
{
    public function index()
    {
        $daftar_tenants = Tenant::with('businessCategory')->get();

        $daftar_busscat = BusinessCategory::all();

        return view('manajemen-bisnis.tenant.index', compact('daftar_tenants', 'daftar_busscat'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $rules = [
            'busscat_id' => ['required'],
            'tenant_name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'pic_name' => ['required'],
            'brand_name' => ['required'],
            'address' => ['required'],
        ];

        $messages = [
            '*.required' => 'Wajib diisi',
        ];


        $validates = Validator::make($input, $rules, $messages)->validate();

        $tenant = Tenant::create([
            'company_id' => 1,
            'busscat_id' => $request->busscat_id,
            'tenant_name' => $request->tenant_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'pic_name' => $request->pic_name,
            'brand_name' => $request->brand_name,
            'address' => $request->address,
        ]);

        return redirect()->route('tenant.index');
    }

    public function update(Request $request, Tenant $tenant)
    {

        // $tenant->company_id = $request->company_id;
        $tenant->company_id = 1;
        $tenant->busscat_id = $request->busscat_id;
        $tenant->tenant_name = $request->tenant_name;
        $tenant->phone = $request->phone;
        $tenant->email = $request->email;
        $tenant->pic_name = $request->pic_name;
        $tenant->brand_name = $request->brand_name;
        $tenant->address = $request->address;
        $tenant->save();

        return redirect()->route('kategori-bisnis.index');
    }

    public function destroy(Request $request, Tenant $tenant)
    {

        $tenant->delete();

        return redirect()->route('tenant.index');
    }
}
