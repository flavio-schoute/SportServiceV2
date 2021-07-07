<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Studenten overzicht') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize italic block mb-2">Whooops!</b>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </span>
                </div>
            @endif

            <form action="{{ route('student-overview.update', $student->student_id) }}" method="POST">
                @csrf
                @method('PUT')

                @if(auth()->user()->is_admin == 1)
                    <div>
                        <x-jet-label for="school" value="{{ __('School:') }}"/>
                        <select name="school"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach($schools as $school)
                                <option value="{{$school->school_id}}">{{$school->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mt-4">
                    <x-jet-label for="first_name" value="{{ __('Naam:') }}"/>
                    <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                 :value="$student->first_name" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="last_name" value="{{ __('Achternaam:') }}"/>
                    <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                 :value="$student->last_name" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="group" value="{{ __('Groep:') }}"/>
                    <select name="group" value="{{ $student->group }}"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                        @for($i = 4; $i < 9; $i++)
                            <option value="{{$i}}" {{$i == $student->group ? 'selected' : ''}}>Groep {{$i}}</option>
                        @endfor
                    </select>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-jet-button>
                        {{ __('Leerling bewerken opslaan') }}
                    </x-jet-button>
                </div>
            </form>

            <x-footer></x-footer>
        </div>
    </div>
</x-app-layout>
