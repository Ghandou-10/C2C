<x-layout :title="trans('countries::countries.actions.create')" :breadcrumbs="['dashboard.countries.create']">

    {{ BsForm::resource('countries::countries')->post(route('dashboard.countries.store'), ['enctype' => "multipart/form-data",'data-parsley-validate']) }}
    @component(layout('dashboard').'components.box')
        @slot('title', trans('countries::countries.actions.create'))

        @include('countries::countries.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('countries::countries.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}

</x-layout>

