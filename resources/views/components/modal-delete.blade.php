<flux:modal.trigger name="{{ $triggerName }}">
    <flux:button variant="danger" icon="trash"></flux:button>
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
