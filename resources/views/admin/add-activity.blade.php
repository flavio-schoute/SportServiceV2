<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activiteiten aanbod invoeren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full sm:max-w-md mb-12 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <x-jet-validation-errors class="mb-4"/>

                @if (session('success'))
                    <div class="flex items-center mb-5 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="text-xl font-normal  max-w-full flex-initial">
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif


                <form method="POST" action="{{ route('enter-activity') }}">
                    @csrf

                    <div>
                        <x-jet-label for="provider" value="{{ __('Wie is de aanbieder:') }}"/>
                        <select name="provider" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($providers as $provider)
                                <option value="{{$provider->provider_id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="activity" value="{{ __('Wat is de activiteit:') }}"/>
                        <select name="activity" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($sports as $sport)
                                <option value="{{$sport->sport_id}}">{{$sport->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="activity_location" value="{{ __('Waar vind de activiteit plaats:') }}"/>
                        <select name="activity_location" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($locations as $location)
                                <option value="{{$location->location_id}}">{{$location->location}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="unique_activity_name" value="{{ __('Unieke activiteiten naam:') }}"/>
                        <x-jet-input id="unique_activity_name" class="block mt-1 w-full" type="text" name="unique_activity_name"
                                     :value="old('unique_activity_name')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="total_participants" value="{{ __('Maximaal aantal deelnemmers:') }}"/>
                        <select name="total_participants" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @for($i = 0; $i < 31; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="activity_take_place" value="{{ __('Wanneer vind de activiteit plaats:') }}"/>
                        <x-jet-input id="activity_take_place" class="block mt-1 w-full" type="date" name="activity_take_place"
                                     :value="old('activity_take_place')" required/>
                    </div>


                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button>
                            {{ __('Activiteit invoeren') }}
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
