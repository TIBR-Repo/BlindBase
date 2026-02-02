<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
            'subject' => ['required', 'string', 'in:general,quote,trade,order,compliance,other'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please select a subject.',
            'subject.in' => 'Please select a valid subject.',
            'message.required' => 'Please enter your message.',
            'message.min' => 'Your message must be at least 10 characters.',
        ];
    }

    /**
     * Get the subject label for display.
     */
    public function getSubjectLabel(): string
    {
        $subjects = [
            'general' => 'General Enquiry',
            'quote' => 'Request a Quote',
            'trade' => 'Trade Account Enquiry',
            'order' => 'Existing Order Query',
            'compliance' => 'Compliance Documentation',
            'other' => 'Other',
        ];

        return $subjects[$this->subject] ?? $this->subject;
    }
}
