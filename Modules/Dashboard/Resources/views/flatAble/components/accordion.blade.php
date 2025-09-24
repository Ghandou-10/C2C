<div class="accordion card" id="accordionExample">
    <div class="accordion-item">
        @if(isset($title))
            <h2 class="accordion-header" id="{{ preg_replace('/\s+/', '', $title) }}One8">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ preg_replace('/\s+/', '', $title) }}" aria-expanded="false" aria-controls="collapseTwo">
                    {{ $title ?? '' }}
                </button>
            </h2>
        @endif
        <div id="{{ preg_replace('/\s+/', '', $title) }}" class="accordion-collapse collapse" aria-labelledby="{{ preg_replace('/\s+/', '', $title) }}One8" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="accordion-footer m-3">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
