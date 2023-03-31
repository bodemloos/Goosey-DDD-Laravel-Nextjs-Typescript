<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !!auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'to_id' => ['required', 'integer'],
            'title' => ['required', 'min:2'],
            'body' => ['required', 'min:6'],
        ];
    }

    /**
     * return data from the request.
     *
     * @return array<string, mixed>
     */
    public function data()
    {
        return $this->only(['to_id', 'title', 'body']);
    }
}