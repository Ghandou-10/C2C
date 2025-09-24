<li class="dropdown pc-h-item">
    <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false">
        <img class="" src="{{ Locales::getFlag() }}" alt="Header Language" height="16">
    </a>
    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        @foreach(Locales::get() as $locale)
            <a href="{{ route('dashboard.locale', $locale->code) }}" class="dropdown-item">
                <img src="{{ $locale->flag }}" alt="user-image" class="mr-1 ml-1" height="12">
                <span class="ms-2">{{ $locale->name }}</span>
            </a>
        @endforeach
    </div>
</li>
