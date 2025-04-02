@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Bisnis</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />


        <div class="flex justify-end mb-4 gap-4">
            <div>

                @component('components.modal')

                @slot('triggerModal') insert-data @endslot

                @slot('buttonModal') Tambah Data @endslot

                @slot('modalInputForm')

                <div>
                    <flux:heading size="lg">Update profile</flux:heading>
                    <flux:text class="mt-2">Make changes to your personal details.</flux:text>
                </div>

                <flux:input label="Name" placeholder="Your name" />

                <flux:input label="Date of birth" type="date" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Simpan</flux:button>
                </div>

                @endslot

                @endcomponent

            </div>

            <div>


                <flux:input class="md:w-80" icon="magnifying-glass" placeholder="Cari data" />


            </div>

        </div>


        @component('components.table')

        @slot('tableHead')

        <tr class="border-b text-center">
            <!--[-->
            <td contenteditable="true" class="p-3">Product-ID</td>
            <td contenteditable="true" class="p-3">Description</td>
            <td contenteditable="true" class="p-3">Price</td>
            <td contenteditable="true" class="p-3">Action</td>
            <!--]-->
        </tr>
        @endslot

        @slot('tableBody')

        <tr class="border-b">
            <!--[-->
            <td contenteditable="true" class="p-3">YY-853581</td>
            <td contenteditable="true" class="p-3">Notebook Basic</td>
            <td contenteditable="true" class="p-3">$ 299</td>
            <td class="p-3 flex items-center space-x-2">
                <button class="text-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </button>
                <button class="text-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </td>
            <!--]-->
        </tr>

        @endslot

        @endcomponent



    </flux:main>



<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> development
