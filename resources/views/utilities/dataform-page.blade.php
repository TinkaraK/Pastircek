@extends("base.app")

@section("content")

    <div class="w-full px-6 mx-auto">
        <div class="w-full flex mx-4 mb-2">
            @include('base.breadcrumbs')
        </div>
        @isset($dataForm->title)
            <div
                class="min-w-0 p-4 bg-white mx-6 overflow-hidden break-words border-0 rounded-2xl bg-clip-border">
                <h2 class="text-2xl font-bold">
                    {{ $dataForm->title }}
                </h2>
            </div>
        @endisset
        @if (session('status_message'))
            <div class="col-span-full rounded-2xl">
                <div class="bg-success text-white p-4 rounded">
                    <div class="flex items-center">
                        <span class="text-lg mr-2"><i class="fas fa-check-circle"></i></span>
                        <span class="text-lg">{{ session('status_message') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @component("utilities.dataform", array_merge(["dataForm" => $dataForm], $dataForm->extras))@endcomponent
    </div>
@endsection
