<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Mosque List</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Mosque Name</th>
                                <th scope="col" class="px-6 py-3">Address</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                                @if ($mosques->isEmpty())
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No mosques found.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($mosques as $index => $mosque)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4">{{ $mosque->name }}</td>
                                            <td class="px-6 py-4">{{ $mosque->address }}</td>
                                            <td class="px-6 py-4">
                                                @if ($mosque->admin)
                                                    <a href="#" class="text-blue-600 hover:text-blue-900">
                                                        {{ $mosque->admin->name }}
                                                    </a>
                                                @else
                                                    <span class="text-red-600">No Admin Assigned</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody> --}}
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
