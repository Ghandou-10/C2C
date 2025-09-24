<div class="card">
    @if(isset($title) || isset($tools))
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h5>
                    {{ $title ?? '' }}
                </h5>
            </div>

            <div class="card-tools">
                {{ $tools ?? '' }}
            </div>
        </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body {{ $bodyClass ?? '' }}">
        {{ $slot }}
    </div>
    <!-- /.card-body -->
    @isset($footer)
        <div class="card-footer pt-0">
            {{ $footer }}
        </div>
    @endisset
</div>
<!-- /.card -->

