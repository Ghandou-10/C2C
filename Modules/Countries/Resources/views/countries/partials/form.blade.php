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
{{ BsForm::text('name')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::text('currency')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
@endMultilingualFormTabs
{{ BsForm::text('code')->required('required')->attribute(['data-parsley-minlength' => '2']) }}
{{ BsForm::text('key')->required('required')->attribute(['data-parsley-minlength' => '2']) }}
{{ BsForm::file('flag')->note(trans('countries::countries.messages.images_note')) }}
{{ BsForm::radio('is_default') }}

