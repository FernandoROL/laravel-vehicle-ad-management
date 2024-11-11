<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestVehicleModel extends FormRequest
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
                "brandID" => "required",
                "name" => "required",
                "userID" => "required",
            ];
        } elseif ($this->method() == "PUT") {
            $request = [
                "brandID" => "required",
                "name" => "required",
                "userID" => "required",
            ];
        }
        return $request;
    }
}
