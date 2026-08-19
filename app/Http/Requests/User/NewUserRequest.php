<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class NewUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            "name"=> "required|string",
            "email" => "required|email|string|unique:users,email",
            "password" => ["required","string",Password::min(8)->letters()->symbols()->numbers(),'confirmed'],
            "password_confirmation" => "required"
        ];
    }
}
