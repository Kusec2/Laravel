<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgressRequest extends FormRequest
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
            'measurement_date'=>'required',
            'user_id'=>'required',
            'weight'=>'nullable',
            'chest'=>'nullable',
            'waist'=>'nullable',
            'hip'=>'nullable',
            'max_bench'=>'nullable',
            'max_deadlift'=>'nullable',
            'max_squat'=>'nullable',

        ];
    }
}
