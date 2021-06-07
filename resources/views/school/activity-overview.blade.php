<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activiteiten overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-3 gap-4">
                @foreach($activities as $activity)
                    <div>
                        <div class="flex flex-col max-w-md bg-white px-8 py-6 rounded-xl space-y-5 items-center">
                            <h3 class="font-serif font-bold text-gray-900 text-xl">{{$activity->name}}</h3>
                            <p class="text-center leading-relaxed">{{$activity->description}}</p>
                            <button class="px-24 py-4 bg-blue-900 rounded-md text-white text-sm focus:border-transparent">Aanmelden</button>
                        </div>
                    </div>
                @endforeach
            </div>


{{--            @foreach($activities as $activity)--}}
{{--                <div>--}}
{{--                    <div class="flex flex-col max-w-md bg-white px-8 py-6 rounded-xl space-y-5 items-center">--}}
{{--                        <h3 class="font-serif font-bold text-gray-900 text-xl">{{$activity->name}}</h3>--}}
{{--                        <p class="text-center leading-relaxed">{{$activity->description}}</p>--}}
{{--                        <button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent">Aanmelden</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }}
            </footer>
        </div>
    </div>
</x-app-layout>
