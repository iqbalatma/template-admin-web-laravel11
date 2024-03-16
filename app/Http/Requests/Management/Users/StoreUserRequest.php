<?php

namespace App\Http\Requests\Management\Users;

use App\Enums\Table;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => "required|max:128",
            "last_name" => "max:128",
            "email" => [Rule::unique(Table::USERS->value, "email"), "email", "max:255"],
            "password" => "required|max:128|confirmed",
        ];
    }
}
