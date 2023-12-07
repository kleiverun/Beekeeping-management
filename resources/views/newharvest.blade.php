<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Registrer innhøsting av honning') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container px-4 mx-auto lg:px-8">
            <div class="flex items-center justify-center">
                <div class="max-w-6xl mx-auto">
                    <!-- Grid of Livewire components -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <livewire:register-harvest :hives="$hives" />
                    </div>
                </div>
            </div>
        </div>
        <x-harvests :harvests="$harvests" />
    </div>
</x-app-layout>
<livewire:scripts />

<script>
    Livewire.on('refreshComponent', () => {
        // Refresh the Livewire component
        Livewire.emit('yourCustomEvent'); // Replace 'yourCustomEvent' with the event you want to trigger
    });
</script>
