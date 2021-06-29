<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-500 border-b-2 border-gray-400 pb-3 mb-4">
                <span class="fs-4">{{ $greeting }} Het is vandaag {{$today}}</span>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-3xl">
                        Welkom {{ Auth::user()->name }}
                    </div>

                    <div class="mt-4 text-gray-500">
                        Maak een keuze het navigatie menu boven in de website.
                    </div>

                    <div class="mt-3 text-gray-500 flex items-center">
                        Zet de registratie pagina uit:

                        @inject('injectOptions', 'App\Models\Options')

                        <div class="ml-2">
                            <livewire:toggle-button
                                :model="$injectOptions"
                                field="value"
                                myKey="1"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }} - Flavio Schoute & Robin Pater by Technova College
            </footer>
        </div>
    </div>
</x-app-layout>
