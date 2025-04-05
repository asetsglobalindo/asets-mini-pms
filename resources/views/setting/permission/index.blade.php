@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Permission</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />

        <div class="flex justify-end mb-4 gap-4">
            <div>

                @component('components.modal')
                    @slot('triggerModal')
                        insert-data
                    @endslot

                    @slot('buttonModal')
                        <flux:button id="insert-data"> Tambah Data </flux:button>
                    @endslot

                    @slot('modalInputForm')
                        <div>
                            <flux:heading size="lg">Tambah Data</flux:heading>
                            <flux:text class="mt-2">Tambah permission.</flux:text>
                        </div>

                        <form action="{{ route('permission.store') }}" method="post">
                            @csrf

                            <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" />
                            <flux:input label="Display Name" type="text" name="display_name"
                                placeholder="Masukkan Display Name" />
                            <flux:input label="Nama Grup" type="text" name="group" placeholder="Masukkan Nama Group" />

                            <div class="flex">
                                <flux:spacer />

                                <flux:button type="submit" variant="primary">Simpan</flux:button>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>

            <div>

                <flux:input id="searchInput" class="md:w-80" icon="magnifying-glass" :value="request()->search ?? ''" autofocus placeholder="Cari data" />

            </div>

        </div>


        @component('components.table')
            @slot('tableHead')
                <tr class="border-b text-center">
                    <td contenteditable="false" class="w-40 p-3 font-bold">Nama</td>
                    <td contenteditable="false" class="w-52 p-3 font-bold">Display Name</td>
                    <td contenteditable="false" class="w-48 p-3 font-bold">Group</td>
                    <td contenteditable="false" class="w-40 p-3 font-bold">Guard</td>
                    <td contenteditable="false" class="w-24 p-3 font-bold">Kelola</td>
                </tr>
            @endslot

            @slot('tableBody')
                @if (count($permissions) > 0)
                    @foreach ($permissions as $item)
                        <tr class="border-b">
                            <td contenteditable="false" class="p-3">{{ $item->name }}</td>
                            <td contenteditable="false" class="p-3">{{ $item->display_name }}</td>
                            <td contenteditable="false" class="p-3">{{ $item->group }}</td>
                            <td contenteditable="false" class="p-3">{{ $item->guard_name }}</td>
                            <td class="p-3">
                                <div class="flex justify-center items-center space-x-2">
                                    <div>
                                        @component('components.modal')
                                            @slot('buttonModal')
                                                <button class="text-green-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            @endslot
                                            @slot('triggerModal')
                                                modal-edit-{{ $item->id }}
                                            @endslot
                                            @slot('modalInputForm')
                                                <div>
                                                    <flux:heading size="lg">Edit Data</flux:heading>
                                                    <flux:text class="mt-2">Edit permission.</flux:text>
                                                </div>

                                                <form action="{{ route('permission.update', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama"
                                                        value="{{ $item->name ?? '' }}" />
                                                    <flux:input label="Display Name" type="text" name="display_name"
                                                        placeholder="Masukkan Display Name" value="{{ $item->display_name ?? '' }}" />
                                                    <flux:input label="Nama Grup" type="text" name="group"
                                                        placeholder="Masukkan Nama Group" value="{{ $item->group ?? '' }}" />

                                                    <div class="flex">
                                                        <flux:spacer />

                                                        <flux:button type="submit" variant="primary">Simpan</flux:button>
                                                    </div>
                                                @endslot
                                            @endcomponent
                                    </div>

                                    <div>
                                        @component('components.modal-delete')
                                            @slot('triggerName')
                                                modal-delete-{{ $item->id }}
                                            @endslot
                                            @slot('url')
                                                {{ route('permission.delete', $item->id) }}
                                            @endslot
                                        @endcomponent
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="py-6">
                        <td class="py-5 border-gray-200 p4" colspan="5">
                            <h4 class="text-center">Data role kosong</h4>
                        </td>
                    </tr>
                @endif
            @endslot
        @endcomponent

        {{ $permissions->links() }}

        @include('components.search-script')

    </flux:main>
@endsection
