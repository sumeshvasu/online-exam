<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam Score') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="overflow-x: auto;">
                @if ($score)
                    <div class="">
                        <table class="min-w-full border divide-y divide-gray-200" style="margin-top: 10px;">
                            <thead>
                                <tr>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Email</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">User
                                            Score</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Total
                                            Score</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Created
                                            At</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($score as $row)
                                    <tr class="bg-white">
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->name }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->email }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->score }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->total_score }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
