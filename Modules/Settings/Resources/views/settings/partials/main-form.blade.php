@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@multilingualFormTabs

{{ BsForm::text('name')->value(Settings::locale($locale->getCode())->get('name'))->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::textarea('description')->rows(3)->attribute('class','form-control textarea-'.$locale->getCode())->value(Settings::locale($locale->getCode())->get('description'))->attribute(['data-parsley-minlength' => '3']) }}
{{ BsForm::textarea('meta_description')->rows(3)->attribute('class','form-control textarea-'.$locale->getCode())->value(Settings::locale($locale->getCode())->get('meta_description'))->attribute(['data-parsley-minlength' => '3']) }}
{{ BsForm::text('keywords')->value(Settings::locale($locale->getCode())->get('keywords'))->note(trans('settings::settings.notes.keywords')) }}

@endMultilingualFormTabs

<div class="row">
    <div class="col-md-6">
        {{ BsForm::file('logo')->note(trans('settings::settings.messages.images_note')) }}
    </div>
    <div class="col-md-6">
        {{ BsForm::file('favicon')->note(trans('settings::settings.messages.images_note')) }}
    </div>
    <div class="col-md-6">
        {{ BsForm::file('loginLogo') }}
    </div>
    <div class="col-md-6">
        {{ BsForm::file('loginBackground') }}
    </div>
</div>

{{--    <select2 name="privacy_policy"--}}
{{--             label="@lang('settings::settings.attributes.privacy_policy')"--}}
{{--             remote-url="{{ route('pages.select') }}"--}}
{{--             value="{{ (new Modules\Settings\Entities\Setting)->get('privacy_policy', old('privacy_policy',null)) }}"--}}
{{--             :required="false"--}}
{{--    ></select2>--}}

{{--    <select2 name="terms"--}}
{{--             label="@lang('settings::settings.attributes.terms')"--}}
{{--             remote-url="{{ route('pages.select') }}"--}}
{{--             value="{{ (new Modules\Settings\Entities\Setting)->get('terms', old('terms',null)) }}"--}}
{{--             :required="false"--}}
{{--    ></select2>--}}

