<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
            'name'              => 'required',
            'razon_social'      => 'required',
            'logo'              => 'nullable|mimes:png,jpeg|max:200|dimensions:max_width=200,max_height=200',
            'status'            => 'required',
        ];
    }
}
