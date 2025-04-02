<flux:modal.trigger name="{{ $triggerModal }}">
    {{ $buttonModal }}
</flux:modal.trigger>

<flux:modal name="{{ $triggerModal }}" class="md:w-96">
    <div class="space-y-6">
        {{ $modalInputForm }}
    </div>
</flux:modal>