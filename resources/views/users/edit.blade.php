@extends('base.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xl font-semibold">@lang('messages.edit_user')</span>
                    <a href="{{ route('users.password.reset', [$user]) }}" class="btn btn-link ms-3">
                        @lang('messages.reset_password')
                    </a>
                </div>
                <div class="text-center items-center">
                    <form action="{{ route('users.update', [$user]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name">@lang('messages.name')</label>
                            <input type="text" name="name" class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror"
                                   placeholder="@lang('messages.name')" aria-label="@lang('messages.name')" aria-describedby="name-addon"
                                   value="{{ old('name', $user->name) }}">
                            @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email">@lang('messages.email')</label>
                            <input type="text" name="email" class="w-full px-4 py-2 border rounded-md @error('email') border-red-500 @enderror"
                                   placeholder="@lang('messages.email')" aria-label="@lang('messages.email')"
                                   aria-describedby="email-addon" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (Auth::user()->hasRole('super_admin'))
                            <div class="mb-4">
                                <label class="block" for="school_id">{{ __('messages.school') }}</label>
                                <select class="w-full px-4 py-2 border rounded-md @error('school_id') border-red-500 @enderror" id="school_id"
                                        name="school_id">
                                    <option value="" @if (old('school_id', $user->school_id) == null) selected @endif>
                                        {{ __('messages.no_school') }}
                                    </option>
                                    @foreach (\App\Models\School::query()->get() as $school)
                                        <option value="{{ $school->id }}"
                                                @if (old('school_id', $user->school_id) == $school->id) selected @endif>
                                            {{ $school->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('school_id')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="block" for="language">{{ __('messages.language') }}</label>
                            <select class="w-full px-4 py-2 border rounded-md tom-select @error('language') border-red-500 @enderror" id="language"
                                    name="language">
                                @foreach ($languages as $language)
                                    <option value="{{ $language }}" @if (old('language') == $language || $user->language == $language) selected @endif>
                                        {{ __("messages.$language") }}
                                    </option>
                                @endforeach
                            </select>
                            @error('language')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">{{ __('messages.save') }}</button>
                            <a href="{{ route('users.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md">{{ __('messages.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
