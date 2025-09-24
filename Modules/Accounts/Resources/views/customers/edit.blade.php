<x-layout :title="$customer->name" :breadcrumbs="['dashboard.admins.edit',$customer]">

    {{ BsForm::resource('accounts::customers')->putModel($customer, route('dashboard.customers.update', $customer), ['enctype' => "multipart/form-data",'data-parsley-validate']) }}
    @component(layout('dashboard').'components.box')
        @slot('title', trans('accounts::customers.actions.edit'))

        @include('accounts::customers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('accounts::customers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}

</x-layout>
