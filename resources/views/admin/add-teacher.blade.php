<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Leraren invoeren') }}
		</h2>
	</x-slot>
	<div class="py-6">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

				<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
					<div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        @if (session('success'))
                            <div class="flex justify-center items-center mb-5 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                                <div slot="avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div class="text-xl font-normal  max-w-full flex-initial">
                                    <p>{{ session('success') }}</p>
                                </div>
                                <div class="flex flex-auto flex-row-reverse">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endif

						<form method="POST" action="{{ route ('add-teachers') }}">
							@csrf

                            <div>
                                <x-jet-label for="school" value="{{ __('School') }}"/>
                                <select name="school" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                    @foreach($schools as $school)
                                        <option value="{{$school->school_id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
								<x-jet-label for="first_name" value="{{ __('Voornaam') }}" />
								<x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required />
							</div>

							<div class="mt-4">
								<x-jet-label for="last_name" value="{{ __('Achternaam') }}" />
								<x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
							</div>

							<div class="mt-4">
								<x-jet-label for="email" value="{{ __('Email van de Leraar') }}" />
								<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
							</div>

							<div class="mt-4">
								<x-jet-label for="phone_number" value="{{ __('Telefoon nummer') }}" />
								<x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
							</div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Wachtwoord') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Wachtwoord herhalen') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
								<x-jet-button class="ml-4">
									{{ __('Registreer') }}
								</x-jet-button>
							</div>
						</form>

					</div>
				</div>


            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }}
            </footer>
        </div>
    </div>
</x-app-layout>
