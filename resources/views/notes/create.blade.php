<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <form class="space-y-4">
                    <x-input label="Note Subject" placeholder="It's been a great day." />
                    <x-textarea label="Notes" placeholder="Let your thoughts fill the page." />
                    <x-input icon="user" label="Recipient" placeholder="yourfriend@email.com" class="mb-6" />
                    <x-button primary right-icon="calendar">Schedule
                        Note</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
