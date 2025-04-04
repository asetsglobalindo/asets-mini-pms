@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Fasiltias Listing</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />


        <div class="flex justify-end mb-4 gap-4">
            <div>
                @component('components.modal')

                @slot('triggerModal') insert-data @endslot

                @slot('buttonModal')
                <flux:button> Tambah Data </flux:button> @endslot

                @slot('modalInputForm')

                <div>
                    <flux:heading size="lg">Tambah Data</flux:heading>
                    <flux:text required class="mt-2">Tambah fasiltias listing.</flux:text>
                </div>

                <form action="{{ route('fasilitas-listing.store') }}" method="post">

                    @csrf

                    <flux:input label="Fasilitas listing" type="text" name="name" placeholder="Nama fasilitas listing" required />


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


        @if(count($daftar_fasitilas_listing) > 0)
            @component('components.table')

            @slot('tableHead')

            <tr class="border-b text-center">
                <td contenteditable="true" class="p-3 font-bold">Nama</td>
                <td contenteditable="true" class="p-3 font-bold">Slug</td>
                <td contenteditable="true" class="p-3 font-bold">Action</td>
            </tr>
            @endslot

            @slot('tableBody')

            @foreach ($daftar_fasitilas_listing as $fasiltias_listing)
                <tr class="border-b">
                    <td contenteditable="true" class="p-3">{{ $fasiltias_listing->name }}</td>
                    <td contenteditable="true" class="p-3">{{ $fasiltias_listing->slug }}</td>
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
                                @slot('triggerModal') modal-edit-{{ $fasiltias_listing->id }} @endslot
                                @slot('modalInputForm')

                                <div>
                                    <flux:heading size="lg">Edit Data</flux:heading>
                                    <flux:text class="mt-2">Edit fasilitas listing.</flux:text>
                                </div>

                                <form action="{{ route('fasilitas-listing.update', $fasiltias_listing->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <flux:input label="Fasilitas listing" value="{{ $fasiltias_listing->name ?? '' }}" type="text"
                                        name="name" placeholder="Nama fasiltias listing" />

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
                                @slot('triggerName') modal-delete-{{ $fasiltias_listing->id }} @endslot
                                @slot('url') {{ route('fasilitas-listing.delete', $fasiltias_listing->id) }} @endslot
                                @endcomponent
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach

            @endslot

            @endcomponent

        @else

            <tr class="py-6">
                <td class="py-5 border-gray-200 p4" colspan="3">
                    <h4 class="text-center">Data fasiliras listing kosong</h4>
                </td>
            </tr>

        @endif



    </flux:main>

@endsection
