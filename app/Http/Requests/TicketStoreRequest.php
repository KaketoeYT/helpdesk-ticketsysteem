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
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
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
}
