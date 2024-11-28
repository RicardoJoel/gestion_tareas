<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dni' => 'required|regex:/[0-9]{8}/',
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'expired_at' => 'nullable|date_format:Y-m-d|after_or_equal:today',
            'status_id' => 'required|integer|min:1',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'dni' => 'DNI',
            'title' => 'título',
            'description' => 'descripción',
            'expired_at' => 'fecha de vencimiento',
            'status' => 'estado',
        ];
    }
}
