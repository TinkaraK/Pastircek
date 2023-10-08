@if ($errors->any())
    <div class="bg-danger rounded-2xl text-danger-800 mt-4 p-3 mx-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="bg-white rounded-2xl mt-4 p-3 mx-6">
    <form method="{{ $dataForm->method === "GET" ? "GET" : "POST" }}" action="{{ $dataForm->route }}" novalidate
          autocomplete="off" enctype="multipart/form-data">
        @if($dataForm->method !== "GET")
            @csrf
            @if($dataForm->method !== "GET" && $dataForm->method !== "POST")
                @method($dataForm->method)
            @endif
        @endif
        <div class="grid grid-cols-12 gap-4">
            @foreach($dataForm->inputs as $input)
                @php $name = str_replace("]", "", str_replace("[", ".", $input->name)); @endphp
                @switch($input->type)
                    @case("text")
                    @case("number")
                    @case("color")
                    @case("password")
                    @case("email")
                        <div class="{{ (string) $input->divSize }} mb-4"
                             id="input-{{ $input->name }}-container">
                            <label class="block text-sm font-medium">
                                @if($input->title != "")
                                    <div class="mb-2">
                                        <span class="text-sm font-medium ml-2 mb-2">{{ $input->title }}</span>
                                    </div>
                                @endif
                            </label>
                            <div class="relative">
                                <input id="input-{{ $input->name }}" class="input @error($name) is-invalid @enderror"
                                       name="{{ $input->name }}" type="{{ $input->type }}"
                                       @isset($input->min) @if($input->type === "text") minlength="{{ $input->min }}"
                                       @else min="{{ $input->min }}"
                                       @endif @endisset @isset($input->max) @if($input->type === "text") maxlength="{{ $input->max }}"
                                       @else max="{{ $input->max }}"
                                       @endif @endisset value="{{ old($input->name) ?? $input->value }}"
                                       @if(($input->required ?? false) === true) required @endif />
                                @isset($input->addOn)
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <span class="text-gray-500">{{$input->addOn}}</span>
                                    </div>
                                @endisset
                            </div>
                            @isset($input->helpTip)
                                <small id="input-{{ $input->name }}-help" class="block mt-2 text-xs text-gray-500">
                                    <span>{{ $input->helpTip }}</span>
                                </small>
                            @endisset
                            @error($name)
                            <div class="text-danger mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @break
                    @case("date")
                        <div class="{{ $input->divSize }} mb-4" id="input-{{ $input->name }}-container">
                            <label class="block text-sm font-medium">
                                @if($input->title != "")
                                    <div class="mb-2">
                                        <span class="text-sm font-medium ml-2 mb-2">{{ $input->title }}</span>
                                    </div>
                                @endif
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <input id="input-{{ $input->name }}" class="input @error($name) is-invalid @enderror"
                                       name="{{ $input->name }}" type="{{ $input->type }}"
                                       @isset($input->min) @if($input->type === "text") minlength="{{ $input->min }}"
                                       @else min="{{ $input->min }}"
                                       @endif @endisset @isset($input->max) @if($input->type === "text") maxlength="{{ $input->max }}"
                                       @else max="{{ $input->max }}"
                                       @endif @endisset value="{{ old($input->name) ?? $input->value }}"
                                       @if(($input->required ?? false) === true) required @endif />
                                @isset($input->addOn)
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <span class="text-gray-500">{{$input->addOn}}</span>
                                    </div>
                                @endisset
                            </div>
                            @isset($input->helpTip)
                                <small id="input-{{ $input->name }}-help" class="block mt-2 text-xs text-gray-500">
                                    <span>{{ $input->helpTip }}</span>
                                </small>
                            @endisset
                            @error($name)
                            <div class="text-red-500 mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @push('scripts')
                            <script>
                                flatpickr('#input-{{ $input->name }}', {
                                    altInput: true,
                                    altFormat: "j. n. Y",
                                    dateFormat: "Y-m-d",
                                    locale: "sl"
                                });
                            </script>
                        @endpush
                        @break
                    @case("datetime")
                        <div class="{{ $input->divSize }} mb-4" id="input-{{ $input->name }}-container">
                            <label class="block text-sm font-medium">
                                @if($input->title != "")
                                    <div class="mb-2">
                                        <span class="text-sm font-medium ml-2 mb-2">{{ $input->title }}</span>
                                    </div>
                                @endif
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <input id="input-{{ $input->name }}" class="input @error($name) is-invalid @enderror"
                                       name="{{ $input->name }}" type="{{ $input->type }}"
                                       @isset($input->min) @if($input->type === "text") minlength="{{ $input->min }}"
                                       @else min="{{ $input->min }}"
                                       @endif @endisset @isset($input->max) @if($input->type === "text") maxlength="{{ $input->max }}"
                                       @else max="{{ $input->max }}"
                                       @endif @endisset value="{{ old($input->name) ?? $input->value }}"
                                       @if(($input->required ?? false) === true) required @endif />
                                @isset($input->addOn)
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <span class="text-gray-500">{{$input->addOn}}</span>
                                    </div>
                                @endisset
                            </div>
                            @isset($input->helpTip)
                                <div class="mt-2">
                                    <small id="input-{{ $input->name }}-help" class="block text-xs text-gray-500 ml-2">
                                        <span class="ml-2">{{ $input->helpTip }}</span>
                                    </small>
                                </div>
                            @endisset
                            @error($name)
                            <div class="text-red-500 mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @push('scripts')
                            <script>
                                flatpickr('#input-{{ $input->name }}', {
                                    altInput: true,
                                    altFormat: "j. n. Y H:i",
                                    dateFormat: "Y-m-d H:i",
                                    locale: "sl",
                                    enableTime: true,
                                });
                            </script>
                        @endpush
                        @break
                    @case("hidden")
                        <input type="hidden" id="input-{{ $input->name }}" name="{{ $input->name }}"
                               value="{{ $input->value }}" class="hidden"/>
                        @break
                    @case("checkbox")
                        <div class="{{ $input->divSize }} space-y-3" id="input-{{ $input->name }}-container">
                            <div class="ml-3">
                                <input type="hidden" name="{{ $input->name }}" id="input-{{ $input->name }}-value"
                                       value="@if(old($input->name) || $input->value == true) 1 @else 0 @endif">
                                <input type="checkbox"
                                       class="form-checkbox @if($errors->has($name)) is-invalid @endif"
                                       id="input-{{ $input->name }}"
                                       @if(old($input->name) || $input->value == true) checked @endif
                                       @isset($input->extras["disables"]) data-disables="{{ join(",", $input->extras["disables"]) }}"
                                       @endisset
                                       @isset($input->extras["enables"]) data-enables="{{ join(",", $input->extras["enables"]) }}"
                                       @endisset
                                       @isset($input->extras["hides"]) data-hides="{{ join(",", $input->extras["hides"]) }}"
                                       @endisset
                                       @isset($input->extras["shows"]) data-shows="{{ join(",", $input->extras["shows"]) }}"
                                       @endisset
                                       onchange="checkInputs()"
                                />
                                <label class="form-check-label"
                                       for="input-{{ $input->name }}">{{ $input->title }}</label>
                                @if($errors->has($name))
                                    <div class="text-red-500">
                                        @foreach($errors->get($name) as $error)
                                            {{ $error }}<br/>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        @push("scripts")
                            <script>
                                document.getElementById("input-{{ $input->name }}").addEventListener("change", (event) => {
                                    document.getElementById("input-{{ $input->name }}-value").value = event.target.checked ? 1 : 0;
                                });
                            </script>
                        @endpush
                        @break
                    @case("duration")
                        <div class="mt-3 {{ $input->divSize }}">
                            <label class="w-100">
                                <span class="ml-2">{{ $input->title }}</span>
                                <input type="number" class="form-input @if($errors->has($name)) is-invalid @endif"
                                       name="{{ $input->name }}" value="{{ old($input->name) ?? $input->value ?? 0 }}"
                                       id="input-{{ $input->name }}"/>
                                @if($errors->has($name))
                                    <div class="text-red-500">
                                        @foreach($errors->get($name) as $error)
                                            {{ $error }}<br/>
                                        @endforeach
                                    </div>
                                @endif
                                @push("scripts")
                                    <script>
                                        $("#input-{{ $input->name }}").durationPicker({
                                            translations: {
                                                day: 'Dan',
                                                hour: 'Ura',
                                                minute: 'Minuta',
                                                second: 'Sekunda',
                                                days: 'Dnevi',
                                                hours: 'Ure',
                                                minutes: 'Minute',
                                                seconds: 'Sekunde'
                                            }
                                        })
                                    </script>
                                @endpush
                            </label>
                        </div>
                        @break
                    @case("select")
                        <div class="{{ $input->divSize }}">
                            <label class="w-100">
                                @if($input->title != "")
                                    <div class="mb-2">
                                        <span class="text-xl ml-2 mb-2">{{ $input->title }}</span>
                                    </div>
                                @endif
                            </label>
                            <div class="">
                                <select class="form-select @if($errors->has($name)) is-invalid @endif"
                                        name="{{ $input->name }}" id="input-{{ $input->name }}"
                                        @if($input->extras["multiple"]) multiple @endif data-toggle="select"
                                        title="Izberi" data-live-search="true"
                                        data-live-search-placeholder="Išči">
                                    @if(!$input->required)
                                        <option value="">/</option>
                                    @endif
                                    @foreach($input->extras["options"] as $option)
                                        <option value="{{ $option["value"] }}"
                                                @if(($input->value === $option["value"] || (is_array($input->value) && in_array($option["value"], $input->value))) || ($option["value"] == old($input->name) || (is_array(old(str_replace("[]", "", $input->name))) && in_array($option["value"], old(str_replace("[]", "", $input->name)))))) selected @endif>{{ $option["title"] }}</option>
                                    @endforeach
                                </select>
                                @push("scripts")
                                    <script>
                                        new TomSelect('#input-{{ $input->name }}', {
                                            plugins: {
                                                dropdown_input: {
                                                    title: "Išči"
                                                }
                                            }
                                        });
                                    </script>
                                @endpush
                                @isset($input->helpTip)
                                    <small id="input-{{ $input->name }}-help" class="text-gray-400 text-sm">
                                        {{ $input->helpTip }}
                                    </small>
                                @endisset
                                @if($errors->has($name))
                                    <div class="text-red-500">
                                        @foreach($errors->get($name) as $error)
                                            {{ $error }}<br/>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        @break
                    @case("textarea")
                        <div class="{{ $input->divSize }}">
                            <label class="w-100">
                                @if($input->title != "")
                                    <div class="mb-2">
                                        <span class="text-xl ml-2 mb-2">{{ $input->title }}</span>
                                    </div>
                                @endif
                            </label>
                            <div class="">
                                <textarea rows="{{ $input->extras["rows"] }}" id="input-{{ $input->name }}"
                                          name="{{ $input->name }}"
                                          class="form-textarea @if($errors->has($name)) is-invalid @endif"
                                          minlength="{{ $input->min }}" maxlength="{{ $input->max }}"
                                          @if(($input->required ?? false) === true) required @endif>{{ old($name) ?? $input->value }}</textarea>
                            </div>
                            @isset($input->helpTip)
                                <small id="input-{{ $input->name }}-help" class="text-gray-400 ml-3">
                                    {{ $input->helpTip }}
                                </small>
                            @endisset
                            @if($errors->has($name))
                                <div class="text-red-500">
                                    @foreach($errors->get($name) as $error)
                                        {{ $error }}<br/>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        @break
                    @case("info")
                        <div class="{{ $input->extras["class"] ?: "$input->divSize text-justify" }} mb-2"
                             id="input-{{ $input->name }}-container">
                            <h6 class="mb-0 text-primary ml-2">{{ $input->title }}</h6>
                            <span class="text-muted">{!! $input->value !!} </span>
                        </div>
                        @break
                    @case("html")
                        {!! $input->value !!}
                        @break
                    @case("component")
                        @component($input->extras["component_name"], $input->extras["data"])@endcomponent
                        @break
                    @case("button")
                        <div
                            class="mb-2 {{ $input->extras["container_class"] ?: "$input->divSize text-justify" }}">
                            <a href="{{ $input->extras["route"] }}"
                               class="btn {{ $input->extras["class"] }}">{{ $input->title }}</a>
                        </div>
                        @break
                    @case("file")
                        <div class="mb-3">
                            <label class="custom-file-label" for="input-{{ $input->name }}">{{ $input->title }}</label>
                            <input
                                class="form-input @if($errors->has($input->name)) is-invalid @endif"
                                type="file" name="{{ $input->name }}" @if(($input->required ?? false) === true) required
                                @endif id="input-{{ $input->name }}">
                        </div>
                        @if($errors->has($input->name))
                            <div class="text-red-500 text-sm mt-1">
                                @foreach($errors->get($input->name) as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        @break
                    @case("richtext")
                        <div class="form-group {{ $input->divSize }} mb-2"
                             id="input-{{ $input->name }}-container">
                            <span class="ml-2">{{ $input->title }}</span>
                            <input id="input-{{ $input->name }}" class=""
                                   name="{{ $input->name }}" type="hidden" value="{{$input->value}}">
                            <div id="input-{{ $input->name }}-editor" class="ql-editor"
                                 style="overflow-y: scroll; height: 600px;">
                                <p>{{ $input->value ?? old($input->name) }}</p>
                            </div>
                            @push('scripts')
                                <script>
                                    var PHP_placeholders =<?php echo $input->extras["placeholders"] ?>;
                                    var PHP_translations =<?php echo $input->extras["translations"] ?>;
                                    var placeholders = [];
                                    var translations = [];
                                    for (i = 0; i < PHP_placeholders.length; i++) {
                                        placeholders.push("#" + PHP_placeholders[i].display_name + "#");
                                        translations.push(PHP_translations[i]);
                                    }

                                    var AlignStyle = Quill.import('attributors/style/align');
                                    Quill.register(AlignStyle, true);
                                    $(document).ready(function () {
                                        var toolbarOptions = [
                                            [{'placeholder': placeholders}], // my custom dropdown
                                            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

                                            [{'header': 1}, {'header': 2}],               // custom button values
                                            [{'list': 'ordered'}, {'list': 'bullet'}],
                                            [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent

                                            [{'header': [1, 2, 3, 4, 5, 6, false]}],

                                            [{'color': []}, {'background': []}],          // dropdown with defaults from theme
                                            [{'align': []}],
                                            ['clean'],

                                        ];

                                        const {{ $input->name }}_quill = new Quill("#input-{{ $input->name }}-editor", {
                                            modules: {
                                                toolbar: {
                                                    container: toolbarOptions,
                                                    handlers: {
                                                        "placeholder": function (value) {
                                                            if (value) {
                                                                const cursorPosition = this.quill.getSelection().index;
                                                                this.quill.insertText(cursorPosition, value);
                                                                this.quill.setSelection(cursorPosition + value.length);
                                                            }
                                                        }
                                                    }
                                                },
                                            },
                                            theme: 'snow',
                                        });

                                        // We need to manually supply the HTML content of our custom dropdown list
                                        const placeholderPickerItems = Array.prototype.slice.call(document.querySelectorAll('.ql-placeholder .ql-picker-item'));

                                        for (var i = 0; i < placeholderPickerItems.length; i++) {
                                            placeholderPickerItems[i].textContent = translations[i]
                                        }

                                        document.querySelector('.ql-placeholder .ql-picker-label').innerHTML
                                            = 'Vstavi __' + document.querySelector('.ql-placeholder .ql-picker-label').innerHTML;

                                        {{ $input->name }}_quill.on('text-change', function (delta, oldDelta, source) {
                                            var name = document.querySelector('input[name={{ $input->name }}]');
                                            name.value = document.querySelector("#input-{{ $input->name }}-editor .ql-editor").innerHTML;
                                        });

                                        document.querySelector("#input-{{ $input->name }}-editor .ql-editor").innerHTML = $('#input-{{ $input->name }}-editor').text();
                                    });
                                </script>
                            @endpush
                        </div>
                        @break
                @endswitch
            @endforeach
        </div>

        <div class="bg-white rounded-lg mt-4 p-3 mx-6">
            <div class="flex justify-center">
                @isset($dataForm->cancelRoute)
                    <div class="auto">
                        <a class="btn btn-secondary" href="{{ $dataForm->cancelRoute }}">Prekliči</a>
                    </div>
                @endisset
                <div class="mr-2">
                    <button type="submit" class="btn btn-primary">@if(isset($dataForm->formButtonTitle))
                            {{ $dataForm->formButtonTitle }}
                        @else
                            Shrani
                        @endif</button>
                </div>
            </div>
        </div>
        @push("scripts")
            <script>
                "{!! $dataForm->script !!}"

                function getAllControlledInputs() {
                    var list = [];
                    var elements = document.querySelectorAll("[data-hides]");
                    for (var i = 0; i < elements.length; i++) {
                        let smallList = elements[i].dataset.hides.split(",");
                        for (var j = 0; j < smallList.length; j++) list.push(smallList[j]);
                    }
                    elements = document.querySelectorAll("[data-shows]");
                    for (i = 0; i < elements.length; i++) {
                        let smallList = elements[i].dataset.shows.split(",");
                        for (j = 0; j < smallList.length; j++) list.push(smallList[j]);
                    }
                    elements = document.querySelectorAll("[data-enables]");
                    for (i = 0; i < elements.length; i++) {
                        let smallList = elements[i].dataset.enables.split(",");
                        for (j = 0; j < smallList.length; j++) list.push(smallList[j]);
                    }
                    elements = document.querySelectorAll("[data-disables]");
                    for (i = 0; i < elements.length; i++) {
                        let smallList = elements[i].dataset.disables.split(",");
                        for (j = 0; j < smallList.length; j++) list.push(smallList[j]);
                    }
                    return Array.from(new Set(list));
                }

                let controlledInputs = getAllControlledInputs();

                function shouldHide(name) {
                    var elements = document.querySelectorAll("[data-hides]")
                    for (var i = 0; i < elements.length; i++) {
                        let element = elements[i];
                        let list = element.dataset.hides.split(",")
                        for (var j = 0; j < list.length; j++) {
                            if (list[j] === name && element.checked) return true;
                        }
                    }
                    elements = document.querySelectorAll("[data-shows]")
                    for (i = 0; i < elements.length; i++) {
                        let element = elements[i];
                        let list = element.dataset.shows.split(",")
                        for (j = 0; j < list.length; j++) {
                            if (list[j] === name && !element.checked) return true;
                        }
                    }
                    return false;
                }

                function shouldDisable(name) {
                    var elements = document.querySelectorAll("[data-disables]")
                    for (var i = 0; i < elements.length; i++) {
                        let element = elements[i];
                        let list = element.dataset.disables.split(",")
                        for (var j = 0; j < list.length; j++) {
                            if (list[j] === name && element.checked) return true;
                        }
                    }
                    elements = document.querySelectorAll("[data-enables]")
                    for (i = 0; i < elements.length; i++) {
                        let element = elements[i];
                        let list = element.dataset.enables.split(",")
                        for (j = 0; j < list.length; j++) {
                            if (list[j] === name && !element.checked) return true;
                        }
                    }
                    return false;
                }

                function checkInputs() {
                    for (var i = 0; i < controlledInputs.length; i++) {
                        let element = controlledInputs[i];
                        document.getElementById('input-' + element + "-container").style.display = shouldHide(element) ? 'none' : 'block';
                        document.getElementById('input-' + element).disabled = shouldDisable(element)
                    }
                }

                checkInputs();
            </script>
        @endpush
    </form>

    <div>
        @foreach($dataForm->inputs as $input)
            @switch($input->type)
                @case("outsideComponent")
                    @component($input->extras["component_name"], $input->extras["data"])@endcomponent
                    @break
            @endswitch
        @endforeach
    </div>


</div>
