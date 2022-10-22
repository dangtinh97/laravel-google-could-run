<?php

namespace App\Http\Requests\Permission;

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
        $id = $this->route('id');
//        dd($id);
        return [
            'name' => 'required|max:50|unique:permissions,name,' . $id,
            'permission' => 'required|max:50|unique:permissions,permission,' . $id,
        ];
    }
}
