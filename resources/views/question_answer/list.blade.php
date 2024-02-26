<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions & Answers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="overflow-x: auto;">
                <x-primary-button onclick="window.location='{{ route('question_answer.create') }}'">
                    {{ __('Create') }}
                </x-primary-button>
                @if ($list)
                    <div class="">
                        <table class="min-w-full border divide-y divide-gray-200" style="margin-top: 10px;">
                            <thead>
                                <tr>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Created
                                            User</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Question</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Option
                                            A</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Option
                                            B</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Option
                                            C</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Option
                                            D</span>
                                    </th>
                                    <th class="bg-gray-100 px-6 py-3 text-sm text-left border">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Answer</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($list as $row)
                                    <tr class="bg-white">
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->user->name }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->question }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->option_a }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->option_b }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->option_c }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->option_d }}
                                        </td>
                                        <td class="border px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $row->answer }}
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
