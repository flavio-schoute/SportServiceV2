<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Studenten overzicht') }}
        </h2>    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="flex items-center mb-4 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        School
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Groep
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Geboorte datum
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->student_id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->first_name }} {{ $student->last_name }}

                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->school->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->group }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->date_of_birth == null ? '' : $student->date_of_birth->format('d-m-Y') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                            <a href="{{ route('student-overview.edit', $student->student_id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Bewerken</a>

                                            <form class="inline-block" action="{{ route('student-overview.destroy', $student->student_id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je de student wilt verwijderen?');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="text-red-600 hover:text-red-900 bg-transparent" value="Verwijderen">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <x-footer></x-footer>
        </div>
    </div>
</x-app-layout>
