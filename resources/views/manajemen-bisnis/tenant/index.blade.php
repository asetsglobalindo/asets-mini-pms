@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Tenant</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />

        <div class="flex justify-end mb-4 gap-4">
            <div>
                @component('components.modal')
                @slot('triggerModal') insert-data @endslot
                @slot('buttonModal')
                <flux:button> Tambah Data </flux:button>
                @endslot

                @slot('modalInputForm')
                <div>
                    <flux:heading size="lg">Tambah Data</flux:heading>
                    <flux:text required class="mt-2">Tambah tenant.</flux:text>
                </div>

                <form action="{{ route('tenant.store') }}" method="post" class="grid grid-cols-1 gap-4">
                    @csrf
                    <flux:select name="busscat_id" label="Pilih Bisnis">
                        @foreach($daftar_busscat as $busscat)
                            <flux:select.option value="{{ $busscat->id }}">{{ $busscat->name }}</flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:input label="Nama Tenant" type="text" name="tenant_name" placeholder="Nama tenant"  required/>
                    <flux:input label="Nomor Telepon" type="number" name="phone" placeholder="Nomor telepon tenant"  required/>
                    <flux:input label="Email" type="email" name="email" placeholder="Email tenant"  required/>
                    <flux:input label="Nama PIC" type="text" name="pic_name" placeholder="Nama PIC"  required/>
                    <flux:input label="Nama Brand" type="text" name="brand_name" placeholder="Nama Brand" required />
                    <flux:textarea label="Alamat" name="address" placeholder="Masukkan alamat tenant" required />

                    <div class="flex mt-5">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Simpan</flux:button>
                    </div>
                </form>
                @endslot
                @endcomponent
            </div>

            <div>
                <flux:input class="md:w-80" icon="magnifying-glass" placeholder="Cari data" />
            </div>
        </div>


        @component('components.table')
        @slot('tableHead')
        <tr class="border-b">
            <td class="p-3 font-bold">Kategori Bisnis</td>
            <td class="p-3 font-bold">Nama Tenant</td>
            <td class="p-3 font-bold">Nomor Telepon</td>
            <td class="p-3 font-bold">Email</td>
            <td class="p-3 font-bold">Nama PIC</td>
            <td class="p-3 font-bold">Nama Brand</td>
            <td class="p-3 font-bold w-[500px]">Alamat</td>
            <td class="p-3 font-bold">Action</td>
        </tr>
        @endslot

        @slot('tableBody')
        @foreach ($daftar_tenants as $tenant)
            <tr class="border-b">
                <td class="p-3 min-w-[200px]">{{ $tenant->businessCategory->name }}</td>
                <td class="p-3 min-w-[200px]">{{ $tenant->tenant_name }}</td>
                <td class="p-3 min-w-[200px]">{{ $tenant->phone }}</td>
                <td class="p-3 min-w-[200px]">{{ $tenant->email }}</td>
                <td class="p-3 min-w-[200px]">{{ $tenant->pic_name }}</td>
                <td class="p-3 min-w-[200px]">{{ $tenant->brand_name }}</td>
                <td class="p-3 min-w-[500px]">{{ $tenant->address }}</td>
                <td class="p-3">
                    <div class="flex justify-center items-center space-x-2">
                        <div>
                            @component('components.modal')
                            @slot('buttonModal')
                            <button class="text-green-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            @endslot
                            @slot('triggerModal') modal-edit-{{ $tenant->id }} @endslot

                            @slot('modalInputForm')
                            <div>
                                <flux:heading size="lg">Edit Data</flux:heading>
                                <flux:text class="mt-2">Edit data tenant.</flux:text>
                            </div>

                            <form action="{{ route('tenant.update', $tenant->id) }}" method="post"
                                class="grid grid-cols-1 gap-4">
                                @csrf
                                @method('put')

                                <flux:select name="busscat_id" label="Pilih Bisnis">
                                    @foreach($daftar_busscat as $busscat)
                                        <flux:select.option value="{{ $busscat->id }}">{{ $busscat->name }}</flux:select.option>
                                    @endforeach
                                </flux:select>

                                <flux:input label="Nama Tenant" value="{{ $tenant->tenant_name }}" type="text"
                                    name="tenant_name" placeholder="Nama tenant" />
                                <flux:input label="Nomor Telepon" value="{{ $tenant->phone }}" type="text" name="phone"
                                    placeholder="Nomor telepon tenant" />
                                <flux:input label="Email" value="{{ $tenant->email }}" type="email" name="email"
                                    placeholder="Email tenant" />
                                <flux:input label="Nama PIC" value="{{ $tenant->pic_name }}" type="text" name="pic_name"
                                    placeholder="Nama PIC" />
                                <flux:input label="Nama Brand" value="{{ $tenant->brand_name }}" type="text" name="brand_name"
                                    placeholder="Nama Brand" />
                                <flux:textarea label="Alamat" name="address" placeholder="Masukkan alamat tenant"
                                    style="text-wrap">
                                    {{ $tenant->address }}
                                </flux:textarea>


                                <div class="flex mt-5">
                                    <flux:spacer />
                                    <flux:button type="submit" variant="primary">Simpan</flux:button>
                                </div>
                            </form>
                            @endslot
                            @endcomponent
                        </div>

                        <div>
                            @component('components.modal-delete')
                            @slot('triggerName') modal-delete-{{ $tenant->id }} @endslot
                            @slot('url') {{ route('tenant.delete', $tenant->id) }} @endslot
                            @endcomponent
                        </div>

                    </div>
                </td>
            </tr>

            @endforeach
            @endslot
            @endcomponent


</flux:main>
@endsection

