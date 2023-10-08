@extends('base.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-xl font-semibold">
                    <h4>@lang('messages.add_user')</h4>
                </div>
                <div class="mt-6 text-center items-center">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name">@lang('messages.name')</label>
                            <input type="text" name="name"
                                   class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror"
                                   placeholder="@lang('messages.name')" aria-label="@lang('messages.name')"
                                   aria-describedby="name-addon"
                                   value="{{ old('name') }}">
                            @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email">@lang('messages.email')</label>
                            <input type="text" name="email"
                                   class="w-full px-4 py-2 border rounded-md @error('email') border-red-500 @enderror"
                                   placeholder="@lang('messages.email')" aria-label="@lang('messages.email')"
                                   aria-describedby="email-addon" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block" for="role">{{ __('messages.role') }}</label>
                            <select class="w-full px-4 py-2 border rounded-md @error('role') border-red-500 @enderror"
                                    id="role"
                                    name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if (old('role') == $role) selected @endif>
                                        {{ __("messages.$role->name") }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block" for="farm_id">{{ __('messages.farm') }}</label>
                            <select
                                class="w-full px-4 py-2 border rounded-md @error('farm_id') border-red-500 @enderror"
                                id="farm_id"
                                name="farm_id">
                                @foreach (\App\Models\farm::query()->get() as $farm)
                                    <option value="{{ $farm->id }}"
                                            @if (old('farm_id') == $farm->id) selected @endif>
                                        {{ $farm->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('farm_id')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-gray-800 text-white px-4 py-2 rounded-md">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
