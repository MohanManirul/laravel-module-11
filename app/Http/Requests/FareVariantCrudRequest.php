<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FareVariantCrudRequest extends FormRequest
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
            "bus_id" => "required",
            "fare" => "required",
            "departure_point_id" => "required",
            "araival_point_id" => "required",
            "departure_at" => "required",
            "araival_at" => "required",
            "travel_date" => "required",
        ];
    }
}

