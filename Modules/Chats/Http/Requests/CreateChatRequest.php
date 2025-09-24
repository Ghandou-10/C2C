<?php

namespace Modules\Chats\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'users'     => [
                'required',
                'array'
            ],
            'users.*'   => [
                'sometimes',
                'exists:users,id'
            ],
            'isPrivate' => [
                'required',
                'boolean'
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
