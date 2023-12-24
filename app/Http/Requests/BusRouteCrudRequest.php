<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRouteCrudRequest extends FormRequest
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
            "route_name" => "required|unique:bus_routes,route_name,".$this->id,
        ];
    }
}
