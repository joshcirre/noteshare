<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex items-center">
                        <div>
                            <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes
                                Sent</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">1,234</p>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex items-center">
                        <div>
                            <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Loved</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">567</p>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex items-center">
                        <div>
                            <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Written</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">890</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
