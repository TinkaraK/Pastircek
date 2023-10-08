@isset($breadcrumbs)
    <nav>
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            @foreach ($breadcrumbs as $i => $breadcrumb)
                @if ($i == count($breadcrumbs) - 1)
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                        aria-current="page">{{ $breadcrumb['title'] }}
                    </li>
                @else
                    <li class="leading-normal text-sm">
                        <a class="opacity-50 text-slate-700"
                           href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['title'] }}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endisset
