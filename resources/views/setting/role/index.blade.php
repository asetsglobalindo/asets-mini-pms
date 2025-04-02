@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Role</flux:heading>
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
                            <flux:text class="mt-2">Tambah role.</flux:text>
                        </div>

                        <form action="{{ route('role.store') }}" method="post">
                            @csrf

                            <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" />

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
                    <!--[-->
                    <td contenteditable="false" class="py-1 border border-gray-200 font-bold p-4">Nama</td>
                    <td contenteditable="false" class="py-1 border border-gray-200 font-bold p-4">Action</td>
                    <!--]-->
                </tr>
            @endslot

            @slot('tableBody')
                @if (count($roles) > 0)
                    @foreach ($roles as $item)
                        <tr class=" py-5">
                            <!--[-->
                            {{-- <td class=" py-5 border border-gray-200   p-4" contenteditable="false">{{ $item->company->name }}</td> --}}
                            <td contenteditable="false" class=" py-5 border border-gray-200   p-4">{{ $item->name }}</td>
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
                                            <flux:text class="mt-2">Edit role.</flux:text>
                                        </div>

                                        <form action="{{ route('role.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                                <flux:input label="Nama" type="text" name="name" placeholder="Masukkan Nama" value="{{ $item->name ?? '' }}" />

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
                                        {{ route('role.delete', $item->id) }}
                                    @endslot
                                @endcomponent
                            </td>
                            <!--]-->
                        </tr>
                    @endforeach
                @else
                    <tr class="py-6">
                        <td class="py-5 border-gray-200 p4" colspan="2">
                            <h4 class="text-center">Data role kosong</h4>
                        </td>
                    </tr>
                @endif
            @endslot
        @endcomponent

    </flux:main>
@endsection
