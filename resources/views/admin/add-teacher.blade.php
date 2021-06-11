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

						<form method="POST" action="{{route ('add-teachers') }}">
							@csrf

							<div>
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