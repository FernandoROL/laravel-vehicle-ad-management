<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUser extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST") {
            $request = [
                "name" => "required",
                "email" => "required",
                "password" => "required",
            ];
        } elseif ($this->method() == "PUT") {
            $request = [
                "name" => "required",
                "email" => "required",
            ];
        }
        return $request;
    }
}
