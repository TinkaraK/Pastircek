@if (session('status_message'))
    <div class="col-span-full">
        <div class="bg-success text-white rounded-2xl mt-4 p-3 mx-6">
            <div class="flex items-center">
                <span class="text-lg mr-2"><i class="fas fa-check-circle"></i></span>
                <span class="text-lg">{{ session('status_message') }}</span>
            </div>
        </div>
    </div>
@endif
<div class="bg-white rounded-2xl mt-4 p-3 mx-6">
    <div class="grid grid-cols-12 gap-4">
        @foreach($dataView->items as $item)
            @component("utilities.dataview-item", ["item" => $item])@endcomponent
        @endforeach
    </div>
</div>
@if(isset($dataView->editRoute) || isset($dataView->deleteRoute))
    <div class="bg-white rounded-2xl mt-4 p-3 mx-6">
        <div class="flex justify-center">
            @isset($dataView->editRoute)
                <div class="mr-2">
                    <a class="btn btn-secondary mb-0" href="{{ $dataView->editRoute }}"><i class="fas fa-edit mr-2"></i>Uredi</a>
                </div>
            @endisset
            @isset($dataView->deleteRoute)
                <div>
                    <form method="POST" action="{{ $dataView->deleteRoute }}">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn btn-danger" onclick="confirmDeletion(this.form)"><i
                                class="fas fa-trash mr-2"></i>Izbriši
                        </button>
                    </form>
                </div>
            @endisset
        </div>
    </div>
@endisset
