@component(layout('dashboard').'components.sidebarItem')
    @slot('can', ['permission' => 'read_chats'])
    @slot('url', route('dashboard.chats.index'))
    @slot('name', trans('chats::chats.plural'))
    @slot('isActive', request()->routeIs('*chats*'))
    @slot('icon', 'fas fa-newspaper')
    @slot('tree', [
        [
            'name' => trans('chats::chats.actions.list'),
            'url' => route('dashboard.chats.index'),
            'can' => ['permission' => 'read_chats'],
            'isActive' => request()->routeIs('*chats.index'),
            'module' => 'Chats',
        ],
        [
            'name' => trans('chats::chats.actions.create'),
            'url' => route('dashboard.chats.create'),
            'can' => ['permission' => 'create_chats'],
            'isActive' => request()->routeIs('*chats.create'),
            'module' => 'Chats',
        ],
    ])
@endcomponent
