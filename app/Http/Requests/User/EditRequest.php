<?php

namespace App\Http\Requests\User;

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
        $role = [
            'name' => 'required|max:60',
            'email' => 'required|email|max:60|unique:users,email,' . $id,
        ];

        if ($this->request->get('password') !== null)
        {
            $role['password'] = 'max:60|min:6';
        }

        return $role;
    }
}
