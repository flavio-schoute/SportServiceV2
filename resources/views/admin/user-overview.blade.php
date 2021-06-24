<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gebruikers overzicht') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Naam
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            School
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Account status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->teacher_id}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">


                                            @inject('injectedUser', 'App\Models\User')

                                            <div>
                                                <livewire:toggle-button
                                                    :model="$injectedUser"
                                                    field="is_active"
                                                    myKey="{{ $user->id }}"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- School -->
{{--                            <table class="min-w-full divide-y divide-gray-200 w-full">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        ID--}}
{{--                                    </th>--}}
{{--                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Naam--}}
{{--                                    </th>--}}
{{--                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Email--}}
{{--                                    </th>--}}

{{--                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Account status--}}
{{--                                    </th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                                @foreach ($schools as $school)--}}
{{--                                    <tr>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                            {{ $school->school_id}}--}}
{{--                                        </td>--}}

{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                            {{ $school->name }}--}}
{{--                                        </td>--}}

{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                            {{ $user->email }}--}}
{{--                                        </td>--}}

{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                            <label for="toggle" class="flex items-center cursor-pointer">--}}

{{--                                                <!-- Toggle -->--}}
{{--                                                <div class="relative">--}}
{{--                                                    <!-- Input -->--}}
{{--                                                    <input id="toggle" type="checkbox" class="sr-only"/>--}}
{{--                                                    <!-- Line -->--}}
{{--                                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>--}}
{{--                                                    <!-- Dot -->--}}
{{--                                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>--}}
{{--                                                </div>--}}
{{--                                            </label>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
                        </div>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-gray-500 border-t-2 border-gray-400">
                © {{ now()->year }}
            </footer>
        </div>
    </div>
</x-app-layout>

