@extends("base.app")

@section("content")

    <div class="w-full px-6 mx-auto">
        <div class="w-full flex mx-4 mb-2">
            @include('base.breadcrumbs')
        </div>
        <div
            class="min-w-0 p-4 mx-6 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border">
            <h2 class="text-2xl font-bold">
                {{ $dataView->title }}
            </h2>
        </div>

        @component("utilities.dataview", array_merge(["dataView" => $dataView]))@endcomponent
    </div>
@endsection
