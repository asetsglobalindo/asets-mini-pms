<flux:modal.trigger name="{{ $triggerModal }}">
    {{-- <flux:button>{{ $buttonModal }}</flux:button> --}}
    {{ $buttonModal }}
</flux:modal.trigger>

<flux:modal name="{{ $triggerModal }}" class="md:w-[60vw]">
    <div class="space-y-6">
        {{ $modalInputForm }}
    </div>
</flux:modal>
