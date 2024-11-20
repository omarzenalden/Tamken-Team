<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'ticket_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,ongoing,finished',
            'dead_line' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
            'assign_user_id' => 'required|integer|exists:users,id',
        ];
    }
    public function messages()
    {
        return [
            'ticket_name.required' => 'The ticket name  is required.',
            'description.required' => 'The description is required.',
            'status.required' => 'The status is required.',
            'dead_line.required' => 'A valid dead_line is required.',
            'user_id.required' => 'A valid user_id is required.',
            'assign_user_id.required' => 'A valid user_id is required.',
        ];
    }
}
