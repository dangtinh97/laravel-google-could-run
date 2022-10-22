<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd($this->request->get('description'));
        return [
            'image' => 'mimes:jpeg,jpg,png,gif|required',
            'title' => 'required|max:40|unique:products,title',
        ];
    }
}
