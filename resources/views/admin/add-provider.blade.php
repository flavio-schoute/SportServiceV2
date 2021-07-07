<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Aanbieders invoeren') }}
		</h2>
	</x-slot>
	<div class="py-6">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <form method="POST" action="{{route ('add-providers') }}">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Naam van de aanbieder:') }}"/>
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         :value="old('name')" required/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="materials" value="{{ __('Eventueel benodigde materialen:') }}"/>
                            <x-jet-input id="materials" class="block mt-1 w-full" type="text" name="materials"
                                         :value="old('materials')" required/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email van de aanbieder:') }}"/>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                         :value="old('email')" required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Aanbieder invoeren') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>

            <x-footer></x-footer>

        </div>
    </div>
</x-app-layout>
