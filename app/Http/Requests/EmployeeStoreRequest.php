<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'company' => 'required',
            'email' => 'nullable | email | unique:employees,email,'.($this->employee ? $this->employee->id : null),
            'phone' => 'nullable | regex:/^\+92\d{10}$/ | unique:employees,phone,'.($this->employee ? $this->employee->id : null),
        ];
    }
    public function messages(): array
    {
        return [
            'email.unique' => 'email is already registered by another employee',
            'phone.unique' => 'phone is already registered by another employee',
        ];
    }
}
