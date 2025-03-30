@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Kategori Bisnis</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />


        <div class="flex justify-end mb-4 gap-4">
            <div>

                @component('components.modal')

                @slot('triggerModal') insert-data @endslot

                @slot('buttonModal') <flux:button> Tambah Data </flux:button> @endslot

                @slot('modalInputForm')

                        <div>
                            <flux:heading size="lg">Tambah Data</flux:heading>
                            <flux:text class="mt-2">Tambah kategori bisnis.</flux:text>
                        </div>

                    <form action="{{ route('kategori-bisnis.store') }}" method="post">

                        @csrf

                        {{-- <flux:select name="company_id" class="mb-4" label="Nama perusahaan">
                            <flux:select.option>Pilih Perusahaan</flux:select.option>
                            @foreach ( $daftar_perusahaan as $perusahaan )
                                 <flux:select.option value="{{ $perusahaan->id }}">{{ $perusahaan->name }}</flux:select.option>
                            @endforeach

                        </flux:select> --}}

                        <flux:input label="Kategori Bisnis" type="text" name="name" placeholder="Nama kategori bisnis" />


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
                    {{-- <td class="py-1 border border-gray-200 font-bold p-4" contenteditable="true">Nama Perusahaan</td> --}}
                    <td contenteditable="true" class="py-1 border border-gray-200 font-bold p-4">Kategori Bisnis</td>
                    <td contenteditable="true" class="py-1 border border-gray-200 font-bold p-4">Action</td>
                    <!--]-->
                </tr>
                @endslot

                @slot('tableBody')


                    @if(count($daftar_kategori_bisnis) > 0)

                            @foreach ( $daftar_kategori_bisnis as $kategori_bisnis )
                            <tr class=" py-5">
                                <!--[-->
                                {{-- <td class=" py-5 border border-gray-200   p-4" contenteditable="true">{{ $kategori_bisnis->company->name }}</td> --}}
                                <td contenteditable="true" class=" py-5 border border-gray-200   p-4">{{ $kategori_bisnis->name }}</td>
                                <td class="py-5 border-gray-200 p-4">
                                    @component('components.modal')

                                        @slot('buttonModal') <flux:button variant="primary" icon="pencil"></flux:button> @endslot

                                        @slot('triggerModal') modal-edit-{{ $kategori_bisnis->id }} @endslot

                                        @slot('modalInputForm')

                                            <div>
                                                <flux:heading size="lg">Edit Data</flux:heading>
                                                <flux:text class="mt-2">Edit kategori bisnis.</flux:text>
                                            </div>

                                        <form action="{{ route('kategori-bisnis.update', $kategori_bisnis->id) }}" method="post">

                                            @csrf
                                            @method('put')

                                            {{-- <flux:select name="company_id" class="mb-4" label="Nama perusahaan">
                                                <flux:select.option>Pilih Perusahaan</flux:select.option>

                                                @foreach ( $daftar_perusahaan as $perusahaan )

                                                    @php

                                                        $selected = ($kategori_bisnis->company_id ?? null) == $perusahaan->id ? 'selected' : '';

                                                    @endphp

                                                    <flux:select.option value="{{ $perusahaan->id }}"
                                                        @if(($kategori_bisnis->company_id ?? null) == $perusahaan->id) selected @endif>
                                                        {{ $perusahaan->name }}
                                                    </flux:select.option>


                                                @endforeach

                                            </flux:select> --}}

                                            <flux:input label="Kategori Bisnis" value="{{ $kategori_bisnis->name ?? '' }}" type="text" name="name" placeholder="Nama kategori bisnis" />


                                            <div class="flex">
                                                <flux:spacer />

                                                <flux:button type="submit" variant="primary">Simpan</flux:button>
                                            </div>
                                        </form>

                                    @endslot

                                @endcomponent

                                    @component('components.modal-delete')

                                        @slot('triggerName')  modal-delete-{{ $kategori_bisnis->id }} @endslot

                                        @slot('url')  {{ route('kategori-bisnis.delete', $kategori_bisnis->id) }} @endslot

                                    @endcomponent
                                </td>
                                <!--]-->
                            </tr>
                            @endforeach


                    @else

                            <tr class="py-6">
                               <td class="py-5 border-gray-200 p4" colspan="3">
                                <h4 class="text-center">Data kategori bisnis kosong</h4>
                               </td>
                            </tr>

                    @endif

                @endslot

           @endcomponent



    </flux:main>

@endsection
