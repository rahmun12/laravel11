<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true to allow all users
    }

    public function rules()
    {
        return [
            'code' => 'required|max:4',
            'name' => 'required|min:10|max:40',
            'publisher' => 'required|min:10|max:40',
            'year' => 'nullable|digits:4',
            'author' => 'required|min:10|max:40',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'The book code is required.',
            'code.max' => 'The book code must not exceed 4 characters.',
            'name.required' => 'The book name is required.',
            'name.min' => 'The book name must be at least 10 characters.',
            'name.max' => 'The book name must not exceed 40 characters.',
            'publisher.required' => 'The publisher name is required.',
            'publisher.min' => 'The publisher name must be at least 10 characters.',
            'publisher.max' => 'The publisher name must not exceed 40 characters.',
            'year.digits' => 'The year of publication must be exactly 4 digits.',
            'author.required' => 'The author name is required.',
            'author.min' => 'The author name must be at least 10 characters.',
            'author.max' => 'The author name must not exceed 40 characters.',
        ];
    }
}
