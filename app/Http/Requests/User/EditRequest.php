<?php

declare(strict_types=1);

namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;


class EditRequest extends FormRequest
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
            'is_admin' => ['nullable']
        ];
    }

    public function attributes()
    {
        return [
            'is_admin' => 'Админство',
            'email' => 'почта'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'нужно заполнить поле :attribute'
        ];
    }

    public function getIsAdmin ()
    {
        return $this->validated('is_admin');
    }
}
