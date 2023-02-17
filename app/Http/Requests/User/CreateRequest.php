<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

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
            'is_admin' => ['required', 'boolean'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required','string', 'min:5', 'max:20']
        ];
    }

    public function getUserContacts () : array
    {
        return (array)  $this->validated(['name', 'email']);
    }

}
