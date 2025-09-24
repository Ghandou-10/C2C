@if(auth()->user()->hasPermission('create_customers'))
    <a href="{{ route('dashboard.customers.create', request()->only('type')) }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::customers.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::admins.actions.create')
    </button>
@endif
