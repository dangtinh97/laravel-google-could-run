<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'title' => 'required|max:40',
            'parent' => 'required',
//            'description' => 'required',
        ];

        if ($this->request->get('image') != null)
        {
            $rules['image'] = 'mimes:jpeg,jpg,png,gif|max:10000';
        }
        return $rules;

    }
}
