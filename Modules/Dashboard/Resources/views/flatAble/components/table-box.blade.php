<div class="card">
    <div class="card-header d-flex justify-content-between flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h5>
                {{ $title ?? '' }}
            </h5>
        </div>
        <div class="card-tools">
            {{ $tools ?? '' }}
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-valign-middle">
            {{ $slot }}
        </table>
    </div>
    @isset($footer)
        <div class="card-footer d-flex justify-content-center">
            {{ $footer }}
        </div>
    @endisset
</div>
