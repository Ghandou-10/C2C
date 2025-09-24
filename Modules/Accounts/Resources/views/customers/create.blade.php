<x-layout :title="trans('accounts::customers.actions.create')" :breadcrumbs="['dashboard.customers.create']">

    {{ BsForm::resource('accounts::customers')->post(route('dashboard.customers.store'), ['enctype' => "multipart/form-data",'data-parsley-validate']) }}
    @component(layout('dashboard').'components.box')
        @slot('title', trans('accounts::customers.actions.create'))

        @include('accounts::customers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('accounts::customers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}

</x-layout>

