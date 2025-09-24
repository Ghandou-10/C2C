<x-layout :title="$customer->name" :breadcrumbs="['dashboard.customers.show',$customer]">

    @component(layout('dashboard').'components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.name')</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.email')</th>
                <td>{{ $customer->email ?? '----' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.phone')</th>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.created_at')</th>
                <td>{{ $customer->created_at->format('Y-m-d h:i A') }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.verified')</th>
                <td>@include('accounts::customers.partials.flags.verified')</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.verified_at')</th>
                <td>@include('accounts::customers.partials.flags.verified_at')</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.last_login_at')</th>
                <td>{{ $customer->last_login_at ? $customer->last_login_at->format('Y-m-d h:i A') : '...' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.preferred_locale')</th>
                <td>{{ $customer->preferred_locale == 'ar' ? 'العربية' : 'English' }}</td>
            </tr>
            <tr>
                <th width="200">@lang('accounts::customers.attributes.avatar')</th>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-70 symbol-sm flex-shrink-0">
                            <img
                                src="{{ $customer->getAvatar() }}"
                                class="avatar-lg"
                                alt="{{ $customer->name }}">
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('accounts::customers.partials.actions.edit')
            @include('accounts::customers.partials.actions.delete')
            @include('accounts::customers.partials.actions.block')
        @endslot
    @endcomponent

</x-layout>>
