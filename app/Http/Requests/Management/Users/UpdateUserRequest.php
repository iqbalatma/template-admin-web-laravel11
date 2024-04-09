<?php

namespace App\Http\Requests\Management\Users;

use App\Enums\Table;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            "role_ids" => "array",
            "role_ids.*" => ["uuid", Rule::exists(Table::ROLES->value, "id")],
        ];
    }
}
