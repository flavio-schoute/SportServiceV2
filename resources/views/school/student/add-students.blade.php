<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leerlingen invoeren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full sm:max-w-md mb-12 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <x-jet-validation-errors class="mb-4"/>

                <form method="POST" action="{{ route('students') }}">
                    @csrf

                    <div>
                        <x-jet-label for="school" value="{{ __('School') }}"/>
                        <select name="school" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($schools as $school)
                                <option value="{{$school->school_id}}" {{ auth()->user()->is_admin ? '' : ($school->school_id == auth()->user()->id_school ? 'selected' : 'disabled') }}> {{$school->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="first_name" value="{{ __('Naam') }}"/>
                        <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                                     required/>
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
                        <x-jet-label for="birthday" value="{{ __('Geboorte datum') }}"/>
                        <x-jet-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                                     :value="old('birthday')" required/>
                    </div>


                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button>
                            {{ __('Leerling toevoegen') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>


            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }}
            </footer>
        </div>
    </div>
</x-app-layout>
