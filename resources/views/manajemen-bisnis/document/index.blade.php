@extends('layouts.index')

@section('content')
    <flux:main>
        <flux:heading size="xl" level="1">Index Document</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
        <flux:separator variant="subtle" />

        <div class="flex justify-end mb-4 gap-4">
            <div>
                @component('components.modal')

                @slot('triggerModal') insert-quotation @endslot

                @slot('buttonModal')
                <flux:button> + Quotation </flux:button> @endslot

                @slot('modalInputForm')

                <div>
                    <flux:heading size="lg">Tambah Data</flux:heading>
                    <flux:text required class="mt-2">Tambah Quotation</flux:text>
                </div>

                <form action="{{ route('document.quotation.store') }}" method="post" class="grid grid-cols-1 gap-4">

                    @csrf
                    <div>
                        <label for="start-date"
                            class="inline-flex items-center text-sm font-medium text-zinc-800 dark:text-white mb-3">Tanggal</label>
                        <input type="date" id="start-date" name="date"
                            class="w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-base sm:text-sm py-2 h-10 leading-[1.375rem] ps-3 pe-3 bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-xs border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:border-white/10 dark:disabled:border-white/5">
                    </div>

                    <flux:input label="Nomor" type="text" name="number" />
                    <flux:input label="Listing" type="text" name="spbu" />
                    <flux:input label="Penerima" type="text" name="recipient" />
                    <flux:input label="Ruangan" type="text" name="space" />
                    <flux:input label="Luas Area" type="number" name="area_size" />
                    <flux:input label="Harga per Meter" type="number" name="price_per_meter" />
                    <flux:input label="Total Harga" type="number" name="total_price" />

                    <div>
                        <label for="start-date"
                            class="inline-flex items-center text-sm font-medium text-zinc-800 dark:text-white mb-3">Tanggal
                            Mulai</label>
                        <input type="date" id="start-date" name="start_date"
                            class="w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-base sm:text-sm py-2 h-10 leading-[1.375rem] ps-3 pe-3 bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-xs border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:border-white/10 dark:disabled:border-white/5">
                    </div>

                    <div>
                        <label for="end-date"
                            class="inline-flex items-center text-sm font-medium text-zinc-800 dark:text-white mb-3">Tanggal
                            Berakhir</label>
                        <input type="date" id="end-date" name="end_date"
                            class="w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-base sm:text-sm py-2 h-10 leading-[1.375rem] ps-3 pe-3 bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-xs border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:border-white/10 dark:disabled:border-white/5">
                    </div>

                    <flux:input label="Kontak Person" type="text" name="contact_person" />
                    <flux:input label="Nomor Kontak" type="text" name="contact_number" />
                    <flux:input label="Wilayah Penjualan" type="text" name="sales_area" />
                    <flux:input label="Nama Tanda Tangan" type="text" name="signature_name" />

                    <div class="flex mt-5">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Simpan</flux:button>
                    </div>
                </form>

                @endslot

                @endcomponent
            </div>

            <div>
                @component('components.modal')

                @slot('triggerModal') insert-bak @endslot

                @slot('buttonModal')
                <flux:button> + BAK </flux:button> @endslot

                @slot('modalInputForm')

                <div>
                    <flux:heading size="lg">Tambah Data</flux:heading>
                    <flux:text required class="mt-2">Tambah kategori bisnis.</flux:text>
                </div>

                <form action="{{ route('kategori-bisnis.store') }}" method="post">

                    @csrf

                    <flux:input label="Kategori Bisnis" type="text" name="name" placeholder="Nama kategori bisnis" />


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
    </flux:main>
@endsection