@include('dashboard::errors')
{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::email('email')->attribute(['data-parsley-type' => 'email','data-parsley-minlength' => '3']) }}
@isset($customer)
    {{ BsForm::phone('phone', old('phone', $customer->phone))->required()->attribute(['data-parsley-type' => 'number','data-parsley-minlength' => '3']) }}
@else
    {{ BsForm::phone('phone')->required()->attribute(['data-parsley-type' => 'number','data-parsley-minlength' => '3']) }}
@endif
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

<div class="form-group">
    <label for="preferred_locale">@lang('accounts::customers.attributes.preferred_locale')</label>
    <select
        name="preferred_locale"
        id="preferred_locale"
        class="form-control"
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

{{ BsForm::file('avatar') }}
