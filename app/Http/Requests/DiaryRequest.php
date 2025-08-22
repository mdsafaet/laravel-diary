<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            
            'title'       => 'required|string',
            'content'     => 'required|string|min:10',
            'entry_date'  => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'tag_id'      => 'required|exists:tags,id'
        ];
    }
}
