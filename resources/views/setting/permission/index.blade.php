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
                            <flux:input label="Display Name" type="text" name="display_name" placeholder="Masukkan Display Name" />
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

                <flux:input class="md:w-80" icon="magnifying-glass" placeholder="Cari data" />

            </div>

        </div>


        @component('components.table')
            @slot('tableHead')
                <tr>
                    <td contenteditable="false" class="w-40 py-1 border border-gray-200 font-bold p-4">Nama</td>
                    <td contenteditable="false" class="w-52 py-1 border border-gray-200 font-bold p-4">Display Name</td>
                    <td contenteditable="false" class="w-48 py-1 border border-gray-200 font-bold p-4">Group</td>
                    <td contenteditable="false" class="w-40 py-1 border border-gray-200 font-bold p-4">Guard</td>
                    <td contenteditable="false" class="w-24 py-1 border border-gray-200 font-bold p-4">Kelola</td>
                </tr>
            @endslot

            @slot('tableBody')
                @if (count($permissions) > 0)
                    @foreach ($permissions as $item)
                        <tr class=" py-5">
                            <!--[-->
                            <td contenteditable="false" class=" py-5 border border-gray-200 p-4">{{ $item->name }}</td>
                            <td contenteditable="false" class=" py-5 border border-gray-200 p-4">{{ $item->display_name }}</td>
                            <td contenteditable="false" class=" py-5 border border-gray-200 p-4">{{ $item->group }}</td>
                            <td contenteditable="false" class=" py-5 border border-gray-200 p-4">{{ $item->guard_name }}</td>
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
                                            <flux:text class="mt-2">Edit permission.</flux:text>
                                        </div>

                                        <form action="{{ route('permission.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                                <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" value="{{ $item->name ?? '' }}" />
                                                <flux:input label="Display Name" type="text" name="display_name" placeholder="Masukkan Display Name" value="{{ $item->display_name ?? '' }}" />
                                                <flux:input label="Nama Grup" type="text" name="group" placeholder="Masukkan Nama Group" value="{{ $item->group ?? '' }}" />

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
                                        {{ route('permission.delete', $item->id) }}
                                    @endslot
                                @endcomponent
                            </td>
                            <!--]-->
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

    </flux:main>
@endsection
