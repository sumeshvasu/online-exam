<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions & Answers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="overflow-x: auto;">
                <x-primary-button onclick="window.location='{{ route('question_answer.list') }}'">
                    {{ __('Back') }}
                </x-primary-button>

                @if (session()->has('message'))
                    <span class="alert alert-success pl-6" style="color: green">
                        {{ session()->get('message') }}
                    </span>
                @endif

                <div class="">
                    <form method="POST" action="{{ route('question_answer.store') }}">
                        @csrf
                        <!-- Question -->
                        <div class="mb-4 mt-4">
                            <x-input-label for="question" :value="__('Question')" />
                            <x-text-input id="question" class="block mt-1 w-full" type="text" name="question"
                                :value="old('question')" autofocus autocomplete="question" />
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <!-- Option A -->
                        <div class="mb-4">
                            <x-input-label for="option_a" :value="__('Option A')" />
                            <x-text-input id="option_a" class="block mt-1 w-full" type="text" name="option_a"
                                :value="old('option_a')" required autofocus autocomplete="option_a" />
                            <x-input-error :messages="$errors->get('option_a')" class="mt-2" />
                        </div>

                        <!-- Option B -->
                        <div class="mb-4">
                            <x-input-label for="option_b" :value="__('Option B')" />
                            <x-text-input id="option_b" class="block mt-1 w-full" type="text" name="option_b"
                                :value="old('option_b')" required autofocus autocomplete="option_b" />
                            <x-input-error :messages="$errors->get('option_a')" class="mt-2" />
                        </div>

                        <!-- Option C -->
                        <div class="mb-4">
                            <x-input-label for="option_c" :value="__('Option C')" />
                            <x-text-input id="option_c" class="block mt-1 w-full" type="text" name="option_c"
                                :value="old('option_c')" required autofocus autocomplete="option_c" />
                            <x-input-error :messages="$errors->get('option_c')" class="mt-2" />
                        </div>

                        <!-- Option D -->
                        <div class="mb-4">
                            <x-input-label for="option_d" :value="__('Option D')" />
                            <x-text-input id="option_d" class="block mt-1 w-full" type="text" name="option_d"
                                :value="old('option_d')" required autofocus autocomplete="option_d" />
                            <x-input-error :messages="$errors->get('option_d')" class="mt-2" />
                        </div>

                        <!-- Answer -->
                        <div class="mb-4">
                            <x-input-label for="answer" :value="__('Answer')" />
                            <x-select required class="block mt-1 w-full" name="answer" :options="[
                                ['value' => '', 'text' => 'Select Answer'],
                                ['value' => 'Option A', 'text' => 'Option A'],
                                ['value' => 'Option B', 'text' => 'Option B'],
                                ['value' => 'Option C', 'text' => 'Option C'],
                                ['value' => 'Option D', 'text' => 'Option D'],
                            ]"
                                value-field="value" label-field="text">
                            </x-select>
                        </div>

                        <x-primary-button class="">
                            {{ __('Store') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
