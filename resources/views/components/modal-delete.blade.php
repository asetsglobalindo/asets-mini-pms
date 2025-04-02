<flux:modal.trigger name="{{ $triggerName }}">
    {{-- merge --}}
    {{-- <flux:button variant="danger" icon="trash"></flux:button> --}}
    <button class="text-red-500">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
            </path>
        </svg>
    </button>
</flux:modal.trigger>

<flux:modal name="{{ $triggerName }}" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Hapus data?</flux:heading>

            <flux:text class="mt-2">
                <p>Kamu berencana menghapus data ini.</p>
                <p>Data tidak akan bisa dikembalikan.</p>
            </flux:text>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Batal</flux:button>
            </flux:modal.close>

            <form action="{{ $url }}" method="post">
                @csrf
                @method('delete')

                <flux:button type="submit" variant="danger">Hapus Data</flux:button>
            </form>

        </div>
    </div>
</flux:modal>
