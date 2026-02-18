<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TicketStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void // Draait eerst en authenticeert de gebruiker, voegt daarna toe aan de request
    {
        // Voeg user_id alleen toe bij create (POST), niet bij update
        if ($this->isMethod('post')) {
            $this->merge([
                'user_id' => Auth::id(),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Full required rules for creating a ticket (POST)
        if ($this->isMethod('post')) {
            return [
                'subject'      => 'required|string|max:255',
                'description'  => 'required|string',
                'category_id'  => 'required|exists:categories,id',
                'priority_id'  => 'required|exists:priorities,id',
                'location_id'  => 'required|exists:locations,id',
                'status_id'    => 'exists:statuses,id',
                'user_id'      => 'required|exists:users,id',
            ];
        }

        // Allow partial updates for editing (PUT/PATCH)
        return [
            'subject'      => 'sometimes|string|max:255',
            'description'  => 'sometimes|string',
            'category_id'  => 'sometimes|exists:categories,id',
            'priority_id'  => 'sometimes|exists:priorities,id',
            'location_id'  => 'sometimes|exists:locations,id',
            'status_id'    => 'sometimes|exists:statuses,id',
            'user_id'      => 'sometimes|exists:users,id',
        ];
    }
}
