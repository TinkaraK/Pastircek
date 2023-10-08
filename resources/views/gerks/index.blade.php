@php use App\Enum\GerkType;use App\Enum\SchemeType; @endphp
@extends('base.app')

@section('content')

    <div
        class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6>Gerki</h6>
        </div>
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <a href="{{ route('gerks.create') }}" class="btn btn-primary">Dodaj gerk</a>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            #
                        </th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Ime
                        </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Površina
                        </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Tip in shema
                        </th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gerks as $i => $gerk)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">

                                <h6 class="mb-0 leading-normal text-sm">{{ $i+1 }}</h6>

                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 leading-normal text-sm">{{ $gerk->name }}</h6>
                                        <p class="mb-0 leading-tight text-xs text-slate-400">
                                            {{ $gerk->pid }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 leading-tight text-xs text-slate-400">{{ $gerk->area }} &#x33A1;</p>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">{{ GerkType::translate($gerk->type) }}</h6>
                                    <p class="mb-0 leading-tight text-xs text-slate-a400">
                                        {{ $gerk->sheme_type }}</p>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="{{ route('gerks.edit', $gerk) }}"
                                   class="font-semibold leading-tight text-xs text-slate-400">
                                    Uredi </a>
                                <a href="{{ route('gerks.show', $gerk) }}"
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

@endsection
