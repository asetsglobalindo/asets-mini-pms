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

                <tr>
                    <!--[-->
                    <td class="py-1 border border-gray-200 font-bold p-4" contenteditable="true">Product-ID</td>
                    <td contenteditable="true" class="py-1 border border-gray-200 font-bold p-4">Description</td>
                    <td contenteditable="true" class="py-1 border border-gray-200 font-bold p-4">Price</td>
                    <td contenteditable="true" class="py-1 border border-gray-200 font-bold p-4">Action</td>
                    <!--]-->
                </tr>
                @endslot

                @slot('tableBody')

                <tr class=" py-5">
                    <!--[-->
                    <td class=" py-5 border border-gray-200   p-4" contenteditable="true">YY-853581</td>
                    <td contenteditable="true" class=" py-5 border border-gray-200   p-4">Notebook Basic</td>
                    <td contenteditable="true" class=" py-5 border border-gray-200   p-4">$ 299</td>
                    <td class="py-5 border-gray-200 p-4">
                        <flux:button icon="pencil"></flux:button>
                        <flux:button icon="trash"></flux:button>
                    </td>
                    <!--]-->
                </tr>

                @endslot

           @endcomponent



    </flux:main>



@endsection
