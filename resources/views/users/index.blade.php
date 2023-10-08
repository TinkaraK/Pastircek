@extends('base.app')

@section('content')

    <div
        class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6>Uporabniki </h6>
        </div>
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Ustvari uporabnika</a>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Ime
                        </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Vloga
                        </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Kmetija
                        </th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 leading-normal text-sm">{{ $user->name }}</h6>
                                        <p class="mb-0 leading-tight text-xs text-slate-400">
                                            {{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 leading-tight text-xs text-slate-400">{{ $user->role?->name }}</p>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $user->farm?->name ?? "/" }}</span>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="{{ route('users.edit', $user) }}"
                                   class="font-semibold leading-tight text-xs text-slate-400">
                                    Uredi </a>
                                <a href="{{ route('users.show', $user) }}"
                                   class="font-semibold leading-tight text-xs text-slate-400">
                                    Podrobnosti </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--    <script>--}}
    {{--        $(function() {--}}
    {{--            var table = $('#table-users').DataTable({--}}
    {{--                processing: true,--}}
    {{--                serverSide: true,--}}
    {{--                ajax: {--}}
    {{--                    url: "{{ route('users.list') }}",--}}
    {{--                },--}}
    {{--                pageLength: 25,--}}
    {{--                columns: [{--}}
    {{--                    data: 'DT_RowIndex',--}}
    {{--                    name: 'DT_RowIndex',--}}
    {{--                    orderable: false,--}}
    {{--                    searchable: false--}}
    {{--                },--}}
    {{--                    {--}}
    {{--                        data: 'name',--}}
    {{--                        name: 'name'--}}
    {{--                    },--}}
    {{--                    {--}}
    {{--                        data: 'email',--}}
    {{--                        name: 'email'--}}
    {{--                    },--}}
    {{--                    {--}}
    {{--                        data: 'role',--}}
    {{--                        name: 'role'--}}
    {{--                    },--}}
    {{--                    {--}}
    {{--                        data: 'farm',--}}
    {{--                        name: 'farm'--}}
    {{--                    },--}}
    {{--                    {--}}
    {{--                        data: 'actions',--}}
    {{--                        name: 'actions',--}}
    {{--                        orderable: false,--}}
    {{--                        searchable: false--}}
    {{--                    },--}}
    {{--                ],--}}
    {{--                language: {--}}
    {{--                    "lengthMenu": "{{ __('messages.display') }}  _MENU_  {{ __('messages.records_per_page') }}",--}}
    {{--                    "zeroRecords": "{{ __('messages.no_records_found') }}",--}}
    {{--                    "info": "{{ __('messages.showing_page') }} _PAGE_ {{ __('messages.of') }} _PAGES_",--}}
    {{--                    "infoEmpty": "{{ __('messages.no_records_available') }}",--}}
    {{--                    "infoFiltered": "({{ __('messages.filtered_from') }} _MAX_ {{ __('messages.total_records') }})"--}}
    {{--                },--}}
    {{--                pagingType: 'numbers'--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
