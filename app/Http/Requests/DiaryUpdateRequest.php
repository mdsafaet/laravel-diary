<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryUpdateRequest extends FormRequest
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
            'title'       => 'sometimes|string|max:255',
            'content'     => 'sometimes|string|min:10',
            'date'        => 'sometimes|date',
            'category_id' => 'sometimes|integer|exists:categories,id',
            'tag_id'      => 'sometimes|integer|exists:tags,id'
        ];
    }
}
