<?php

namespace App\Http\Requests\Admin;

use App\Enums\Role as RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'unique:users'],
            'phone' => ['required', 'regex:/^(0)(5|6|7)[0-9]{8}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(collect(RoleEnum::cases())->pluck('value')->toArray())],

            'city' => ['exclude_unless:role,'.RoleEnum::DASS_ADMIN->value, 'required', 'exists:cities,code'],
        ];
    }
}
