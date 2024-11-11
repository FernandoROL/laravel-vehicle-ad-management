<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestBrand extends FormRequest
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
                "uniqueCode" => "required|unique:vehicles,uniqueCode",
                "name" => "required",
                "userID" => "required",
            ];
        } elseif ($this->method() == "PUT") {
            $request = [
                "name" => "required",
                "userID" => "required",
            ];
        }
        return $request;
    }
}
