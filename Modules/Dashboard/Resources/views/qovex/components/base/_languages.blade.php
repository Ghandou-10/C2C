<div class="dropdown d-none d-sm-inline-block">
    <button
        type="button" class="btn header-item noti-icon waves-effect" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-globe-asia"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        @foreach(Locales::get() as $locale)
            <!-- item-->
            <a
                href="{{ route('dashboard.locale', $locale->getCode()) }}"
                class="dropdown-item notify-item">
                {{ $locale->getSvgFlag(24, 24) }}
                <span class="align-middle">{{ $locale->getName() }}</span>
            </a>
        @endforeach
    </div>
</div>
