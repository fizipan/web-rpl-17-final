<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EbookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'levels_id' => 'required|integer|exists:levels,id',
            'prices_id' => 'required|integer|exists:prices,id',
            'url' => 'required|string|min:5|max:255',
            'photo' => 'required|image',
        ];
    }
}
