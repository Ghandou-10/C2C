@include('dashboard::errors')
{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::email('email')->required()->attribute(['data-parsley-type' => 'email','data-parsley-minlength' => '3']) }}
@isset($admin)
    {{ BsForm::phone('phone', old('phone', $admin->phone))->required()->attribute(['data-parsley-type' => 'number','data-parsley-minlength' => '3']) }}
@else
    {{ BsForm::phone('phone')->required()->attribute(['data-parsley-type' => 'number','data-parsley-minlength' => '3']) }}
@endif

{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}
@if(\Module::isEnabled('Roles'))
    <select2
        name="role_id"
        label="@lang('roles::roles.singular')"
        remote-url="{{ route('roles.select') }}"
        @isset($admin)
            value="{{ $admin->roles()->orderBy('id','desc')->first()->id ?? old('role_id') }}"
        @endisset
        :required="true"
    ></select2>
@endif
<div class="form-group">
    <label for="preferred_locale">@lang('accounts::admins.attributes.preferred_locale')</label>
    <select
        name="preferred_locale"
        id="preferred_locale"
        class="form-control "
        data-live-search="true"
        data-actions-box="true">
        @foreach (Locales::get() as $locale)
            <option
                value="{{ $locale->getCode() }}"
            @isset($admin)
                {{ $admin->preferred_locale == $locale->getCode() ? 'selected' : '' }}
                @endisset>
                {{ $locale->getName() }}
            </option>
        @endforeach
    </select>
</div>

{{ BsForm::file('avatar')->note(trans('accounts::admins.messages.images_note')) }}

