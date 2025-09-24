@component(layout('dashboard').'components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('isActive', request()->routeIs('dashboard.home'))
@endcomponent
@if(\Module::isEnabled('Chats'))
    @component(layout('dashboard').'components.sidebarItem')
        @slot('url', route('dashboard.chats.index'))
        @slot('name', trans('chats::chats.plural'))
        @slot('icon', 'fab fa-facebook-messenger')
        @slot('isActive', request()->routeIs('dashboard.chats.index'))
    @endcomponent
@endif
@if(\Module::isEnabled('Accounts'))
    @include('accounts::sidebar')
@endif
@if(\Module::isEnabled('Countries'))
    @include('countries::sidebar')
@endif
@if(\Module::isEnabled('Articles'))
    @include('articles::sidebar')
@endif
@if(\Module::isEnabled('Pages'))
    @include('pages::sidebar')
@endif
@if(\Module::isEnabled('Settings'))
    @include('settings::sidebar')
@endif
