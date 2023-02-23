<?php

declare(strict_types=1);

namespace App\Http\Requests\Source;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'min:5', 'max:100'],
            'path' => ['required', 'url', 'min:5', 'max:100'],
        ];
    }


    public function getSourceId ()
    {
        return $this->validated('id');
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'path' => 'Источник'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'нужно заполнить поле :attribute'
        ];
    }
}
