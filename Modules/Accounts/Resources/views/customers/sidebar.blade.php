@component(layout('dashboard').'components.sidebarItem')
    @slot('can', ['permission' => 'read_customers'])
    @slot('url', route('dashboard.customers.index'))
    @slot('name', trans('accounts::customers.plural'))
    @slot('isActive', request()->routeIs('*customers*'))
    @slot('icon', 'fas fa-users')
    @slot('tree', [
        [
            'name' => trans('accounts::customers.actions.list'),
            'url' => route('dashboard.customers.index'),
            'can' => ['permission' => 'read_customers'],
            'isActive' => request()->routeIs('*customers.index'),
            'module' => 'Accounts',
        ],
        [
            'name' => trans('accounts::customers.actions.create'),
            'url' => route('dashboard.customers.create'),
            'can' => ['permission' => 'create_customers'],
            'isActive' => request()->routeIs('*customers.create'),
            'module' => 'Accounts',
        ],
    ])
@endcomponent
