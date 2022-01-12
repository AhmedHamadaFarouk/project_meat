<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class bankRequest extends FormRequest
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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required|string|min:2|max:255',
                        'price' => 'required|numeric|min:2',
                        'number_bank' => 'required|numeric|min:2',
                        'notes' => 'nullable|string|min:2',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'name' => 'nullable|string|min:2|max:255|unique:banks,name,',
                        'price' => 'nullable|numeric|min:2',
                        'number_bank' => 'nullable|numeric|min:2',
                        'notes' => 'nullable|string|min:2',
                    ];
                }
            default:
                break;
        }
    }
}
