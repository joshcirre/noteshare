<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <x-button href="{{ route('notes.create') }}" wire:navigate primary right-icon="plus">Create
                    Note</x-button>
            </div>
            {{-- Should show if no notes. --}}
            <div class="text-center">
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No Notes</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new one.</p>
                <div class="mt-6">
                    <x-button href="{{ route('notes.create') }}" wire:navigate primary right-icon="plus">Create
                        Note</x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
