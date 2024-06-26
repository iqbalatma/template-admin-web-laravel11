<?php

namespace App\Http\Requests\Management\Roles;

use App\Enums\Table;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
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
            "name" => "required|max:128",
            "permission_ids" => "array",
            "permission_ids.*" => ["uuid", Rule::exists(Table::PERMISSIONS->value, "id")],
        ];
    }
}
