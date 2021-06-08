<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leerlingen invoeren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-jet-authentication-card>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo/>
                </x-slot>

                <x-jet-validation-errors class="mb-4"/>

                <form method="POST" action="{{ route('add-students') }}">
                    @csrf

                    <div>
                        <x-jet-label for="first_name" value="{{ __('Naam') }}"/>
                        <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                                     required autofocus autocomplete="first_name"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="last_name" value="{{ __('Achternaam') }}"/>
                        <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                     :value="old('last_name')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="group" value="{{ __('Groep') }}"/>
                        <select name="group" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @for($i = 4; $i < 9; $i++)
                                <option value="{{$i}}">Groep {{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="birtday" value="{{ __('Geboorte datum') }}"/>
                        <x-jet-input id="birtday" class="block mt-1 w-full" type="date" name="birtday"
                                     :value="old('birtday')" required/>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Leerling toevoegen') }}
                        </x-jet-button>
                    </div>
                </form>
            </x-jet-authentication-card>


            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }}
            </footer>
        </div>
    </div>
</x-app-layout>
