@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Account</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />

        <div class="flex justify-end mb-4 gap-4">
            <div>

                @component('components.modal')
                    @slot('triggerModal')
                        insert-data
                    @endslot

                    @slot('buttonModal')
                        <flux:button> Tambah Data </flux:button>
                    @endslot

                    @slot('modalInputForm')
                        <div>
                            <flux:heading size="lg">Tambah Data</flux:heading>
                            <flux:text class="mt-2">Tambah account.</flux:text>
                        </div>

                        <form action="{{ route('account.store') }}" method="post">

                            @csrf
                            <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" />
                            <flux:input label="Email" type="email" name="email" placeholder="Masukkan Email" />
                            <flux:input label="No. Telp" type="text" name="phone_number" placeholder="Masukkan No. Telp" />

                            <flux:select name="company_id" class="mb-4" label="Company">
                                <flux:select.option>-- Pilih --</flux:select.option>
                                @foreach ($companies as $company)
                                    <flux:select.option value="{{ $company->id }}">{{ $company->name }}</flux:select.option>
                                @endforeach
                            </flux:select>

                            <flux:select name="role_id" class="mb-4" label="Role">
                                <flux:select.option>-- Pilih --</flux:select.option>
                                @foreach ($roles as $role)
                                    <flux:select.option value="{{ $role->id }}">{{ $role->name }}</flux:select.option>
                                @endforeach
                            </flux:select>

                            <flux:input label="Password" type="password" name="password" placeholder="Masukkan Password" />
                            <flux:input label="Password Confirmation" type="password" name="password_confirmation" placeholder="Masukkan Password Konfirmasi" />


                            <div class="flex">
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
                <tr>
                    <td contenteditable="false" class="w-40 py-1 border border-gray-200 font-bold p-4">Nama</td>
                    <td contenteditable="false" class="w-52 py-1 border border-gray-200 font-bold p-4">Company</td>
                    <td contenteditable="false" class="w-60 py-1 border border-gray-200 font-bold p-4">Email</td>
                    <td contenteditable="false" class="w-32 py-1 border border-gray-200 font-bold p-4">No. Telp</td>
                    <td contenteditable="false" class="w-28 py-1 border border-gray-200 font-bold p-4">Role</td>
                    <td contenteditable="false" class="w-24 py-1 border border-gray-200 font-bold p-4">Status</td>
                    <td contenteditable="false" class="w-24 py-1 border border-gray-200 font-bold p-4">Kelola</td>
                </tr>
            @endslot

            @slot('tableBody')
                @if (count($users) > 0)
                    @foreach ($users as $item)
                        <tr class=" py-5">
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->name }}</td>
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->company->name }}</td>
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->email }}</td>
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->phone_number }}</td>
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->getRoleNames()[0] }}</td>
                            <td contenteditable="false" class="text-sm py-5 border border-gray-200 p-4">{{ $item->is_active ? 'Active' : 'Inactive' }}</td>
                            <td class="py-5 border-gray-200 p-4">
                                @component('components.modal')
                                    @slot('buttonModal')
                                        <flux:button variant="primary" icon="pencil"></flux:button>
                                    @endslot

                                    @slot('triggerModal')
                                        modal-edit-{{ $item->id }}
                                    @endslot

                                    @slot('modalInputForm')
                                        <div>
                                            <flux:heading size="lg">Edit Data</flux:heading>
                                            <flux:text class="mt-2">Edit Account.</flux:text>
                                        </div>

                                        <form action="{{ route('account.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                                <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" value="{{ $item->name ?? '' }}" />
                                                <flux:input label="Email" type="email" name="email" placeholder="Masukkan Email" value="{{ $item->email ?? '' }}" />
                                                <flux:input label="No. Telp" type="text" name="phone_number" placeholder="Masukkan No. Telp" value="{{ $item->phone_number ?? '' }}" />

                                                <flux:select name="company_id" class="mb-4" label="Company">
                                                    <flux:select.option>-- Pilih --</flux:select.option>
                                                    @foreach ($companies as $company)
                                                        <flux:select.option value="{{ $company->id }}" :selected="$item->company_id">{{ $company->name }}</flux:select.option>
                                                    @endforeach
                                                </flux:select>

                                                <flux:select name="role_id" class="mb-4" label="Role">
                                                    <flux:select.option>-- Pilih --</flux:select.option>
                                                    @foreach ($roles as $role)
                                                        <flux:select.option value="{{ $role->id }}" :selected="$item->hasRole($role->name)">{{ $role->name }}</flux:select.option>
                                                    @endforeach
                                                </flux:select>

                                            <div class="flex">
                                                <flux:spacer />

                                                <flux:button type="submit" variant="primary">Simpan</flux:button>
                                            </div>
                                        </form>
                                    @endslot
                                @endcomponent

                                @component('components.modal-delete')
                                    @slot('triggerName')
                                        modal-delete-{{ $item->id }}
                                    @endslot

                                    @slot('url')
                                        {{ route('account.delete', $item->id) }}
                                    @endslot
                                @endcomponent
                            </td>
                            <!--]-->
                        </tr>
                    @endforeach
                @else
                    <tr class="py-6">
                        <td class="py-5 border-gray-200 p4" colspan="6">
                            <h4 class="text-center">Data account kosong</h4>
                        </td>
                    </tr>
                @endif
            @endslot
        @endcomponent

    </flux:main>
@endsection
