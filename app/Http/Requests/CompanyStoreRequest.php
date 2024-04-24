<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required | min:3',
            'website' => 'nullable | url | unique:companies,website,'.($this->company ? $this->company->id : null),
            'email' => 'nullable | email | unique:companies,email,'.($this->company ? $this->company->id : null),
            'logo' => 'image | dimensions:min_width=100,min_height=100 | max:512,'.($this->company ? 'required' : null)
        ];
    }
    public function messages(): array
    {
        return [
            'website.unique' => 'website name already taken',
            'logo.dimensions' => 'logo should be minimum 100x100 pixels',
        ];
    }
}
