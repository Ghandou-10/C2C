@if (count($breadcrumbs))

    @foreach ($breadcrumbs as $breadcrumb)

        @if ($breadcrumb->url && !$loop->last)
            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
        @else
            <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
        @endif

    @endforeach

@endif

{{--                                <li--}}
{{--                                    class="breadcrumb-item"--}}
{{--                                ><a href="../navigation/index.html"><i class="ph-duotone ph-house"></i></a--}}
{{--                                    ></li>--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>--}}
{{--                                <li class="breadcrumb-item" aria-current="page">Home</li>--}}
