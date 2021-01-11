<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            "name" => ["required", "string", "max:50"],
            "type" => ["required", "string", "max:50"],
            "dob" => ["required", "date"],
            "weight" => ["required", "numeric", "min:0"],
            "height" => ["required", "numeric", "min:0"],
            "biteyness" => ["required", "numeric", "between:0,5"],
            "treatments" => ["required", "array"],
            "treatments.*" => ["string", "max:50"],
        ];
    }
}
