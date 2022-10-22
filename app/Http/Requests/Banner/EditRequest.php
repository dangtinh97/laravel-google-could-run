<?php

namespace App\Http\Requests\Banner;

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
//        $id = $this->route('id');

        $rules = [
            'title' => 'required|max:40',
        ];

        if ($this->request->get('image') != null)
        {
            $rules['image'] = 'mimes:jpeg,jpg,png,gif';
        }
        return $rules;

    }
}
