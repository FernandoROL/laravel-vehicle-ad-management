<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestComment extends FormRequest
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
                "title" => "required",
                "body" => "required",
                "vehicleID" => "required",
                "userID" => "required",
            ];
        } elseif ($this->method() == "PUT") {
            $request = [
                "title" => "required",
                "body" => "required",
            ];
        }
        return $request;
    }
}
