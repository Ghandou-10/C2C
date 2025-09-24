<x-layout :title="$role->name" :breadcrumbs="['dashboard.roles.edit', $role]">

    {{ BsForm::resource('roles::roles')->putModel($role, route('dashboard.roles.update', $role), ['enctype' => "multipart/form-data"]) }}
    @component(layout('dashboard').'components.box')
        @slot('title', trans('roles::roles.actions.edit'))

        @include('roles::roles.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('roles::roles.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}

</x-layout>
