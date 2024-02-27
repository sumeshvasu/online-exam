<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="overflow-x: auto;">
                <a href="/">
                    <x-primary-button>
                        {{ __('Back') }}
                    </x-primary-button>
                </a>

                @if (session()->has('message'))
                    <span class="alert alert-success pl-6" style="color: green">
                        {{ session()->get('message') }}
                    </span>
                @endif

                @if (count($list) == 0)
                    <span class="alert alert-success pl-6" style="color: red">Questions are unavailable. Please
                        wait...</span>
                @endif

                <div class="">
                    <form method="POST" action="{{ route('validate-exam') }}">
                        @csrf
                        <!-- Name -->
                        <div class="mb-4 mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-4/5" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" style="float: left" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            <x-primary-button class="ml-2 mt-1 pt-3" type="button"
                                id="validateUser">Start</x-primary-button>
                        </div>
                        @if ($list)
                            <div id="error-message-block">
                                @foreach ($list as $row)
                                    <x-input-error :messages="$errors->get('question_' . $row->id)" class="mt-2 mb-2" />
                                @endforeach
                            </div>
                        @endif

                        <div id="question-list">
                            <!-- Questions & Options -->
                            @if ($list)
                                @foreach ($list as $row)
                                    <div class="mb-4">
                                        <x-input-label value="Question {{ $row->id }} : {{ $row->question }}" />
                                        <div class="row">
                                            <div class="pr-2" style="float: left;">
                                                <x-radio style="cursor: pointer" name="question_{{ $row->id }}"
                                                    value="Option A" />
                                            </div>
                                            <div>
                                                {{ $row->option_a }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="pr-2" style="float: left;">
                                                <x-radio style="cursor: pointer" name="question_{{ $row->id }}"
                                                    value="Option B" />
                                            </div>
                                            <div>
                                                {{ $row->option_b }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="pr-2" style="float: left;">
                                                <x-radio style="cursor: pointer" name="question_{{ $row->id }}"
                                                    value="Option C" />
                                            </div>
                                            <div>
                                                {{ $row->option_c }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="pr-2" style="float: left;">
                                                <x-radio style="cursor: pointer" name="question_{{ $row->id }}"
                                                    value="Option D" />
                                            </div>
                                            <div>
                                                {{ $row->option_d }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <x-primary-button class="">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#email").prop("readonly", false);
            $("#name").prop("readonly", false);

            if ($('#error-message-block').text().length == 401) {
                $("#question-list").hide();
            } else {
                $("#question-list").show();
                $('#validateUser').text('Started');
                $("#email").prop("readonly", true);
                $("#name").prop("readonly", true);
            }

            $("#validateUser").on("click", function() {
                if (IsEmail($("#email").val()) === false) {
                    alert('Please provide a valid email.');
                } else {

                    if ($("#email").val()) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '{{ url('/validate-user') }}',
                            type: "post",
                            data: "email=" + $('#email').val(),
                            beforeSend: function() {
                                $('#validateUser').append("loading..");
                                $("#question-list").hide();
                            },
                            success: function(result) {
                                $('#validateUser').text('Started');

                                if (result == 'valid') {
                                    $("#question-list").show();
                                    $("#email").prop("readonly", true);
                                    $("#name").prop("readonly", true);
                                } else {
                                    alert('You are already finished this exam');
                                }
                            }
                        });
                    }
                }
            });

            function IsEmail(email) {
                const regex =
                    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
        });
    </script>
</x-app-layout>
