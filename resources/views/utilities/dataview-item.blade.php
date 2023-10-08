@if(sizeof($item->items) > 0)
    <div class="col-span-12 mt-3">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <h6 class="text-primary text-uppercase mb-0">{{ $item->title }}</h6>
            </div>
            <div class="col-span-12">
                <div class="grid grid-cols-{{ count($item->items) }} items-center ml-0 mt-1">
                    @foreach($item->items as $subItem)
                        @component("utilities.dataview-item", ["item" => $subItem])@endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@else
    <div class="{{ $item->widthClasses ?? 'col-span-12' }} mt-2">
        <div class="mx-2">
            @switch($item->type)
                @case("text")
                        <span class="text-primary font-bold">{{ $item->title }}</span>
                        <h5 class="mb-0">{{ $item->value }}</h5>
                    @break
                @case("category")
                    <div class="mx-0 p-4 overflow-hidden break-words border-0 rounded-2xl bg-primary bg-clip-border">
                        <h4 class="text-xl font-bold text-white">
                            {{ $item->title }}
                        </h4>
                    </div>
                    @break
                @case("subCategory")
                    <div class="mb-0">
                        <h4 class="text-xl border-b @if($item->extras["border_only_text"]) inline @endif border-3 border-primary">{{ $item->title }}</h4>
                    </div>
                    @break
                @case("button")
                    <a class="{{ $item->extras["classes"] }}" href="{{ $item->value }}">{{ $item->title }}</a>
                    @break
                @case("formButton")
                    <form action="{{ $item->value }}" method="POST">
                        @method($item->extras["method"])
                        @csrf
                        @foreach($item->extras["data"] as $name => $value)
                            <input type="hidden" name="{{ $name }}" value="{{ $value }}"/>
                        @endforeach
                        <button class="{{ $item->extras["classes"] }}" @if($item->extras["confirmable"]) type="button"
                                onclick="confirmAction(this.form, 'Potrdite akcijo')"
                                @else type="submit" @endif>{{ $item->title }}</button>
                    </form>
                    @break
                @case("anchor")
                    <a class="{{ $item->extras["classes"] }}" href="{{ $item->value }}">{{ $item->title }}</a>
                    @break
                @case("component")
                    @component($item->viewName, ["objects" => $item->objects])@endcomponent
                    @break
                @case("badge")
                    <div>
                        @isset($item->title)
                            <span class="text-primary font-bold">{{ $item->title }}</span>
                        @endisset
                        <span class="badge {{ $item->extras["classes"] }}">{{ $item->value }}</span>
                    </div>
                    @break
            @endswitch
        </div>
    </div>
@endif
