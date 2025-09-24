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
{{ BsForm::textarea('content')->rows(3)->attribute('class','form-control textarea')->attribute(['data-parsley-minlength' => '3']) }}
@endMultilingualFormTabs


{{ BsForm::file('image')->note(trans('articles::articles.messages.images_note')) }}

