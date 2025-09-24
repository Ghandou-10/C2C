<x-layout :title="trans('accounts::customers.plural')" :breadcrumbs="['dashboard.customers.index']">

    @include('accounts::customers.partials.filter')

    @component(layout('dashboard').'components.table-box')

        @slot('title', trans('accounts::customers.actions.list'))

        @slot('tools')
            @include('accounts::customers.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('accounts::customers.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('accounts::customers.attributes.email')</th>
            <th>@lang('accounts::customers.attributes.phone')</th>
            <th>@lang('accounts::customers.attributes.verified')</th>
            <th>@lang('accounts::customers.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>
                    <a
                        href="{{ route('dashboard.customers.show', $customer) }}"
                        class="text-decoration-none">
                        {{ $customer->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $customer->email }}
                </td>
                <td>{{ $customer->phone }}</td>
                <td>@include('accounts::customers.partials.flags.verified')</td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('accounts::customers.partials.actions.show')
                    @include('accounts::customers.partials.actions.edit')
                    @include('accounts::customers.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('accounts::customers.empty')</td>
            </tr>
        @endforelse
        </tbody>

        @if($customers->hasPages())
            @slot('footer')
                {{ $customers->links() }}
            @endslot
        @endif
    @endcomponent

</x-layout>
